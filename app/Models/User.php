<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\CustomVerifyEmail;
use App\Notifications\CustomResetPassword;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'avatar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isOwner(): bool
    {
        return $this->role === 'owner';
    }

    public function isTenant()
    {
        return $this->role === 'tenant';
    }

    public function kos()
    {
        return $this->hasMany(Kos::class, 'user_id');
    }

    /**
     * Get the saved kos for this user
     */
    public function savedKos()
    {
        return $this->hasMany(SavedKos::class);
    }

    /**
     * Get the kos that this user has saved (through pivot)
     */
    public function savedKosItems()
    {
        return $this->belongsToMany(Kos::class, 'saved_kos', 'user_id', 'kos_id')->withTimestamps();
    }

    /**
     * Check if user has saved a specific kos
     */
    public function hasSavedKos($kosId)
    {
        return $this->savedKos()->where('kos_id', $kosId)->exists();
    }
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomVerifyEmail);
    }
    
    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPassword($token));
    }
}
