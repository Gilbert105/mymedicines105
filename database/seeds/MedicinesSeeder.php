<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Kategori 1
        DB::table('medicines')->insert([
            'generic_name' => 'fentanil',
            'form' => 'inj 0,05 mg/mL (i.m./i.v.) ',
            'restriction_formula' => '5 amp/kasus',
            'description' => 'Hanya untuk nyeri berat dan harus diberikan oleh tim medis yang dapat melakukan resusitasi.',
            'category' => '1',
            'faskes_tk1' => '0',
            'faskes_tk2' => '1',
            'faskes_tk3' => '1',
            'price' => 12000,
            'image' => 'Fentanyl_0,05.png'

        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'fentanil',
            'form' => 'patch 12,5 mcg/jam',
            'restriction_formula' => '10 patch/bulan.',
            'description' => ' -Untuk nyeri kronik pada pasien kanker yang tidak terkendali.
            - Tidak untuk nyeri akut.',
            'category' => '1',
            'faskes_tk1' => '0',
            'faskes_tk2' => '1',
            'faskes_tk3' => '1',
            'price' => 15000,
            "image" => 'fentanil_patch_125.jpg'
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'fentanil',
            'form' => 'patch 25 mcg/jam',
            'restriction_formula' => '10 patch/bulan.',
            'description' => ' -Untuk nyeri kronik pada pasien kanker yang tidak terkendali.
            - Tidak untuk nyeri akut.',
            'category' => '1',
            'faskes_tk1' => '0',
            'faskes_tk2' => '1',
            'faskes_tk3' => '1',
            'price' => 30000,
            'image' => 'fentanil_patch_25.jpg'
        ]);
        // Kategori 2
        DB::table('medicines')->insert([
            'generic_name' => 'asam mefenamat',
            'form' => 'kaps 250 mg',
            'restriction_formula' => '30 kaps/bulan.',
            'description' => '',
            'category' => '2',
            'faskes_tk1' => '1',
            'faskes_tk2' => '1',
            'faskes_tk3' => '1',
            'price' => '40000',
            'image' => 'asam_mefenamat_250.jpg'
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'ibuprofen*',
            'form' => 'tab 200 mg',
            'restriction_formula' => '30 tab/bulan.',
            'description' => '',
            'category' => '2',
            'faskes_tk1' => '1',
            'faskes_tk2' => '1',
            'faskes_tk3' => '1',
            'price' => '7000',
            'image' => 'ibuprofentab_200mg.jpg'
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'ibuprofen*',
            'form' => 'tab 400 mg',
            'restriction_formula' => '30 tab/bulan.',
            'description' => '',
            'category' => '2',
            'faskes_tk1' => '1',
            'faskes_tk2' => '1',
            'faskes_tk3' => '1',
            'price' => '10000',
            'image' => 'ibuprofentab_400mg.jpg'
        ]);
        // Kategori 3
        DB::table('medicines')->insert([
            'generic_name' => 'alopurinol',
            'form' => 'tab 100 mg*',
            'restriction_formula' => '30 tab/bulan.',
            'description' => 'Tidak diberikan pada saat nyeri akut.',
            'category' => '3',
            'faskes_tk1' => '1',
            'faskes_tk2' => '1',
            'faskes_tk3' => '1',
            'price' => '5000',
            'image' => 'alopurinol_tab_100mg.jpg'
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'alopurinol',
            'form' => 'tab 300 mg',
            'restriction_formula' => '30 tab/bulan.',
            'description' => 'Tidak diberikan pada saat nyeri akut.',
            'category' => '3',
            'faskes_tk1' => '1',
            'faskes_tk2' => '1',
            'faskes_tk3' => '1',
            'price' => '12000',
            'image' => 'alopurinol_tab_300mg.jpg'
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'kolkisin',
            'form' => 'tab 500 mcg',
            'restriction_formula' => '30 tab/bulan.',
            'description' => '',
            'category' => '3',
            'faskes_tk1' => '1',
            'faskes_tk2' => '1',
            'faskes_tk3' => '1',
            'price' => '20000',
            'image' => 'kolkisin_tab_500_mcg.png'
        ]);
        //Kategori 4
        DB::table('medicines')->insert([
            'generic_name' => 'amitriptilin',
            'form' => 'tab 25 mg',
            'restriction_formula' => '30 tab/bulan.',
            'description' => '',
            'category' => '4',
            'faskes_tk1' => '1',
            'faskes_tk2' => '1',
            'faskes_tk3' => '1',
            'price' => '13500',
            'image' => 'amitriptyline_25mg.jpg'
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'gabapentin',
            'form' => 'kaps 100 mg',
            'restriction_formula' => '60 kaps/bulan.',
            'description' => 'Hanya untuk neuralgia pascaherpes atau nyeri neuropati diabetikum.',
            'category' => '4',
            'faskes_tk1' => '0',
            'faskes_tk2' => '1',
            'faskes_tk3' => '1',
            'price' => '21250',
            'image' => 'gabapentin_kaps_100mg.jpg'
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'gabapentin',
            'form' => 'kaps 300 mg',
            'restriction_formula' => '30 kaps/bulan',
            'description' => 'Hanya untuk neuralgia pascaherpes atau nyeri neuropati diabetikum.',
            'category' => '4',
            'faskes_tk1' => '0',
            'faskes_tk2' => '1',
            'faskes_tk3' => '1',
            'price' => '10000',
            'image' => 'gabapentin_kaps_300mg.jpg'
        ]);
        //Kategori 5
        DB::table('medicines')->insert([
            'generic_name' => 'bupivakain',
            'form' => 'inj 0,5%',
            'restriction_formula' => '',
            'description' => '',
            'category' => '5',
            'faskes_tk1' => '0',
            'faskes_tk2' => '1',
            'faskes_tk3' => '1',
            'price' => '5000',
            'image' => 'bupivakain_inj_05.jpg'
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'bupivakain heavy',
            'form' => 'inj 0,5% + glukosa 8%',
            'restriction_formula' => '',
            'description' => 'Khusus untuk analgesia spinal.',
            'category' => '5',
            'faskes_tk1' => '0',
            'faskes_tk2' => '1',
            'faskes_tk3' => '1',
            'price' => '5500',
            'image' => 'bupivakain_heavy.jpg'
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'etil klorida',
            'form' => 'spray 100 mL',
            'restriction_formula' => '',
            'description' => '',
            'category' => '5',
            'faskes_tk1' => '1',
            'faskes_tk2' => '1',
            'faskes_tk3' => '1',
            'price' => '10000',
            'image' => 'etilklorida_spray_100ml.jpg'
        ]);
        //Kategori 6
        DB::table('medicines')->insert([
            'generic_name' => 'deksmedetomidin',
            'form' => 'inj 100 mcg/mL',
            'restriction_formula' => '',
            'description' => 'Untuk sedasi pada pasien di ICU, kraniotomi, bedah jantung dan operasi yang memerlukan waktu pembedahan yang lama.',
            'category' => '6',
            'faskes_tk1' => '0',
            'faskes_tk2' => '1',
            'faskes_tk3' => '1',
            'price' => '20000',
            'image' => 'deksmedetomidin_inj_100_mcg_mL.jpg'
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'desfluran',
            'form' => 'ih',
            'restriction_formula' => '',
            'description' => '',
            'category' => '6',
            'faskes_tk1' => '0',
            'faskes_tk2' => '1',
            'faskes_tk3' => '1',
            'price' => '30000',
            'image' => 'desfluranih.jpg'
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'halotan',
            'form' => 'ih',
            'restriction_formula' => '',
            'description' => 'a)Tidak boleh digunakan berulang.
            b) Tidak untuk pasien dengan gangguan fungsi hati.',
            'category' => '6',
            'faskes_tk1' => '0',
            'faskes_tk2' => '1',
            'faskes_tk3' => '1',
            'price' => '15000',
            'image' => 'halotan.png'
        ]);
        //Kategori 7
        DB::table('medicines')->insert([
            'generic_name' => 'atropin',
            'form' => 'inj 0,25 mg/mL (i.v./s.k.)',
            'restriction_formula' => '',
            'description' => '',
            'category' => '7',
            'faskes_tk1' => '1',
            'faskes_tk2' => '1',
            'faskes_tk3' => '1',
            'price' => '20000',
            'image' => 'atropin_inj_025.jpg'
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'diazepam',
            'form' => 'inj 5 mg/mL',
            'restriction_formula' => '',
            'description' => '',
            'category' => '7',
            'faskes_tk1' => '1',
            'faskes_tk2' => '1',
            'faskes_tk3' => '1',
            'price' => '12500',
            'image' => 'Diazepam_inj_5mg.png'
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'midazolam',
            'form' => 'inj 1 mg/mL (i.v.)',
            'restriction_formula' => '- Dosis rumatan:
            1 mg/jam (24 mg/hari).
            - Dosis premedikasi:
            8 vial/kasus.',
            'description' => 'Dapat digunakan untuk premedikasi sebelum induksi anestesi dan rumatan selama anestesi umum.',
            'category' => '7',
            'faskes_tk1' => '0',
            'faskes_tk2' => '1',
            'faskes_tk3' => '1',
            'price' => '10000',
            'image' => 'midazolam_inj_1mg.jpg'
        ]);
        //kategori 8
        DB::table('medicines')->insert([
            'generic_name' => 'deksametason',
            'form' => 'inj 5 mg/mL',
            'restriction_formula' => '20 mg/hari.',
            'description' => '',
            'category' => '8',
            'faskes_tk1' => '1',
            'faskes_tk2' => '1',
            'faskes_tk3' => '1',
            'price' => '20000',
            'image' => 'deksametason_inj_5mg.jpg'
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'difenhidramin',
            'form' => 'inj 10 mg/mL (i.v./i.m.)',
            'restriction_formula' => '30 mg/hari',
            'description' => '',
            'category' => '8',
            'faskes_tk1' => '1',
            'faskes_tk2' => '1',
            'faskes_tk3' => '1',
            'price' => '12500',
            'image' => 'difenhidramin_inj_10mg.jpg'
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'epinefrin (adrenalin)',
            'form' => 'inj 1 mg/mL',
            'restriction_formula' => '',
            'description' => '',
            'category' => '8',
            'faskes_tk1' => '1',
            'faskes_tk2' => '1',
            'faskes_tk3' => '1',
            'price' => '14500',
            'image' => 'epinefrin_adrenalin_inj_1_mg_ml.jpg'
        ]);
        //kategori 9
        DB::table('medicines')->insert([
            'generic_name' => 'atropin',
            'form' => 'tab 0,5 mg',
            'restriction_formula' => '',
            'description' => '',
            'category' => '9',
            'faskes_tk1' => '1',
            'faskes_tk2' => '1',
            'faskes_tk3' => '1',
            'price' => '9500',
            'image' => 'atropin_tab_05mg.jpg'
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'atropin',
            'form' => 'inj 0,25 mg/mL (i.v.)',
            'restriction_formula' => '',
            'description' => '',
            'category' => '9',
            'faskes_tk1' => '1',
            'faskes_tk2' => '1',
            'faskes_tk3' => '1',
            'price' => '17500',
            'image' => 'atropin_tab_025mg.jpg'
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'efedrin',
            'form' => 'inj 50 mg/mL',
            'restriction_formula' => '',
            'description' => '',
            'category' => '9',
            'faskes_tk1' => '0',
            'faskes_tk2' => '1',
            'faskes_tk3' => '1',
            'price' => '30000',
            'image' => 'efedrin_inj_50mg_ml.jpg'
        ]);
        //Kategori 10
        DB::table('medicines')->insert([
            'generic_name' => 'diazepam',
            'form' => 'inj 5 mg/mL',
            'restriction_formula' => '10 amp/kasus, kecuali untuk kasus di ICU.',
            'description' => 'Tidak untuk i.m.',
            'category' => '10',
            'faskes_tk1' => '1',
            'faskes_tk2' => '1',
            'faskes_tk3' => '1',
            'price' => '13000',
            'image' => 'Diazepam_inj_5mg.png'
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'diazepam',
            'form' => 'enema 5 mg/2,5 mL',
            'restriction_formula' => '2 tube/hari, bila kejang.',
            'description' => '',
            'category' => '10',
            'faskes_tk1' => '1',
            'faskes_tk2' => '1',
            'faskes_tk3' => '1',
            'price' => '8500',
            'image' => 'Diazepam_enema_5mg.png'
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'diazepam',
            'form' => 'enema 10 mg/2,5 mL',
            'restriction_formula' => '2 tube/hari, bila kejang.',
            'description' => '',
            'category' => '10',
            'faskes_tk1' => '1',
            'faskes_tk2' => '1',
            'faskes_tk3' => '1',
            'price' => '17000',
            'image' => 'Diazepam_enema_10mg.png'
        ]);
    }
}
