<?php

use App\TiposDocumento;
use Illuminate\Database\Seeder;

class TiposDocumentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TiposDocumento::updateOrInsert(
            ['id'=> 1],
            [
                'id' => 1,
                'codigo' => 'C.I.',
                'nombre' => 'Cédula de identidad'
            ]
        );
        TiposDocumento::updateOrInsert(
            ['id'=> 2],
            [
                'id' => 2,
                'codigo' => 'C.C.',
                'nombre' => 'Cédula de ciudadanía'
            ]
        );
        TiposDocumento::updateOrInsert(
            ['id'=> 3],
            [
                'id' => 3,
                'codigo' => 'T.I.',
                'nombre' => 'Tarjeta de identidad'
            ]
        );
        TiposDocumento::updateOrInsert(
            ['id'=> 4],
            [
                'id' => 4,
                'codigo' => 'T.P.',
                'nombre' => 'Tarjeta de pasaporte'
            ]
        );
        TiposDocumento::updateOrInsert(
            ['id'=> 5],
            [
                'id' => 5,
                'codigo' => 'R.C.',
                'nombre' => 'Registro civil'
            ]
        );
        TiposDocumento::updateOrInsert(
            ['id'=> 6],
            [
                'id' => 6,
                'codigo' => 'C.E.',
                'nombre' => 'Cédula de extranjería'
            ]
        );
    }
}
