<?php

namespace App\Http\Controllers;

use App\Entities\Group;
use App\Entities\Moviment;
use App\Entities\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\MovimentCreateRequest;
use App\Http\Requests\MovimentUpdateRequest;
use App\Repositories\MovimentRepository;
use App\Validators\MovimentValidator;
use Auth;


class MovimentsController extends Controller
{

    /**
     * @var MovimentRepository
     */
    protected $repository;

    /**
     * @var MovimentValidator
     */
    protected $validator;

    public function __construct(MovimentRepository $repository, MovimentValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MovimentCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(MovimentCreateRequest $request)
    {
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
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  MovimentUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(MovimentUpdateRequest $request, $id)
    {
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
    }

    public function application()
    {
        $user = Auth::user();
        $group_list = $user->groups->pluck('name', 'id');
        $product_list = Product::all()->pluck('name', 'id');

        return view('moviment.application', [
            'group_list' => $group_list,
            'product_list' => $product_list,
        ]);
    }

    public function storeApplication(Request $request)
    {
        $moviment = Moviment::create([
            'user_id' => Auth::user()->id,
            'group_id' => $request->get('group_id'),
            'product_id' => $request->get('product_id'),
            'value' => $request->get('value'),
            'type' => 1,
        ]);

        session()->flash('success', [
            'success' => true,
            'messages' => "Aplicação de {$moviment->value} no produto {$moviment->product->name} foi realizada com sucesso",
        ]);

        return redirect()->route('moviment.application');
    }
}
