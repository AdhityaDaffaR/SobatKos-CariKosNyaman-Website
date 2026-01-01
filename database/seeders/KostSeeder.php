<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KostSeeder extends Seeder
{
    public function run()
    {
        $kosts = [
            // --- AREA BANDUNG UTARA (ITB/UNPAD) ---
            [
                'nama_kost' => 'Kost Executive Dago Asri',
                'tipe' => 'Campur',
                'harga' => 2500000,
                'lokasi' => 'Dago Atas, Bandung',
                'alamat_lengkap' => 'Jl. Dago Asri No. 88, Coblong, Bandung',
                'deskripsi' => 'Hunian sejuk dengan view bukit. Dekat ITB dan Unpad Dipatiukur. Sangat tenang untuk belajar.',
                'fasilitas' => 'AC,WiFi,Water Heater,Balkon Pribadi,Parkir Mobil,Security',
                'gambar_url' => 'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?q=80&w=2070&auto=format&fit=crop',
                'nama_pemilik' => 'Kang Asep',
                'no_hp_pemilik' => '080000000000',
                'rating' => 4.9,
            ],
            [
                'nama_kost' => 'Wisma Dipatiukur',
                'tipe' => 'Putra',
                'harga' => 1200000,
                'lokasi' => 'Dipatiukur, Bandung',
                'alamat_lengkap' => 'Jl. Dipatiukur Gang 4 (Belakang Unpad), Bandung',
                'deskripsi' => 'Kost putra strategis tinggal jalan kaki ke kampus Unpad/ITB. Banyak tempat makan murah.',
                'fasilitas' => 'Kasur,Meja Belajar,Lemari,WiFi Kencang,Kamar Mandi Luar',
                'gambar_url' => 'https://images.unsplash.com/photo-1555854877-bab0e564b8d5?q=80&w=2070&auto=format&fit=crop',
                'nama_pemilik' => 'Pak Dadang',
                'no_hp_pemilik' => '080000000000',
                'rating' => 4.5,
            ],
            [
                'nama_kost' => 'Paviliun Cisitu Indah',
                'tipe' => 'Putri',
                'harga' => 1500000,
                'lokasi' => 'Cisitu, Bandung',
                'alamat_lengkap' => 'Jl. Cisitu Indah No. 10, Dago, Bandung',
                'deskripsi' => 'Kost putri aman dengan penjagaan 24 jam. Udara masih sangat segar pagi hari.',
                'fasilitas' => 'Kamar Mandi Dalam,Dapur Bersama,Kulkas,WiFi,Mesin Cuci',
                'gambar_url' => 'https://images.unsplash.com/photo-1598928506311-c55ded91a20c?q=80&w=2070&auto=format&fit=crop',
                'nama_pemilik' => 'Ibu Neni',
                'no_hp_pemilik' => '080000000000',
                'rating' => 4.7,
            ],
            [
                'nama_kost' => 'Kost Kanayakan Baru',
                'tipe' => 'Campur',
                'harga' => 1800000,
                'lokasi' => 'Coblong, Bandung',
                'alamat_lengkap' => 'Jl. Kanayakan Baru, Dago, Bandung',
                'deskripsi' => 'Bangunan baru minimalis industrial. Cocok untuk mahasiswa tingkat akhir atau pekerja.',
                'fasilitas' => 'AC,Smart TV,Meja Kerja Luas,Rooftop,Free Kopi',
                'gambar_url' => 'https://images.unsplash.com/photo-1505691938895-1758d7feb511?q=80&w=2070&auto=format&fit=crop',
                'nama_pemilik' => 'Mas Raka',
                'no_hp_pemilik' => '080000000000',
                'rating' => 4.8,
            ],
            [
                'nama_kost' => 'Pondok Tubagus Ismail',
                'tipe' => 'Putra',
                'harga' => 950000,
                'lokasi' => 'Tubagus Ismail, Bandung',
                'alamat_lengkap' => 'Jl. Tubagus Ismail Bawah, Dago, Bandung',
                'deskripsi' => 'Kost hemat budget di kawasan elit. Akses angkot mudah 24 jam.',
                'fasilitas' => 'Kasur,Lemari,WiFi,Parkir Motor,Dapur Umum',
                'gambar_url' => 'https://images.unsplash.com/photo-1512918580421-b2feee3b85a6?q=80&w=2070&auto=format&fit=crop',
                'nama_pemilik' => 'Pak Iman',
                'no_hp_pemilik' => '080000000000',
                'rating' => 4.3,
            ],

            // --- AREA JATINANGOR (UNPAD/IPDN/ITB) ---
            [
                'nama_kost' => 'Grand Jatinangor Residence',
                'tipe' => 'Campur',
                'harga' => 2000000,
                'lokasi' => 'Jatinangor (Dekat IPDN)', 
                'alamat_lengkap' => 'Jl. Raya Jatinangor No. 45, Sumedang',
                'deskripsi' => 'Kost rasa apartemen tepat di depan gerbang IPDN. Fasilitas premium.',
                'fasilitas' => 'AC,Water Heater,Gym,Minimarket,Security,Access Card',
                'gambar_url' => 'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?q=80&w=2070&auto=format&fit=crop',
                'nama_pemilik' => 'Pak Haji Umuh',
                'no_hp_pemilik' => '080000000000',
                'rating' => 4.8,
            ],
            [
                'nama_kost' => 'Kost Putri Ciseke',
                'tipe' => 'Putri',
                'harga' => 850000,
                'lokasi' => 'Ciseke, Jatinangor',
                'alamat_lengkap' => 'Gg. Ciseke Besar, Jatinangor, Sumedang',
                'deskripsi' => 'Kost legendaris di Ciseke. Dekat pusat jajanan dan laundry murah.',
                'fasilitas' => 'Kasur,Lemari,Kamar Mandi Luar,WiFi,Ruang Tamu',
                'gambar_url' => 'https://images.unsplash.com/photo-1616593969747-4797dc75033e?q=80&w=2070&auto=format&fit=crop',
                'nama_pemilik' => 'Teh Elis',
                'no_hp_pemilik' => '080000000000',
                'rating' => 4.4,
            ],
            [
                'nama_kost' => 'Wisma Sayang Jatinangor',
                'tipe' => 'Putra',
                'harga' => 1100000,
                'lokasi' => 'Desa Sayang, Jatinangor',
                'alamat_lengkap' => 'Desa Sayang, Jatinangor, Sumedang',
                'deskripsi' => 'Suasana tenang agak masuk dari jalan raya. Cocok buat yang tidak suka bising.',
                'fasilitas' => 'Kamar Mandi Dalam,Kasur,Meja,WiFi,Parkir Luas',
                'gambar_url' => 'https://images.unsplash.com/photo-1540518614846-7eded433c457?q=80&w=2057&auto=format&fit=crop',
                'nama_pemilik' => 'Kang Dedi',
                'no_hp_pemilik' => '080000000000',
                'rating' => 4.5,
            ],
            [
                'nama_kost' => 'Apartemen Pinewood (Sewa Unit)',
                'tipe' => 'Campur',
                'harga' => 2800000,
                'lokasi' => 'Jatos, Jatinangor',
                'alamat_lengkap' => 'Jl. Raya Jatinangor (Area Jatos), Sumedang',
                'deskripsi' => 'Sewa unit studio full furnished di atas Mall Jatos. Praktis dan modern.',
                'fasilitas' => 'AC,TV,Kitchen Set,Kulkas,Kolam Renang,Mall Access',
                'gambar_url' => 'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?q=80&w=2070&auto=format&fit=crop',
                'nama_pemilik' => 'Ibu Lilis',
                'no_hp_pemilik' => '080000000000',
                'rating' => 4.9,
            ],

            // --- AREA BUAH BATU (TELKOM UNIV) ---
            [
                'nama_kost' => 'Kost Batununggal Indah',
                'tipe' => 'Campur',
                'harga' => 2200000,
                'lokasi' => 'Batununggal, Bandung',
                'alamat_lengkap' => 'Komplek Batununggal Indah, Buah Batu, Bandung',
                'deskripsi' => 'Kost di dalam komplek elit. Aman, bersih, dekat Tol Buah Batu.',
                'fasilitas' => 'AC,Water Heater,Springbed Queen,WiFi,Security Cluster',
                'gambar_url' => 'https://images.unsplash.com/photo-1493809842364-78817add7ffb?q=80&w=2070&auto=format&fit=crop',
                'nama_pemilik' => 'Pak Hendra',
                'no_hp_pemilik' => '080000000000',
                'rating' => 4.8,
            ],
            [
                'nama_kost' => 'Griya ISBI Bandung',
                'tipe' => 'Putri',
                'harga' => 1000000,
                'lokasi' => 'Buah Batu, Bandung',
                'alamat_lengkap' => 'Jl. Buah Batu (Dekat Kampus ISBI), Bandung',
                'deskripsi' => 'Kost khusus mahasiswi seni/ISBI. Lingkungan kreatif dan ramah.',
                'fasilitas' => 'Kasur,Lemari,Cermin Besar,WiFi,Dapur',
                'gambar_url' => 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?q=80&w=2158&auto=format&fit=crop',
                'nama_pemilik' => 'Teteh Seni',
                'no_hp_pemilik' => '080000000000',
                'rating' => 4.6,
            ],
            [
                'nama_kost' => 'Kost Karyawan Telkom',
                'tipe' => 'Putra',
                'harga' => 1600000,
                'lokasi' => 'Bojongsoang, Bandung',
                'alamat_lengkap' => 'Jl. Terusan Buah Batu (Dekat Telkom Univ), Bandung',
                'deskripsi' => 'Kost favorit mahasiswa Telkom University. Internet fiber optik super cepat.',
                'fasilitas' => 'Kamar Mandi Dalam,WiFi 100Mbps,Meja Belajar Luas',
                'gambar_url' => 'https://images.unsplash.com/photo-1595526114035-0d45ed16cfbf?q=80&w=2070&auto=format&fit=crop',
                'nama_pemilik' => 'Bang Jago',
                'no_hp_pemilik' => '080000000000',
                'rating' => 4.5,
            ],

            // --- AREA CIMAHI ---
            [
                'nama_kost' => 'Kost Baros Cimahi',
                'tipe' => 'Campur',
                'harga' => 800000,
                'lokasi' => 'Baros, Cimahi',
                'alamat_lengkap' => 'Jl. Baros, Cimahi Tengah',
                'deskripsi' => 'Kost sederhana dekat gerbang tol Baros dan RS Dustira.',
                'fasilitas' => 'Kasur,Lemari,Kamar Mandi Luar,Parkir Motor',
                'gambar_url' => 'https://images.unsplash.com/photo-1501876725168-00c445821c9e?q=80&w=2070&auto=format&fit=crop',
                'nama_pemilik' => 'Pak RT',
                'no_hp_pemilik' => '080000000000',
                'rating' => 4.2,
            ],
            [
                // --- PERBAIKAN FINAL: UNJANI ---
                'nama_kost' => 'Rumah Kost Unjani',
                'tipe' => 'Putri',
                'harga' => 900000,
                'lokasi' => 'Padasuka, Cimahi',
                'alamat_lengkap' => 'Jl. Terusan Jenderal Sudirman (Dekat Unjani), Cimahi',
                'deskripsi' => 'Spesial untuk mahasiswi Unjani. Jalan kaki 5 menit ke kampus.',
                'fasilitas' => 'Kasur,Meja,WiFi,Ruang TV Bersama',
                'gambar_url' => 'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?q=80&w=2000&auto=format&fit=crop',
                'nama_pemilik' => 'Bu Tati',
                'no_hp_pemilik' => '080000000000',
                'rating' => 4.4,
            ],

            // --- AREA LEMBANG ---
            [
                'nama_kost' => 'Villa Kost Lembang',
                'tipe' => 'Campur',
                'harga' => 1500000,
                'lokasi' => 'Lembang, Bandung Barat',
                'alamat_lengkap' => 'Jl. Raya Lembang (Dekat Farmhouse), Bandung Barat',
                'deskripsi' => 'Suasana villa pegunungan. Dingin tanpa AC. Cocok untuk pekerja pariwisata.',
                'fasilitas' => 'Water Heater (Wajib),WiFi,Halaman Luas,View Gunung',
                'gambar_url' => 'https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?q=80&w=2064&auto=format&fit=crop',
                'nama_pemilik' => 'Abah Udjo',
                'no_hp_pemilik' => '080000000000',
                'rating' => 4.7,
            ],
        ];

        foreach ($kosts as $kost) {
            DB::table('kosts')->insert(array_merge($kost, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}