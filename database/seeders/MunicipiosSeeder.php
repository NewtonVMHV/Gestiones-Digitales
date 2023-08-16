<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\tMunicipios;

class MunicipiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $municipios = [
            'CAMPECHE',
            'CALKINI',
            'CARMEN',
            'CHAMPOTON',
            'HECELCHAKAN',
            'HOLPECHEN',
            'PALIZADA',
            'TENABO',
            'ESCARCEGA',
            'CANDELARIA',
            'CALAKMUL',
            'DZITBALCHE',
            'SEYBAPLYA'
        ];
        foreach ($municipios as $municipio){
            tMunicipios::create([
                'Municipio'=> $municipio
            ]);
        }

    }
}
