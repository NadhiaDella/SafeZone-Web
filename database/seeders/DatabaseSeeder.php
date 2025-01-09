<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Insert roles
        $roles = [
            ['name' => 'Admin'],
            ['name' => 'Guest'],
            ['name' => 'Dokter'],
            ['name' => 'Advokat'],
        ];
        DB::table(table: 'roles')->insert($roles);

        // Insert users
        $users = [
            [
                'role_id' => 1,
                'name' => 'Admin',
                'description' => null,
                'image' => null,
                'cv_image' => null,
                'email' => 'safezone@admin.com',
                'password' => Hash::make('123'),
             ],
            [
                'role_id' => 2,
                'name' => 'Nadhia Della',
                'description' => null,
                'image' => null,
                'cv_image' => null,
                'email' => 'della@gmail.com',
                'password' => Hash::make('123'),
            ],
            [
                'role_id' => 2,
                'name' => 'Madan Pratama',
                'description' => null,
                'image' => null,
                'cv_image' => null,
                'email' => 'madan@gmail.com',
                'password' => Hash::make('123'),
            ],
            [
                'role_id' => 2,
                'name' => 'Bima Kuku Bima',
                'description' => null,
                'image' => null,
                'cv_image' => null,
                'email' => 'bima@gmail.com',
                'password' => Hash::make('123'),
            ],
            [
                'role_id' => 3,
                'name' => 'Dr. Sarah Amelia, M.Psi.',
                'description' => 'Psikolog berlisensi dengan lebih dari 10 tahun pengalaman dalam membantu individu menghadapi masalah kesehatan mental, emosional, dan perilaku.',
                'image' => 'konselor1.webp',
                'cv_image' => 'cvpsikolog1.webp',
                'email' => 'Sarah@gmail.com',
                'password' => Hash::make('123')
            ],
            [
                'role_id' => 3,
                'name' => 'Dini Ariana, M.Psi.',
                'description' => 'Psikolog dengan fokus pada pengobatan gangguan kecemasan dan trauma pendekatan Acceptance and Commitment Therapy (ACT).',
                'image' => 'konselor2.webp',
                'cv_image' => 'cvpsikolog2.webp',
                'email' => 'dini@gmail.com',
                'password' => Hash::make('123'),
            ],
            [
                'role_id' => 3,
                'name' => 'Rina Kartika, M.Psi.',
                'description' => 'Psikolog klinis spesialis anak dan remaja dengan fokus pada gangguan perkembangan kesehatan mental, tingkah laku, dan sifat yang terjadi pada anak dan remaja.',
                'image' => 'konselor3.webp',
                'cv_image' => 'cvpsikolog3.webp',
                'email' => 'rina@gmail.com',
                'password' => Hash::make('123'),
            ],
            [
                'role_id' => 3,
                'name' => 'Jeff Santoso, S.Psi., M.Psi.',
                'description' => 'Ahli dalam terapi kognitif-behavioral (CBT) dan mindfulness untuk mendukung kesehatan mental klien secara menyeluruh.',
                'image' => 'konselor4.webp',
                'cv_image' => 'cvpsikolog4.webp',
                'email' => 'jeff@gmail.com',
                'password' => Hash::make('123'),
            ],
            [
                'role_id' => 3,
                'name' => 'Dr. Andy Chriss, S.Psi., M.Psi., Ph.D.',
                'description' => 'Psikolog dengan spesialisasi dalam psikologi klinis dan berpengalaman dalam menangani apapun masalah kesehatan mental pasien.',
                'image' => 'konselor5.webp',
                'cv_image' => 'cvpsikolog5.webp',
                'email' => 'andy@gmail.com',
                'password' => Hash::make('123'),
            ],
            [
                'role_id' => 4,
                'name' => 'Andi Wijaya, S.H., M.H.',
                'description' => null,
                'image' => 'pengacara1.webp',
                'cv_image' => 'cvadvokat6.webp',
                'email' => 'andi.wijaya@lawjustice.com',
                'password' => Hash::make('123'),
            ],
            [
                'role_id' => 4,
                'name' => 'Dian Purnama, S.H., M.H.',
                'description' => null,
                'image' => 'pengacara2.webp',
                'cv_image' => 'cvadvokat1.webp',
                'email' => 'dian.purnama@lawdefense.com',
                'password' => Hash::make('123'),
            ],
            [
                'role_id' => 4,
                'name' => 'Kristi Dewi, S.H., M.H.',
                'description' => null,
                'image' => 'pengacara3.webp',
                'cv_image' => 'cvadvokat2.webp',
                'email' => 'kristi.dewi@lawprotection.com',
                'password' => Hash::make('123'),
            ],
            [
                'role_id' => 4,
                'name' => 'Arnold Rahman, S.H., M.H.',
                'description' => null,
                'image' => 'pengacara4.webp',
                'cv_image' => 'cvadvokat4.webp',
                'email' => 'arnold.rahman@justiceadvocates.com',
                'password' => Hash::make('123'),
            ],
            [
                'role_id' => 4,
                'name' => 'Joseph Simanjuntak, S.H., M.H.',
                'description' => null,
                'image' => 'pengacara5.webp',
                'cv_image' => 'cvadvokat5.webp',
                'email' => 'joseph.simanjuntak@legalcare.com',
                'password' => Hash::make('123'),
            ]
        ];

        //dd($users);

        DB::table('users')->insert($users);


        // Insert reason_complainers
        $reasonComplainers = [
            ['name' => 'Saya seorang saksi yang khawatir dengan keadaan korban'],
            ['name' => 'Saya seorang korban yang memerlukan bantuan pemulihan'],
            ['name' => 'Saya seorang korban yang memerlukan bantuan dan pendampingan hukum'],
        ];
        DB::table('reason_complainers')->insert($reasonComplainers);

        // Insert what_u_needs
        $whatUNeeds = [
            ['name' => 'Konseling Psikologis'],
            ['name' => 'Konseling Rohani / Spiritual'],
            ['name' => 'Bantuan Hukum'],
            ['name' => 'Bantuan Medis'],
            ['name' => 'Tidak Membutuhkan Pendampingan'],
        ];

        DB::table('what_u_needs')->insert($whatUNeeds);

        $formtypes = [
            ['type' => 'Pengaduan'],
            ['type' => 'Bantuan Hukum'],
            ['type' => 'Konseling'],
        ];

        DB::table('form_types')->insert($formtypes);
        
        $doctors = [
            [
                'user_id' => 5,
                'title' => 'Sosiologi',
                'price_voice_call' => 14000,
                'price_video_call' => 16000,
                'price_concul_offline' => 27700
            ],
            [
                'user_id' => 6,
                'title' => 'Ilmu Islam',
                'price_voice_call' => 14000,
                'price_video_call' => 16000,
                'price_concul_offline' => 27700
            ],
            [
                'user_id' => 7,
                'title' => 'Psikolog',
                'price_voice_call' => 14000,
                'price_video_call' => 16000,
                'price_concul_offline' => 27700
            ],
            [
                'user_id' => 8,
                'title' => 'Psikolog',
                'price_voice_call' => 14000,
                'price_video_call' => 16000,
                'price_concul_offline' => 27700
            ],
            [
                'user_id' => 9,
                'title' => 'Psikolog',
                'price_voice_call' => 14000,
                'price_video_call' => 16000,
                'price_concul_offline' => 27700
            ],
        ];
        DB::table('doctors')->insert($doctors);

        $advocats = [
            [
                'user_id' => 10,
                'title' => 'Hukum',
                'price_voice_call' => 10000,
                'price_video_call' => 15000,
                'price_concul_offline' => 20000
            ],
            [
                'user_id' => 11,
                'title' => 'Guru Besar Hukum',
                'price_voice_call' => 10000,
                'price_video_call' => 15000,
                'price_concul_offline' => 20000
            ],
            [
                'user_id' => 12,
                'title' => 'Hukum Hukuman',
                'price_voice_call' => 10000,
                'price_video_call' => 15000,
                'price_concul_offline' => 20000
            ],
            [
                'user_id' => 13,
                'title' => 'Hukum Hukuman',
                'price_voice_call' => 10000,
                'price_video_call' => 15000,
                'price_concul_offline' => 20000
            ],
            [
                'user_id' => 14,
                'title' => 'Hukum Hukuman',
                'price_voice_call' => 10000,
                'price_video_call' => 15000,
                'price_concul_offline' => 20000
            ],
        ];
        DB::table('advocats')->insert($advocats);

    }
}
