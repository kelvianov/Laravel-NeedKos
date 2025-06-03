<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpController extends Controller
{
    private $helpData = [
        [
            'title' => 'Cara Mencari Kos yang Sesuai',
            'content' => 'Gunakan fitur pencarian dengan filter lokasi, harga, dan fasilitas untuk menemukan kos yang sesuai dengan kebutuhan Anda.',
            'category' => 'search'
        ],
        [
            'title' => 'Metode Pembayaran yang Tersedia',
            'content' => 'KosKu menerima pembayaran melalui transfer bank (BCA, Mandiri, BNI), e-wallet (OVO, GoPay, DANA), dan kartu kredit.',
            'category' => 'payment'
        ],
        [
            'title' => 'Cara Menjaga Keamanan Akun',
            'content' => 'Gunakan password yang kuat, aktifkan verifikasi 2 langkah, dan jangan bagikan informasi akun Anda dengan siapapun.',
            'category' => 'security'
        ],
        [
            'title' => 'Syarat & Ketentuan Penyewaan',
            'content' => 'Pahami syarat penyewaan termasuk durasi minimal sewa, deposit, dan peraturan kos sebelum melakukan pemesanan.',
            'category' => 'terms'
        ],
        [
            'title' => 'Cara Melakukan Pembayaran',
            'content' => 'Pilih kamar, klik tombol Sewa, pilih metode pembayaran yang diinginkan, dan ikuti petunjuk pembayaran yang muncul.',
            'category' => 'payment'
        ],
        [
            'title' => 'Panduan Survey Kos',
            'content' => 'Anda dapat mengatur jadwal survey melalui fitur chat dengan pemilik kos. Pastikan untuk mengecek lokasi dan fasilitas secara langsung.',
            'category' => 'search'
        ],
        [
            'title' => 'Kebijakan Pembatalan',
            'content' => 'Pembatalan dapat dilakukan sebelum pembayaran dikonfirmasi. Setelah pembayaran, berlaku kebijakan refund sesuai ketentuan pemilik kos.',
            'category' => 'terms'
        ],
        [
            'title' => 'Tips Memilih Kos',
            'content' => 'Perhatikan lokasi, fasilitas, harga, dan review dari penghuni sebelumnya. Lakukan survey langsung sebelum memutuskan.',
            'category' => 'search'
        ]
    ];

    public function index()
    {
        return view('footercontent.support.helpcenter');
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        
        if (!$query) {
            return view('footercontent.support.helpcenter');
        }

        // Search in the help data
        $results = collect($this->helpData)->filter(function ($item) use ($query) {
            return str_contains(strtolower($item['title']), strtolower($query)) ||
                   str_contains(strtolower($item['content']), strtolower($query));
        })->map(function ($item) {
            return (object) [
                'title' => $item['title'],
                'excerpt' => $item['content']
            ];
        })->values();

        return view('footercontent.support.helpcenter', [
            'results' => $results
        ]);
    }
}
