<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: "Trip", properties: [
    new OA\Property(property: "title", type: "string", example: "Mon voyage à Paris"),
    new OA\Property(property: "description", type: "string", example: "Un voyage incroyable à Paris."),
    new OA\Property(property: "start_date", type: "string", format: "date", example: "2023-10-01"),
    new OA\Property(property: "end_date", type: "string", format: "date", example: "2023-10-10"),
    new OA\Property(property: "country", type: "string", example: "France"),
    new OA\Property(property: "city", type: "string", example: "Paris")
])]

class Trip extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'country',
        'city'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'start_date' => 'date',
        'end_date' => 'date',
        'user_id' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
