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
                'image' => 'images/MickyMouseNuotraukos/updated.Micky_mouse.jpg',
            ],
            [
                'trampoline_id' => 1,
                'image' => 'images/MickyMouseNuotraukos/mickis.1.jpg',
            ],
            [
                'trampoline_id' => 1,
                'image' => 'images/MickyMouseNuotraukos/mikis.2.jpg',
            ],
            [
                'trampoline_id' => 2,
                'image' => 'images/PimpackiukaiNuotraukos/updated.pimpackiukai.jpg',
            ],
            [
                'trampoline_id' => 2,
                'image' => 'images/PimpackiukaiNuotraukos/pimpac.1.jpg',
            ],
            [
                'trampoline_id' => 2,
                'image' => 'images/PimpackiukaiNuotraukos/pimpac.2.jpg',
            ],
            [
                'trampoline_id' => 2,
                'image' => 'images/PimpackiukaiNuotraukos/pimpac.3.jpg',
            ],
            [
                'trampoline_id' => 3,
                'image' => 'images/KempiniukasNuotraukos/updated.kampiniukas.jpg',
            ],
            [
                'trampoline_id' => 3,
                'image' => 'images/KempiniukasNuotraukos/kempiniukas.1.jpg',
            ],
            [
                'trampoline_id' => 3,
                'image' => 'images/KempiniukasNuotraukos/kempiniukas.2.jpg',
            ],
            [
                'trampoline_id' => 4,
                'image' => 'images/dinoParkasNuotraukos/dino_parkas.2.jpg',
            ],
            [
                'trampoline_id' => 4,
                'image' => 'images/dinoParkasNuotraukos/updated.dino-parkas.fromside.png',
            ],
            [
                'trampoline_id' => 4,
                'image' => 'images/dinoParkasNuotraukos/dino.1.jpg',
            ],
            [
                'trampoline_id' => 4,
                'image' => 'images/dinoParkasNuotraukos/dino.2.jpg',
            ],
            [
                'trampoline_id' => 4,
                'image' => 'images/dinoParkasNuotraukos/dino.3.jpg',
            ],
            [
                'trampoline_id' => 5,
                'image' => 'images/ciuozyklaSuBaseinuNuotraukos/updated.ciuozykla.jpg',
            ],
            [
                'trampoline_id' => 5,
                'image' => 'images/ciuozyklaSuBaseinuNuotraukos/ciuozykla.1.jpg',
            ],
            [
                'trampoline_id' => 5,
                'image' => 'images/ciuozyklaSuBaseinuNuotraukos/ciuozykla.2.jpg',
            ],
            [
                'trampoline_id' => 6,
                'image' => 'images/disneyPilis/updated.disney_pilis.jpg',
            ],
            [
                'trampoline_id' => 6,
                'image' => 'images/disneyPilis/disney.1.jpg',
            ],
            [
                'trampoline_id' => 6,
                'image' => 'images/disneyPilis/disney.2.jpg',
            ],
            [
                'trampoline_id' => 7,
                'image' => 'images/BanglentininkasNuotraukos/updated.banglentininkas.jpg',
            ],
            [
                'trampoline_id' => 7,
                'image' => 'images/BanglentininkasNuotraukos/banglentininkas.1.jpg',
            ],
            [
                'trampoline_id' => 7,
                'image' => 'images/BanglentininkasNuotraukos/banglentininkas.2.jpg',
            ],
            [
                'trampoline_id' => 7,
                'image' => 'images/BanglentininkasNuotraukos/banglentininkas.3.jpg',
            ],
            [
                'trampoline_id' => 8,
                'image' => 'images/pokimonuParkasNuotraukos/updated.pokimonai.jpg',
            ],
            [
                'trampoline_id' => 8,
                'image' => 'images/pokimonuParkasNuotraukos/pokimon.1.png',
            ],
            [
                'trampoline_id' => 8,
                'image' => 'images/pokimonuParkasNuotraukos/pokimon.2.png',
            ],
            [
                'trampoline_id' => 8,
                'image' => 'images/pokimonuParkasNuotraukos/pokimon.3.png',
            ],
            [
                'trampoline_id' => 9,
                'image' => 'images/titanikasNuotraukos/updated.titanikas.jpg',
            ],
            [
                'trampoline_id' => 9,
                'image' => 'images/titanikasNuotraukos/titanikas.1.jpg',
            ],
            [
                'trampoline_id' => 9,
                'image' => 'images/titanikasNuotraukos/titanikas.2.jpg',
            ],
            [
                'trampoline_id' => 10,
                'image' => 'images/pilisNuotraukos/updated.pilis.jpg',
            ],
            [
                'trampoline_id' => 10,
                'image' => 'images/pilisNuotraukos/pilis.1.jpg',
            ],
        ];
        DB::table('trampoline_images')->insert($trampolineImages);
    }
}
