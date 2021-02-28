<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;


class DepartmentSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$departments = array(
			array('id' => '1', 'name' => 'CONCEPCION', 'created_at' => NULL, 'updated_at' => NULL),
			array('id' => '2', 'name' => 'SAN PEDRO', 'created_at' => NULL, 'updated_at' => NULL),
			array('id' => '3', 'name' => 'CORDILLERA', 'created_at' => NULL, 'updated_at' => NULL),
			array('id' => '4', 'name' => 'GUAIRA', 'created_at' => NULL, 'updated_at' => NULL),
			array('id' => '5', 'name' => 'CAAGUAZU', 'created_at' => NULL, 'updated_at' => NULL),
			array('id' => '6', 'name' => 'CAAZAPA', 'created_at' => NULL, 'updated_at' => NULL),
			array('id' => '7', 'name' => 'ITAPUA', 'created_at' => NULL, 'updated_at' => NULL),
			array('id' => '8', 'name' => 'MISIONES', 'created_at' => NULL, 'updated_at' => NULL),
			array('id' => '9', 'name' => 'PARAGUARI', 'created_at' => NULL, 'updated_at' => NULL),
			array('id' => '10', 'name' => 'ALTO PARANA', 'created_at' => NULL, 'updated_at' => NULL),
			array('id' => '11', 'name' => 'CENTRAL', 'created_at' => NULL, 'updated_at' => NULL),
			array('id' => '12', 'name' => 'ÑEEMBUCU', 'created_at' => NULL, 'updated_at' => NULL),
			array('id' => '13', 'name' => 'AMAMBAY', 'created_at' => NULL, 'updated_at' => NULL),
			array('id' => '14', 'name' => 'CANINDEYU', 'created_at' => NULL, 'updated_at' => NULL),
			array('id' => '15', 'name' => 'PRESIDENTE HAYES', 'created_at' => NULL, 'updated_at' => NULL),
			array('id' => '16', 'name' => 'BOQUERON', 'created_at' => NULL, 'updated_at' => NULL),
			array('id' => '17', 'name' => 'ALTO PARAGUAY', 'created_at' => NULL, 'updated_at' => NULL),
			array('id' => '18', 'name' => 'CAPITAL', 'created_at' => NULL, 'updated_at' => NULL),
			array('id' => '199', 'name' => 'ALC. NACIONAL', 'created_at' => NULL, 'updated_at' => NULL)
		);

		foreach ($departments as $key => $item) {
			DB::table('departments')->insert([
				'id' => $item['id'],
				'name' => $item['name'],
				'created_at' => date(now())
			]);
		}
	}
}