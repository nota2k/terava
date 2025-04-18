<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: "Profile", properties: [
    new OA\Property(property: "firstname", type: "string", example: ""),
    new OA\Property(property: "lastname", type: "string", example: ""),
    new OA\Property(property: "location", type: "string", example: ""),
    new OA\Property(property: "interests", type: "string", example: ""),
    new OA\Property(property: "bio", type: "string", example: ""),
    new OA\Property(property: "profile_picture", type: "string", example: "")
])]

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profiles';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'location',
        'interests',
        'bio',
        'profile_picture',
        'user_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
    ];

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
