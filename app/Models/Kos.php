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

    /**
     * Get users who saved this kos
     */
    public function savedBy()
    {
        return $this->hasMany(SavedKos::class);
    }

    /**
     * Get users who saved this kos (through pivot)
     */
    public function savedByUsers()
    {
        return $this->belongsToMany(User::class, 'saved_kos', 'kos_id', 'user_id')->withTimestamps();
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

    /**
     * Extract city and area from address for breadcrumb
     */
    public function getLocationInfoAttribute()
    {
        $address = strtolower($this->address);
        
        // List of Indonesian cities to check
        $cities = [
            'jakarta' => 'Jakarta',
            'bandung' => 'Bandung', 
            'yogyakarta' => 'Yogyakarta',
            'yogya' => 'Yogyakarta',
            'surabaya' => 'Surabaya',
            'malang' => 'Malang',
            'semarang' => 'Semarang',
            'medan' => 'Medan',
            'palembang' => 'Palembang',
            'denpasar' => 'Denpasar',
            'bali' => 'Bali',
            'bekasi' => 'Bekasi',
            'tangerang' => 'Tangerang',
            'bogor' => 'Bogor'
        ];

        $provinces = [
            'jakarta' => 'DKI Jakarta',
            'bandung' => 'Jawa Barat',
            'yogyakarta' => 'DI Yogyakarta',
            'yogya' => 'DI Yogyakarta',
            'surabaya' => 'Jawa Timur',
            'malang' => 'Jawa Timur',
            'semarang' => 'Jawa Tengah',
            'medan' => 'Sumatera Utara',
            'palembang' => 'Sumatera Selatan',
            'denpasar' => 'Bali',
            'bali' => 'Bali',
            'bekasi' => 'Jawa Barat',
            'tangerang' => 'Banten',
            'bogor' => 'Jawa Barat'
        ];
        
        // Find city in address
        $detectedCity = 'Indonesia';
        $detectedProvince = 'Indonesia';
        
        foreach ($cities as $searchKey => $cityName) {
            if (str_contains($address, $searchKey)) {
                $detectedCity = $cityName;
                $detectedProvince = $provinces[$searchKey] ?? 'Indonesia';
                break;
            }
        }
        
        return [
            'city' => $detectedCity,
            'province' => $detectedProvince
        ];
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }


}