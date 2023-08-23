<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Gestiones;

class GestionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $gestiones = [
            'ORIENTACION EN PROGRAMAS FEDERALES Y ESTATALES',
            'GESTIÓN Y DONACIÓN DE MEDICAMENTOS EXISTENTES EN OFICINA',
            'APOYO EN TRÁMITES DE CURP Y ACTA DE NACIMIENTO',
            'ASISTENCIA EN REDACCIÓN DE OFICIOS, APOYO EN SERVICIOS FUNEBRES',
            'APOYO EN ANALISIS CLINICOS',
            'CONTROL DE SIGNOS VITALES (PRESIÓN, NIVELES DE AZÚCAR, RITMO CARDIACO)',
            'CONSULTAS MEDICAS GARTUITAS',
            'APOYO EN ULTRASONIDOS',
            'ASESORIAS JURIDICAS'
        ];

        foreach ($gestiones as $gestiones){
            Gestiones::create([
                'nombre'=> $gestiones,
                'estado' => '1'
            ]);
        }

    }
}
