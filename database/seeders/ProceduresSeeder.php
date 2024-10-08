<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class ProceduresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('procedures')->insert([
            [
                'name' => 'Rekonstrukcja ścięgna głowy długiej bicepsa',
                'procedure_category_id' => 1,
            ],
            [
                'name' => 'Rekonstrukcja stożka rotatorów stawu ramiennego',
                'procedure_category_id' => 1,
            ],
            [
                'name' => 'Tenodeza ścięgna bicepsa (długiej głowy mięśnia dwugłowego ramienia)',
                'procedure_category_id' => 1,
            ],
            [
                'name' => 'Przeszczep łąkotki allogenicznej (od dawcy)',
                'procedure_category_id' => 2,
            ],
            [
                'name' => 'Rekonstrukcja więzadła MPFL (troczka przyśrodkowego)',
                'procedure_category_id' => 2,
            ],
            [
                'name' => 'Endoprotezoplastyka stawu kolanowego całkowita lub połowicza',
                'procedure_category_id' => 2,
            ],
            [
                'name' => 'Leczenie martwicy głowy kości udowej',
                'procedure_category_id' => 3,
            ],
            [
                'name' => 'Artroskopowe leczenie konfliktu udowo-panewkowego (FAI)',
                'procedure_category_id' => 3,
            ],
            [ 
                'name' => 'Endoprotezoplastyka stawu biodrowego',
                'procedure_category_id' => 3,
            ],
            [ 
                'name' => 'Leczenie zespołu cieśni nadgarstka',
                'procedure_category_id' => 4,
            ],
            [ 
                'name' => 'Leczenie choroby Dupuytrena',
                'procedure_category_id' => 4,
            ],
            [ 
                'name' => 'Artroskopie w obrębie nadgarstka oraz małych stawów ręki',
                'procedure_category_id' => 4,
            ],
            [ 
                'name' => 'Leczenie schorzenia „łokieć tenisisty”',
                'procedure_category_id' => 5,
            ],
            [ 
                'name' => 'Leczenie schorzenia „łokieć golfisty”',
                'procedure_category_id' => 5,
            ],
            [ 
                'name' => 'Leczenie zespołu rowka nerwu łokciowego',
                'procedure_category_id' => 5,
            ],
            [ 
                'name' => 'Leczenie uszkodzeń ścięgna Achillesa',
                'procedure_category_id' => 6,
            ],
            [ 
                'name' => 'Naprawa uszkodzenia chrząstki stawu skokowego',
                'procedure_category_id' => 6,
            ],
            [ 
                'name' => 'Artrodeza stawu skokowego',
                'procedure_category_id' => 6,
            ],
            [ 
                'name' => 'Artroskopowe leczenie w obrębie stawu skokowego, podskokowego i małych stawów stopy',
                'procedure_category_id' => 7,
            ],
            [ 
                'name' => 'Leczenie palucha koślawego (tzw. haluxy)',
                'procedure_category_id' => 7,
            ],
            [ 
                'name' => 'Dyskopatia szyjna',
                'procedure_category_id' => 8,
            ],
            [ 
                'name' => 'Dyskopatia lędźwiowa / metody przezskórne',
                'procedure_category_id' => 8,
            ],
            [ 
                'name' => 'Nawrotowe zespoły bólowe po operacjach kręgosłupa',
                'procedure_category_id' => 8,
            ],
            [ 
                'name' => 'Osteotomia - korekcja osi kończyny',
                'procedure_category_id' => 9,
            ],
            [ 
                'name' => 'Leczenie zaburzeń zrostu kości po złamaniach',
                'procedure_category_id' => 9,
            ],
            [ 
                'name' => 'Usuwanie metalowych implantów',
                'procedure_category_id' => 9,
            ],
            
        ]);

    }
}