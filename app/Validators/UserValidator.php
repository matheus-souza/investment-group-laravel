<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UserValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'cpf' => 'required',
            'name' => 'required',
        ],
        ValidatorInterface::RULE_UPDATE => [],
   ];
}
