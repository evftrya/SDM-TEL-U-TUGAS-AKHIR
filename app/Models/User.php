<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Non-incrementing ID (UUID)
     */
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * Fillable attributes
     */
    protected $fillable = [
        'nama_lengkap',
        'telepon',
        'alamat',
        'email_institusi',
        'jenis_kelamin',
        'tempat_lahir',
        'tgl_lahir',
        'tgl_bergabung',
        'email_pribadi',
        'email_verified_at',
        'username',
        'password_hash',
        'is_admin',
        'remember_token',
    ];

    /**
     * Hidden attributes
     */
    protected $hidden = [
        'password_hash',
        'remember_token',
    ];

    /**
     * Casts
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password_hash' => 'hashed',
            'is_admin' => 'boolean',
        ];
    }

    /**
     * Use password_hash for authentication
     */
    public function getAuthPassword()
    {
        return $this->password_hash;
    }

    /**
     * Auto-hash password when set
     */
    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => ['password_hash' => \Illuminate\Support\Facades\Hash::make($value)]
        );
    }

    /**
     * Auto-generate UUID when creating new User
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }
}
