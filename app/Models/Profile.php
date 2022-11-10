<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = "profile_information";

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id', 'site', 'bio', 'photo', 'phone_number', 'sex'
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @param int $userId
     * @return mixed
     */
    public static function createProfileInfo(int $userId): mixed {
        return self::create([
            'user_id' => $userId,
            'photo'   => 'profile.png'
        ]);
    }

    /**
     * Updating profile information
     *
     * @param int $userId
     * @param ?string $site
     * @param ?string $bio
     * @param ?string $phoneNumber
     * @param ?string $sex
     * @return mixed
     */
    public static function updateInfo(int $userId, ?string $site, ?string $bio, ?string $phoneNumber, ?string $sex): mixed{
        return self::where('user_id', $userId)
            ->update([
                'site'         => $site,
                'bio'          => $bio,
                'phone_number' => $phoneNumber,
                'sex'          => $sex
            ]);
    }
}
