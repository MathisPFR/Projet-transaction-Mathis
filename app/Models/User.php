<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="User",
 *     type="object",
 *     title="User",
 *     description="User model",
 *     required={"name", "email", "password"},
 *     @OA\Property(
 *         property="id",
 *         description="ID de l'utilisateur",
 *         type="integer",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="name",
 *         description="Nom de l'utilisateur",
 *         type="string",
 *         example="John Doe"
 *     ),
 *     @OA\Property(
 *         property="email",
 *         description="Adresse email de l'utilisateur",
 *         type="string",
 *         format="email",
 *         example="johndoe@example.com"
 *     ),
 *     @OA\Property(
 *         property="email_verified_at",
 *         description="Date de vérification de l'email",
 *         type="string",
 *         format="datetime",
 *         example="2024-01-01T12:30:00.000000Z"
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         description="Date de création de l'utilisateur",
 *         type="string",
 *         format="datetime",
 *         example="2024-01-01T12:00:00.000000Z"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         description="Date de mise à jour de l'utilisateur",
 *         type="string",
 *         format="datetime",
 *         example="2024-01-01T12:30:00.000000Z"
 *     ),
 *     @OA\Property(
 *         property="profile_photo_url",
 *         description="URL de la photo de profil",
 *         type="string",
 *         example="https://example.com/photo.jpg"
 *     )
 * )
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasProfilePhoto, Notifiable, TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relation avec les transactions.
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
