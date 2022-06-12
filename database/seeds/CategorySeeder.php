<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'ANALGESIK NARKOTIK',
            'description(additional)' => ''
        ]);
        DB::table('categories')->insert([
            'name' => 'ANALGESIK NON NARKOTIK',
            'description(additional)' => ''
        ]);
        DB::table('categories')->insert([
            'name' => 'ANTIPIRAI',
            'description(additional)' => ''
        ]);
        DB::table('categories')->insert([
            'name' => 'NYERI NEUROPATIK',
            'description(additional)' => ''
        ]);
        DB::table('categories')->insert([
            'name' => 'ANESTETIK LOKAL',
            'description(additional)' => ''
        ]);
        DB::table('categories')->insert([
            'name' => 'ANESTETIK UMUM dan OKSIGEN',
            'description(additional)' => ''
        ]);
        DB::table('categories')->insert([
            'name' => 'OBAT untuk PROSEDUR PRE OPERATIF',
            'description(additional)' => ''
        ]);
        DB::table('categories')->insert([
            'name' => 'ANTIALERGI dan OBAT untuk ANAFILAKSIS',
            'description(additional)' => ''
        ]);
        DB::table('categories')->insert([
            'name' => 'ANTIDOT dan OBAT LAIN untuk KERACUNAN KHUSUS',
            'description(additional)' => ''
        ]);
        DB::table('categories')->insert([
            'name' => 'ANTIEPILEPSI - ANTIKONVULSI',
            'description(additional)' => ''
        ]);
    }
}
