<?php

namespace App\Http\Controllers;

use App\Repositories\InstitutionRepository;
use App\Repositories\UserRepository;
use App\Services\GroupService;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\GroupCreateRequest;
use App\Http\Requests\GroupUpdateRequest;
use App\Repositories\GroupRepository;
use App\Validators\GroupValidator;


class GroupsController extends Controller
{
    protected $repository;
    protected $institutionRepository;
    protected $userRepository;
    protected $validator;
    protected $service;

    public function __construct(GroupRepository $repository, GroupValidator $validator, GroupService $service, InstitutionRepository $institutionRepository, UserRepository $userRepository)
    {
        $this->repository = $repository;
        $this->institutionRepository = $institutionRepository;
        $this->userRepository = $userRepository;
        $this->validator  = $validator;
        $this->service = $service;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = $this->repository->all();

        $userList = $this->userRepository->selectBoxList();
        $institutionList = $this->institutionRepository->selectBoxList();


        return view('groups.index', [
            'groups' => $groups,
            'user_list' => $userList,
            'institution_list' => $institutionList,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  GroupCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(GroupCreateRequest $request)
    {
        $request = $this->service->store($request->all());
        $group = $request['success'] ? $request['data'] : null;

        session()->flash('success', [
            'success' => $request['success'],
            'messages' => $request['messages'],
        ]);

        return redirect()->route('group.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function userStore(Request $request, $groupId)
    {
        $request = $this->service->userStore($groupId, $request->all());

        session()->flash('success', [
            'success' => $request['success'],
            'messages' => $request['messages'],
        ]);

        return redirect()->route('group.show', [$groupId]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = $this->repository->find($id);
        $userList = $this->userRepository->selectBoxList();

        return view('groups.show', [
            'group' => $group,
            'user_list' => $userList,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  GroupUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(GroupUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $group = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Group updated.',
                'data'    => $group->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        return redirect()->route('group.index');
    }
}
