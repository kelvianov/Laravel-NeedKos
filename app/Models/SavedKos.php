<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedKos extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kos_id',
    ];

    /**
     * Get the user who saved the kos
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the saved kos
     */
    public function kos()
    {
        return $this->belongsTo(Kos::class);
    }
}
