<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: "User", properties: [
    new OA\Property(property: "username", type: "string", example: ""),
    new OA\Property(property: "email", type: "string", example: ""),
    new OA\Property(property: "password", type: "string", example: "")
])]

class User extends Model
{
    use HasFactory;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'accept_policy',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class, 'user_id', 'id');
    }

    // protected static function booted()
    // {
    //     static::created(function (User $user) {
    //         // Créer un profil associé à l'utilisateur
    //         $user->profile()->create([
    //             'firstname' => '', // Exemple : utiliser le nom de l'utilisateur comme username
    //             'lastname' => '', // Valeur par défaut
    //             'location' => '', // Valeur par défaut
    //             'interests' => '', // Valeur par défaut
    //             'bio' => '', // Valeur par défaut
    //             'profile_picture' => '', // Valeur par défaut
    //         ]);
    //     });
    // }
}
