<?php

namespace App\Services;

use Illuminate\Database\QueryException;
use Exception;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;
use App\Repositories\InstitutionRepository;
use App\Validators\InstitutionValidator;

class InstitutionService
{
    private $repository;
    private $validator;

    public function __construct(InstitutionRepository $repository, InstitutionValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function store($data)
    {
        try {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $institution = $this->repository->create($data);

            return [
                'success' => true,
                'messages' => 'Instituição cadastrada',
                'data' => $institution,
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
