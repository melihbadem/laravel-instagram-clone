<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @return mixed
     */
    public static function createUser(string $name, string $email, string $password)
    {
        return self::create([
            'name'     => $name,
            'email'    => $email,
            'password' => bcrypt($password)
        ]);
    }

    /**
     * The password is updated in a hashed form.
     *
     * @param int $userId
     * @param string $password
     * @return mixed
     */
    public static function updatePassword(int $userId, string $password): mixed {
        return self::whereId($userId)
            ->update([
                'password' => bcrypt($password)
            ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function getProfileInfo(): \Illuminate\Database\Eloquent\Relations\HasOne {
        return $this->hasOne(Profile::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getPosts(): \Illuminate\Database\Eloquent\Relations\HasMany{
        return $this->hasMany(Post::class)
            ->orderBy('id', 'desc');
    }
}
