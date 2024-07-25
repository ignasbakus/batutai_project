<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrampolineImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trampolineImages = [
            [
                'trampoline_id' => 1,
                'image' => 'images/MickeyMouseNuotraukos/firstMickeyMouse.jpg',
            ],
            [
                'trampoline_id' => 1,
                'image' => 'images/MickeyMouseNuotraukos/20230509_115125.jpg',
            ],
            [
                'trampoline_id' => 1,
                'image' => 'images/MickeyMouseNuotraukos/20230509_115250.jpg',
            ],
            [
                'trampoline_id' => 2,
                'image' => 'images/PimpackiukaiNuotraukos/firstPimpackiukai.jpg',
            ],
            [
                'trampoline_id' => 2,
                'image' => 'images/PimpackiukaiNuotraukos/20230508_125243.jpg',
            ],
            [
                'trampoline_id' => 2,
                'image' => 'images/PimpackiukaiNuotraukos/20230508_125250.jpg',
            ],
            [
                'trampoline_id' => 3,
                'image' => 'images/KempiniukasNuotraukos/firstKempiniukas.jpg',
            ],
            [
                'trampoline_id' => 3,
                'image' => 'images/KempiniukasNuotraukos/20230814_145817.jpg',
            ],
            [
                'trampoline_id' => 3,
                'image' => 'images/KempiniukasNuotraukos/20230814_145952.jpg',
            ],
            [
                'trampoline_id' => 4,
                'image' => 'images/dinoParkasNuotraukos/20230909_125204(1).jpg',
            ],
            [
                'trampoline_id' => 5,
                'image' => 'images/ciuozyklaSuBaseinuNuotraukos/firstCiuozykla.jpg',
            ],
            [
                'trampoline_id' => 5,
                'image' => 'images/ciuozyklaSuBaseinuNuotraukos/20230814_124145.jpg',
            ],
            [
                'trampoline_id' => 5,
                'image' => 'images/ciuozyklaSuBaseinuNuotraukos/20230814_124328.jpg',
            ],
            [
                'trampoline_id' => 6,
                'image' => 'images/DisneyPilisNuotraukos/firstDisney.jpg',
            ],
            [
                'trampoline_id' => 6,
                'image' => 'images/DisneyPilisNuotraukos/20240303_160719.jpg',
            ],
            [
                'trampoline_id' => 6,
                'image' => 'images/DisneyPilisNuotraukos/20240303_160832.jpg',
            ],
            [
                'trampoline_id' => 6,
                'image' => 'images/DisneyPilisNuotraukos/20240303_160853.jpg',
            ],
            [
                'trampoline_id' => 6,
                'image' => 'images/DisneyPilisNuotraukos/20240303_160917.jpg',
            ],
            [
                'trampoline_id' => 7,
                'image' => 'images/BanglentininkasNuotraukos/firstBanglentininkas.jpg',
            ],
            [
                'trampoline_id' => 7,
                'image' => 'images/BanglentininkasNuotraukos/20240303_163700.jpg',
            ],
            [
                'trampoline_id' => 7,
                'image' => 'images/BanglentininkasNuotraukos/20240303_163653.jpg',
            ],
            [
                'trampoline_id' => 8,
                'image' => 'images/pokimonuParkasNuotraukos/20230909_102036.jpg',
            ],
            [
                'trampoline_id' => 8,
                'image' => 'images/pokimonuParkasNuotraukos/20230909_102118.jpg',
            ],
            [
                'trampoline_id' => 8,
                'image' => 'images/pokimonuParkasNuotraukos/20230909_102127.jpg',
            ],
            [
                'trampoline_id' => 8,
                'image' => 'images/pokimonuParkasNuotraukos/20230909_102132.jpg',
            ],
            [
                'trampoline_id' => 8,
                'image' => 'images/pokimonuParkasNuotraukos/20230909_102148.jpg',
            ],
            [
                'trampoline_id' => 9,
                'image' => 'images/titanikasNuotraukos/20230909_111500.jpg',
            ],
            [
                'trampoline_id' => 9,
                'image' => 'images/titanikasNuotraukos/20230909_111611.jpg',
            ],
            [
                'trampoline_id' => 9,
                'image' => 'images/titanikasNuotraukos/20230909_111842.jpg',
            ],
            [
                'trampoline_id' => 10,
                'image' => 'images/pilisNuotraukos/20240616_133406.jpg',
            ],
            [
                'trampoline_id' => 10,
                'image' => 'images/pilisNuotraukos/20240616_133457.jpg',
            ],
        ];
        DB::table('trampoline_images')->insert($trampolineImages);
    }
}
