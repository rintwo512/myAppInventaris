<?php

namespace Database\Seeders;

use App\Models\Ac;
use App\Models\CctvMonitor1;
use App\Models\User;
use App\Models\Chart;
use App\Models\Session;
use Illuminate\Database\Seeder;
use Illuminate\Database\DBAL\TimestampType;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(1)->create();
        // Ac::factory(20)->create();
        Session::factory(1)->create();

        User::create([
            'name' => 'Meong',
            'nik' => "15920011",
            'image' => 'default.png',
            'password' => bcrypt('admin'),
            'status_login' => 'offline',
            'role' => 1,
            'is_active' => 1
        ]);

        // CctvMonitor1::create([
        //     'lantai' => 'Lantai 1',
        //     'wing' => 'Wing A',
        //     'lokasi' => 'Lobby',
        //     'merk' => 'Hikvision',
        //     'type' => 'Analog',
        //     'status' => 'Rusak',
        //     'kerusakan' => 'Kamera rusak',
        //     'resolusi' => '2MP',
        //     'tgl_pemasangan' => '1 April, 2015',
        //     'petugas_pemasangan' => 'Vendor',
        //     'sandi_dvr' => 'telkom/pola Z',
        //     'user_id' => 1
        // ]);

        // Chart::create([
        //     'tahun' => '2020',
        //     'bulan' => 'Januari',
        //     'total' => '15'
        // ]);

        // Chart::create([
        //     'tahun' => '2020',
        //     'bulan' => 'Februari',
        //     'total' => '22'
        // ]);
        // Chart::create([
        //     'tahun' => '2020',
        //     'bulan' => 'Maret',
        //     'total' => '4'
        // ]);
        // Chart::create([
        //     'tahun' => '2020',
        //     'bulan' => 'April',
        //     'total' => '7'
        // ]);
        // Chart::create([
        //     'tahun' => '2020',
        //     'bulan' => 'Mei',
        //     'total' => '12'
        // ]);
        // Chart::create([
        //     'tahun' => '2020',
        //     'bulan' => 'Juni',
        //     'total' => '9'
        // ]);
        // Chart::create([
        //     'tahun' => '2020',
        //     'bulan' => 'Juli',
        //     'total' => '3'
        // ]);
        // Chart::create([
        //     'tahun' => '2020',
        //     'bulan' => 'Agustus',
        //     'total' => '22'
        // ]);
        // Chart::create([
        //     'tahun' => '2020',
        //     'bulan' => 'September',
        //     'total' => '6'
        // ]);
        // Chart::create([
        //     'tahun' => '2020',
        //     'bulan' => 'Oktober',
        //     'total' => '8'
        // ]);
        // Chart::create([
        //     'tahun' => '2020',
        //     'bulan' => 'November',
        //     'total' => '25'
        // ]);
        // Chart::create([
        //     'tahun' => '2020',
        //     'bulan' => 'Desember',
        //     'total' => '35'
        // ]);




        // Chart::create([
        //     'tahun' => '2021',
        //     'bulan' => 'Januari',
        //     'total' => '15'
        // ]);

        // Chart::create([
        //     'tahun' => '2021',
        //     'bulan' => 'Februari',
        //     'total' => '22'
        // ]);
        // Chart::create([
        //     'tahun' => '2021',
        //     'bulan' => 'Maret',
        //     'total' => '4'
        // ]);
        // Chart::create([
        //     'tahun' => '2021',
        //     'bulan' => 'April',
        //     'total' => '9'
        // ]);
        // Chart::create([
        //     'tahun' => '2021',
        //     'bulan' => 'Mei',
        //     'total' => '8'
        // ]);
        // Chart::create([
        //     'tahun' => '2021',
        //     'bulan' => 'Juni',
        //     'total' => '9'
        // ]);
        // Chart::create([
        //     'tahun' => '2021',
        //     'bulan' => 'Juli',
        //     'total' => '7'
        // ]);
        // Chart::create([
        //     'tahun' => '2021',
        //     'bulan' => 'Agustus',
        //     'total' => '11'
        // ]);
        // Chart::create([
        //     'tahun' => '2021',
        //     'bulan' => 'September',
        //     'total' => '6'
        // ]);
        // Chart::create([
        //     'tahun' => '2021',
        //     'bulan' => 'Oktober',
        //     'total' => '8'
        // ]);
        // Chart::create([
        //     'tahun' => '2021',
        //     'bulan' => 'November',
        //     'total' => '20'
        // ]);
        // Chart::create([
        //     'tahun' => '2021',
        //     'bulan' => 'Desember',
        //     'total' => '23'
        // ]);
    }
}
