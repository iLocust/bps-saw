<?php

namespace Database\Seeders;

use App\Models\Pekerjaan;
use App\Models\SuratTugas;
use App\Models\Kriterias;
use App\Models\Subkriterias;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'role' => User::ROLE_ADMIN,
                'nim' => '350917000001',
                'name' => 'Dimas',
                'umur' => '23',
                'email' => 'dim@as.s',
                'password' => app('hash')->make('123')
            ],
            [
                'role' => User::ROLE_PEKERJA,
                'nim' => '350917000002',
                'name' => 'Dimas Pekerja',
                'umur' => '20',
                'email' => 'dim2@as.s',
                'password' => app('hash')->make('123')
            ],
            [
                'role' => User::ROLE_PEKERJA,
                'nim' => '350917000004',
                'name' => 'Dimas Pekerja 2',
                'umur' => '20',
                'email' => 'dim3@as.s',
                'password' => app('hash')->make('123')
            ],
            [
                'role' => User::ROLE_PENGAWAS,
                'nim' => '350917000003',
                'name' => 'Dimas Pengawas',
                'email' => 'dim1@as.s',
                'umur' => '21',
                'password' => app('hash')->make('123')
            ]
        ]);

        Kriterias::insert([
            [
                'namaKriteria' => 'Kecepatan Pengumpulan',
                'type' => 'Benefit',
                'bobot' => '4'
            ],
            [
                'namaKriteria' => 'Kerapian Tulisan',
                'type' => 'Benefit',
                'bobot' => '3'
            ],
            [
                'namaKriteria' => 'Subjek Survey',
                'type' => 'Benefit',
                'bobot' => '2'
            ],
            [
                'namaKriteria' => 'Kesusahan Medan',
                'type' => 'Benefit',
                'bobot' => '2'
            ],
            [
                'namaKriteria' => 'Jarak Tempuh',
                'type' => 'Benefit',
                'bobot' => '3'
            ],
            [
                'namaKriteria' => 'Kelengkapan Survey',
                'type' => 'Benefit',
                'bobot' => '3'
            ],
            [
                'namaKriteria' => 'Kerapian Pakaian',
                'type' => 'Benefit',
                'bobot' => '3'
            ],
            [
                'namaKriteria' => 'Tarif',
                'type' => 'Cost',
                'bobot' => '3'
            ],
        ]);

        Subkriterias::insert([
            //Kecepatan Pengumpulan
            [
                'kriteria_id' => '1',
                'nilai' => '10',
                'keterangan' => '1-2 Hari'
            ],
            [
                'kriteria_id' => '1',
                'nilai' => '8',
                'keterangan' => '3-4 Hari'
            ],
            [
                'kriteria_id' => '1',
                'nilai' => '6',
                'keterangan' => '5-6 Hari'
            ],
            [
                'kriteria_id' => '1',
                'nilai' => '4',
                'keterangan' => '7-8 Hari'
            ],
            [
                'kriteria_id' => '1',
                'nilai' => '2',
                'keterangan' => '9-10 Hari'
            ],
            [
                'kriteria_id' => '1',
                'nilai' => '1',
                'keterangan' => '>10 Hari'
            ],

            // Kerapian Tulisan
            [
                'kriteria_id' => '2',
                'nilai' => '3',
                'keterangan' => 'Rapi'
            ],
            [
                'kriteria_id' => '2',
                'nilai' => '2',
                'keterangan' => 'Sedang'
            ],
            [
                'kriteria_id' => '2',
                'nilai' => '1',
                'keterangan' => 'Tidak Rapi'
            ],

            // Subjek Survey
            [
                'kriteria_id' => '3',
                'nilai' => '4',
                'keterangan' => 'Sangat Sulit'
            ],
            [
                'kriteria_id' => '3',
                'nilai' => '3',
                'keterangan' => 'Sulit'
            ],
            [
                'kriteria_id' => '3',
                'nilai' => '2',
                'keterangan' => 'Biasa'
            ],
            [
                'kriteria_id' => '3',
                'nilai' => '1',
                'keterangan' => 'Mudah'
            ],

            // Kesusahan Medan
            [
                'kriteria_id' => '4',
                'nilai' => '3',
                'keterangan' => 'Sulit'
            ],
            [
                'kriteria_id' => '4',
                'nilai' => '2',
                'keterangan' => 'Biasa'
            ],
            [
                'kriteria_id' => '4',
                'nilai' => '1',
                'keterangan' => 'Mudah'
            ],

            // Jarak Tempuh
            [
                'kriteria_id' => '5',
                'nilai' => '5',
                'keterangan' => '>10 KM'
            ],
            [
                'kriteria_id' => '5',
                'nilai' => '4',
                'keterangan' => '7 - 10 KM'
            ],
            [
                'kriteria_id' => '5',
                'nilai' => '3',
                'keterangan' => '5 - 7 KM'
            ],
            [
                'kriteria_id' => '5',
                'nilai' => '2',
                'keterangan' => '3 - 5 KM'
            ],
            [
                'kriteria_id' => '5',
                'nilai' => '1',
                'keterangan' => '0 - 3 KM'
            ],

            // Kelengkapan Survey
            [
                'kriteria_id' => '6',
                'nilai' => '3',
                'keterangan' => 'Lengkap'
            ],
            [
                'kriteria_id' => '6',
                'nilai' => '2',
                'keterangan' => 'Cukup'
            ],
            [
                'kriteria_id' => '6',
                'nilai' => '1',
                'keterangan' => 'Tidak Lengkap'
            ],

            // Kerapian Pakaian
            [
                'kriteria_id' => '7',
                'nilai' => '3',
                'keterangan' => 'Rapi'
            ],
            [
                'kriteria_id' => '7',
                'nilai' => '2',
                'keterangan' => 'Sedang'
            ],
            [
                'kriteria_id' => '7',
                'nilai' => '1',
                'keterangan' => 'Tidak Rapi'
            ],

            // Tarif Cost
            [
                'kriteria_id' => '8',
                'nilai' => '1',
                'keterangan' => 'Irit'
            ],
            [
                'kriteria_id' => '8',
                'nilai' => '2',
                'keterangan' => 'Cukup'
            ],
            [
                'kriteria_id' => '8',
                'nilai' => '3',
                'keterangan' => 'Boros'
            ],

        ]);

        collect([
            'Survei SITASI',
            'Survei KSA Padi',
            'Survei KSA Jagung',
            'Survei Ubinan',
            'Susenas',
            'Sakernas',
        ])->each(function ($p) {
            Pekerjaan::create(['nama' => $p]);
        });

        SuratTugas::factory()->count(10)->create();
        // Kriterias::factory()->count(8)->create();
    }
}
