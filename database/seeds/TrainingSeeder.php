<?php

use App\Training;
use Illuminate\Database\Seeder;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Training::create([
            'name' => 'Capacitación',
            'description1'  => '<p>El objetivo del curso de Hidráulica, es comprender los fundamentos básicos de la Hidráulica, el funcionamiento de sus componentes y su interacción en los circuitos hidráulicos. Asimismo, se enseñará a interpretar planos de circuitos y conocer su aplicación en diversos automatismos.</p>',
            'description2'  => '<p>El objetivo de este curso de neumático es capacitar a ingenieros, técnicos, operarios y estudiantes para el diseño de circuitos, utilización de componentes y realización de mantenimiento en dispositivos y máquinas neumáticas.</p>',
            'image'         => 'images/training/Mask_Group_275.png'
        ]);
    }
}
