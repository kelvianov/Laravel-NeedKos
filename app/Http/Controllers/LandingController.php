<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kos;

class LandingController extends Controller
{
    private $indonesianCities = [
        'Jakarta' => [
            'Menteng', 'Kemang', 'Kuningan', 'Sudirman', 'Thamrin', 'Tebet', 'Kelapa Gading'
        ],
        'Bandung' => [
            'Dago', 'Riau', 'Buah Batu', 'Pasteur', 'Setiabudi', 'Dipatiukur', 'Ciumbuleuit'
        ],
        'Yogyakarta' => [
            'Malioboro', 'Seturan', 'Jakal', 'Kaliurang', 'Prawirotaman', 'Gejayan', 'Babarsari'
        ],
        'Surabaya' => [
            'Gubeng', 'Wonokromo', 'Darmo', 'Rungkut', 'Wiyung', 'Mulyorejo', 'Tenggilis'
        ],
        'Malang' => [
            'Soekarno Hatta', 'Dieng', 'Sawojajar', 'Sulfat', 'Tidar', 'Tlogomas', 'Lowokwaru'
        ],
        'Semarang' => [
            'Tembalang', 'Pleburan', 'Banyumanik', 'Pedurungan', 'Gayamsari', 'Ngaliyan'
        ]
    ];

    private $popularAreas = [
        'Jakarta' => ['Kemang', 'Menteng', 'Kebayoran Baru', 'Kelapa Gading', 'Tebet'],
        'Bandung' => ['Dago', 'Setiabudi', 'Cihampelas', 'Pasteur', 'Buah Batu'],
        'Surabaya' => ['Gubeng', 'Wonokromo', 'Rungkut', 'Wiyung', 'Kenjeran'],
        'Yogyakarta' => ['Malioboro', 'Seturan', 'Kaliurang', 'Pogung', 'Jakal'],
        'Semarang' => ['Tembalang', 'Pleburan', 'Pedurungan', 'Banyumanik', 'Ngaliyan']
    ];

    // Definisi area pusat kota untuk beberapa kota
    private $pusatKotaAreas = [
        'Jakarta' => ['Menteng', 'Sudirman', 'Thamrin', 'Kebayoran Baru'],
        'Bandung' => ['Dago', 'Riau', 'Setiabudi'],
        'Yogyakarta' => ['Malioboro', 'Seturan', 'Kaliurang'],
        'Surabaya' => ['Gubeng', 'Wonokromo', 'Darmo'],
        'Semarang' => ['Tembalang', 'Pleburan', 'Pedurungan'],
        'Malang' => ['Soekarno Hatta', 'Dieng', 'Sawojajar'],
    ];

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kos = Kos::orderBy('created_at', 'desc')->paginate(10);
        $locations = $this->getFormattedLocations();
        return view('landing.index', compact('kos', 'locations'));
    }

    private function getFormattedLocations()
    {
        $formatted = [];
        foreach ($this->indonesianCities as $cityName => $areas) {
            $formatted[] = [
                'name' => $cityName,
                'areas' => array_map(function($area) {
                    return [
                        'name' => $area,
                    ];
                }, $areas)
            ];
        }
        return $formatted;
    }

    public function search(Request $request)
    {
        $query = strtolower(trim($request->get('query')));
        $gender = $request->get('gender');
        $priceRange = $request->get('price_range');

        if (empty($query) && empty($gender) && empty($priceRange)) {
            return redirect()->route('index');
        }

        $matchedLocations = [];
        $kosQuery = Kos::query();

        // Jika pencarian mengandung kata 'pusat kota'
        if (strpos($query, 'pusat kota') !== false) {
            // Gabungkan semua area pusat kota
            $allPusatKotaAreas = [];
            foreach ($this->pusatKotaAreas as $areas) {
                $allPusatKotaAreas = array_merge($allPusatKotaAreas, $areas);
            }

            $kosQuery->where(function($q) use ($allPusatKotaAreas) {
                foreach ($allPusatKotaAreas as $area) {
                    $q->orWhere('address', 'like', "%{$area}%");
                }
                $q->orWhere('address', 'like', "%pusat kota%"); // Jika ada kata literal
            });
        } else {
            // Logika pencarian biasa berdasarkan kota dan area
            foreach ($this->indonesianCities as $city => $areas) {
                if (stripos($city, $query) !== false) {
                    $matchedLocations[] = $city;
                    $matchedLocations = array_merge($matchedLocations, $areas);
                } else {
                    foreach ($areas as $area) {
                        if (stripos($area, $query) !== false) {
                            $matchedLocations[] = $area;
                            if (!in_array($city, $matchedLocations)) {
                                $matchedLocations[] = $city;
                            }
                        }
                    }
                }
            }

            if (!empty($matchedLocations)) {
                $kosQuery->where(function($q) use ($matchedLocations, $query) {
                    foreach ($matchedLocations as $location) {
                        $q->orWhere('address', 'like', "%{$location}%");
                    }
                    $q->orWhere('address', 'like', "%{$query}%");
                });
            } elseif (!empty($query)) {
                $kosQuery->where('address', 'like', "%{$query}%");
            }
        }

        // Filter gender jika ada
        if ($gender) {
            $kosQuery->where('gender', $gender);
        }

        // Filter price_range jika ada
        if ($priceRange) {
            $rangeParts = explode('-', $priceRange);
            if (count($rangeParts) === 2) {
                [$min, $max] = $rangeParts;
                $kosQuery->whereBetween('price', [(int)$min, (int)$max]);
            }
        }

        $kos = $kosQuery->orderBy('created_at', 'desc')->paginate(10);

        return view('landing.index', [
            'kos' => $kos,
            'searchQuery' => $query,
            'locations' => $this->getFormattedLocations(),
            'matchedLocations' => $matchedLocations,
            'genderFilter' => $gender,
            'priceRangeFilter' => $priceRange,
        ]);
    }

    public function testimonials()
    {
        return view('landing.testimonials');
    }
}
