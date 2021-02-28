<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $methods = array(
            array('name' => 'Efectivo', 'created_at' => date(now())),
            array('name' => 'Tarjeta de Débito', 'created_at' => date(now())),
            array('name' => 'Tarjeta de Crédito', 'created_at' => date(now())),
            array('name' => 'Transferencia Bancaria', 'created_at' => date(now())),
        );

        foreach ($methods as $method) {
            DB::table('payment_methods')->insert(['name' => $method['name'], 'created_at' => $method['created_at']]);
        }
    }
}