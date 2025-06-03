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
        'gender',
        'rules',
        'contact_person',
        'user_id',  // pastikan ini bisa diisi mass assignment
    ];

    protected $casts = [
        'image' => 'array',
        'facilities' => 'array',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id'); // relasi ke pemilik kos
    }

    public function getGenderLabelAttribute()
{
    return match($this->gender) {
        'male' => 'Laki-laki',
        'female' => 'Perempuan',
        'mixed' => 'Campuran',
        default => 'Standard',
    };
}


}