<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

/**
 * @OA\Schema(
 *     title="User",
 *     description="User model",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="The unique identifier for a user",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="The name of the user",
 *         example="John Doe"
 *     ),
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         format="email",
 *         description="The email address of the user",
 *         example="john@example.com"
 *     ),
 *     @OA\Property(
 *         property="password",
 *         type="string",
 *         format="password",
 *         description="The password of the user",
 *         example="password"
 *     ),
 *     @OA\Property(
 *         property="profile_photo_url",
 *         type="string",
 *         description="The URL of the user's profile photo",
 *         example="https://example.com/profile-photo.jpg"
 *     )
 * )
 */
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
