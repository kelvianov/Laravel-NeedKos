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

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $kos = \App\Models\Kos::all();
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
        $query = $request->get('query');
        
        if (empty($query)) {
            return redirect()->route('index');
        }

        $matchedLocations = [];
        $searchQuery = strtolower($query);

        // Search in cities and their areas
        foreach ($this->indonesianCities as $city => $areas) {
            if (stripos($city, $searchQuery) !== false) {
                // If city matches, include city and all its areas
                $matchedLocations[] = $city;
                $matchedLocations = array_merge($matchedLocations, $areas);
            } else {
                // Search in areas
                foreach ($areas as $area) {
                    if (stripos($area, $searchQuery) !== false) {
                        $matchedLocations[] = $area;
                        // Include parent city if area matches
                        if (!in_array($city, $matchedLocations)) {
                            $matchedLocations[] = $city;
                        }
                    }
                }
            }
        }

        // If no locations matched, try direct address search
        if (empty($matchedLocations)) {
            $kos = Kos::where('address', 'like', "%{$query}%")
                     ->orderBy('created_at', 'desc')
                     ->get();
        } else {
            // Search for kos in matched locations
            $kos = Kos::where(function($q) use ($matchedLocations, $query) {
                foreach ($matchedLocations as $location) {
                    $q->orWhere('address', 'like', "%{$location}%");
                }
                // Also include direct address matches
                $q->orWhere('address', 'like', "%{$query}%");
            })->orderBy('created_at', 'desc')->get();
        }

        return view('landing.index', [
            'kos' => $kos,
            'searchQuery' => $query,
            'locations' => $this->getFormattedLocations(),
            'matchedLocations' => $matchedLocations
        ]);
    }


    public function testimonials()
    {
        return view('landing.testimonials');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
