<?php

namespace App\Services;

use Illuminate\Database\QueryException;
use Exception;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;

class UserService
{
    private $repository;
    private $validator;

    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function store($data)
    {
        try {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $usuario = $this->repository->create($data);

            return [
                'success' => true,
                'messages' => 'Usuário cadastrado',
                'data' => $usuario,
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
    {    try {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $usuario = $this->repository->update($data, $id);

            return [
                'success' => true,
                'messages' => 'Usuário atualizado',
                'data' => $usuario,
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

    public function delete($userId)
    {
        try {
            $this->repository->delete($userId);

            return [
                'success' => true,
                'messages' => 'Usuário removido',
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
}
