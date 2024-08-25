<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
<<<<<<< HEAD
        'type',
        'profile_photo',
=======
        'type'
>>>>>>> 439e065beafc921ae4803bf84f22e5d816594b82
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Interact with the user's first name.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function type(): Attribute
    {
        return new Attribute(
<<<<<<< HEAD
            get: fn($value) =>  ["user", "admin", "manager"][$value],
        );
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
=======
            get: fn ($value) =>  ["user", "admin", "manager"][$value],
        );
    }
>>>>>>> 439e065beafc921ae4803bf84f22e5d816594b82
}
