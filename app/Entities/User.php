<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cpf',
        'name',
        'phone',
        'birth',
        'gender',
        'notes',
        'email',
        'password',
        'status',
        'permission',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'user_groups');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = env('PASSWORD_HASH') ? bcrypt($value) : $value;
    }

    public function getFormattedCpfAttribute()
    {
        $cpf = $this->attributes['cpf'];
        return $this->mask($cpf, '###.###.###-##');
    }

    public function getFormattedPhoneAttribute()
    {
        $phone = $this->attributes['phone'];
        return $this->mask($phone, '(##) #####-####');
    }

    public function getFormattedBirthAttribute()
    {
        $birth = new \DateTime($this->attributes['birth']);
        $birth = $birth->format('d-m-Y');
        $birth = str_replace('-', '', $birth);

        return $this->mask($birth, '##/##/####');
    }

    /**
     * Function for applicking mask in string
     *
     * @param $val
     * @param $mask
     * @return string
     */
    private function mask($val, $mask)
    {
        $maskared = '';
        $k = 0;
        for ($i = 0; $i <= strlen($mask) - 1; $i++) {
            if ($mask[$i] == '#') {
                if (isset($val[$k])) {
                    $maskared .= $val[$k++];
                }
            } else {
                if (isset($mask[$i])) {
                    $maskared .= $mask[$i];
                }
            }
        }
        return $maskared;
    }
}
