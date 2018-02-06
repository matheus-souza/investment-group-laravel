<?php

namespace App\Services;

use Illuminate\Database\QueryException;
use Exception;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;
use App\Repositories\GroupRepository;
use App\Validators\GroupValidator;

class GroupService
{
    private $repository;
    private $validator;

    public function __construct(GroupRepository $repository, GroupValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function store($data)
    {
        try {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $group = $this->repository->create($data);

            return [
                'success' => true,
                'messages' => 'Grupo cadastrado',
                'data' => $group,
            ];
        } catch (Exception $e) {
            switch (get_class($e)) {
                case QueryException::class:
                    return ['success' => false, 'messages' => 'Erro de execução: ' . $e->getMessage(), 'class:' => get_class($e)];
                case ValidatorException::class:
                    return ['success' => false, 'messages' => 'Erro de execução: ' . $e->getMessageBag(), 'class:' => get_class($e)];
                case Exception::class:
                    return ['success' => false, 'messages' => 'Erro de execução: ' . $e->getMessage(), 'class:' => get_class($e)];
                default:
                    return ['success' => false, 'messages' => 'Erro de execução: ' . $e->getMessage(), 'class:' => get_class($e)];
            }
        }
    }

    public function userStore($groupId, $data)
    {
        try {
            $group = $this->repository->find($groupId);
            $userId = $data['user_id'];

            $group->users()->attach($userId);

            return [
                'success' => true,
                'messages' => 'Usuário relacionado com sucesso',
                'data' => null,
            ];
        } catch (Exception $e) {
            switch (get_class($e)) {
                case QueryException::class:
                    return ['success' => false, 'messages' => 'Erro de execução: ' . $e->getMessage(), 'class:' => get_class($e)];
                case ValidatorException::class:
                    return ['success' => false, 'messages' => 'Erro de execução: ' . $e->getMessageBag(), 'class:' => get_class($e)];
                case Exception::class:
                    return ['success' => false, 'messages' => 'Erro de execução: ' . $e->getMessage(), 'class:' => get_class($e)];
                default:
                    return ['success' => false, 'messages' => 'Erro de execução: ' . $e->getMessage(), 'class:' => get_class($e)];
            }
        }
    }

    public function update($data, $id)
    {
        try {
        $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
        $group = $this->repository->update($data, $id);

        return [
            'success' => true,
            'messages' => 'Grupo atualizado',
            'data' => $group,
        ];
    } catch (Exception $e) {
        switch (get_class($e)) {
            case QueryException::class:
                return ['success' => false, 'messages' => 'Erro de execução: ' . $e->getMessage(), 'class:' => get_class($e)];
            case ValidatorException::class:
                return ['success' => false, 'messages' => 'Erro de execução: ' . $e->getMessageBag(), 'class:' => get_class($e)];
            case Exception::class:
                return ['success' => false, 'messages' => 'Erro de execução: ' . $e->getMessage(), 'class:' => get_class($e)];
            default:
                return ['success' => false, 'messages' => 'Erro de execução: ' . $e->getMessage(), 'class:' => get_class($e)];
        }
    }
    }
}
