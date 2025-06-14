<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'category',
        'priority',
        'subject',
        'message',
        'status',
        'read_at',
        'admin_id',
        'admin_notes',
    ];

    protected $casts = [
        'read_at' => 'datetime',
    ];

    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function markAsRead(?int $adminId = null): void
    {
        if (!$this->read_at) {
            $updateData = ['read_at' => now()];
            if ($adminId) {
                $updateData['admin_id'] = $adminId;
            }
            $this->update($updateData);
        }
    }

    public function scopeUnread($query)
    {
        return $query->whereNull('read_at');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }
}
