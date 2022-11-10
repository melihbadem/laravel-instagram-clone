<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'content', 'image', 'user_id', 'created_at', 'updated_at'
    ];

    /**
     * Adding new instagram post
     *
     * @param string $content
     * @param string $image
     * @param int $userId
     * @return mixed
     */
    public static function addNewPost(string $content, string $image, int $userId): mixed {
        return self::create([
            'content'    => $content,
            'image'      => $image,
            'user_id'    => $userId,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function getUser(): \Illuminate\Database\Eloquent\Relations\HasOne{
        return $this->hasOne(User::class, "id", "user_id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function getUserProfileInfo(): \Illuminate\Database\Eloquent\Relations\HasOne{
        return $this->hasOne(Profile::class, 'user_id', 'user_id');
    }
}
