<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = array(
            array('name' => 'Procesando pedido'),
            array('name' => 'Preparación en curso'),
            array('name' => 'Enviado'),
            array('name' => 'Entregado'),
            array('name' => 'Cancelado'),
            array('name' => 'Reembolsado')
        );

        foreach ($status as $item) {
            DB::table('status')->insert([
                'name' => $item['name'],
            ]);
        }
    }
}