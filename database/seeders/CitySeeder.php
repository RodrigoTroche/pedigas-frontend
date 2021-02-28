<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CitySeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$cities = array(
			array('id' => '21', 'name' => 'Villa Hayes', 'department_id' => '15', 'created_at' => '2020-04-13 17:23:41'),
			array('id' => '152', 'name' => 'Aregua', 'department_id' => '11', 'created_at' => '2020-04-13 17:23:41'),
			array('id' => '153', 'name' => 'Capiata', 'department_id' => '11', 'created_at' => '2020-04-13 17:23:41'),
			array('id' => '154', 'name' => 'Fernando de la Mora', 'department_id' => '11', 'created_at' => '2020-04-13 17:23:41'),
			array('id' => '156', 'name' => 'Ita', 'department_id' => '11', 'created_at' => '2020-04-13 17:23:41'),
			array('id' => '157', 'name' => 'Itaugua', 'department_id' => '11', 'created_at' => '2020-04-13 17:23:41'),
			array('id' => '197', 'name' => 'Lambaré', 'department_id' => '11', 'created_at' => '2020-04-13 17:23:41'),
			array('id' => '198', 'name' => 'Limpio', 'department_id' => '11', 'created_at' => '2020-04-13 17:23:41'),
			array('id' => '199', 'name' => 'Luque', 'department_id' => '11', 'created_at' => '2020-04-13 17:23:41'),
			array('id' => '200', 'name' => 'Mariano Roque Alonso', 'department_id' => '11', 'created_at' => '2020-04-13 17:23:41'),
			array('id' => '202', 'name' => 'Ñemby', 'department_id' => '11', 'created_at' => '2020-04-13 17:23:41'),
			array('id' => '203', 'name' => 'San Antonio', 'department_id' => '11', 'created_at' => '2020-04-13 17:23:41'),
			array('id' => '204', 'name' => 'San Lorenzo', 'department_id' => '11', 'created_at' => '2020-04-13 17:23:41'),
			array('id' => '205', 'name' => 'Villa Elisa', 'department_id' => '11', 'created_at' => '2020-04-13 17:23:41'),
			array('id' => '206', 'name' => 'Villeta', 'department_id' => '11', 'created_at' => '2020-04-13 17:23:41'),
			array('id' => '215', 'name' => 'Asunción', 'department_id' => '18', 'created_at' => '2020-04-13 17:23:42'),
		);

		foreach ($cities as $key => $item) {
			DB::table('cities')->insert([
				'name' => $item['name'],
				'department_id' => $item['department_id'],
				'created_at' => $item['created_at']
			]);
		}
	}
}