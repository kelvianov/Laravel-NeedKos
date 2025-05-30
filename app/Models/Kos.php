<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kos extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'description',
        'facilities',
        'price',
        'image',
        'rules',
        'contact_person',
        'user_id',  // pastikan ini bisa diisi mass assignment
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id'); // relasi ke pemilik kos
    }
}
