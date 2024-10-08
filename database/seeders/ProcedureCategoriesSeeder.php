<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProcedureCategories;
use Illuminate\Support\Facades\DB;

class ProcedureCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('procedure_categories')->insert([
            [
                'name' => 'bark',
            ],
            [
                'name' => 'kolano',
            ],
            [
                'name' => 'biodro',
            ],
            [
                'name' => 'ręka',
            ],
            [
                'name' => 'łokieć',
            ],
            [
                'name' => 'staw skokowy',
            ],
            [
                'name' => 'stopa',
            ],
            [
                'name' => 'kręgosłup',
            ],
            [ 
                'name' => 'inne zabiegi',
            ],

            
        ]);

    }
}
