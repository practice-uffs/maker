<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    const ADMIN = 'admin';
    const NORMAL = 'normal';    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'username',
        'uid',
        'cpf',
        'type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Meta information about Livewire crud crud
     *
     * @var array
     */
    public static $crud = [
        'fields' => [
            'name' => [
                'label' => 'Nome',
                'validation' => 'required',
                'list_column' => true
            ],
            'email' => [
                'label' => 'E-mail',
                'validation' => 'required',                
                'list_column' => true
            ],  
            'username' => [
                'label' => 'Username',
                'validation' => 'required',                
                'list_column' => true
            ],
            'type' => [
                'label' => 'Privilégio',
                'type' => 'select',
                'validation' => 'required',
                'options' => [
                    self::ADMIN => 'Administrador',
                    self::NORMAL => 'Normal (cliente)',
                ],
                'list_column' => true
            ],
        ]
    ];

    public function isAdmin() {
        return $this->type == SELF::ADMIN;
    }
}
