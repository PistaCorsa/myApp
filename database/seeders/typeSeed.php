<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class typeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TABLE VALUE
        DB::table('valueTable')->insert([
            'value_name'        => 'Centimeters',
            'value_unit'        => 'cm',
            'status'            => '1',
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);

        DB::table('valueTable')->insert([
            'value_name'        => 'Cylinder',
            'value_unit'        => 'CC',
            'status'            => '1',
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);

        DB::table('valueTable')->insert([
            'value_name'        => 'Inches',
            'value_unit'        => 'inch',
            'status'            => '1',
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);

        DB::table('valueTable')->insert([
            'value_name'        => 'Liters',
            'value_unit'        => 'L',
            'status'            => '1',
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);

        // TABLE TYPE
        DB::table('typeTable')->insert([
            'type_name'         => 'Cars (4 Wheels)',
            'status'            => '1',
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);

        DB::table('typeTable')->insert([
            'type_name'         => 'Motorcyles (2 Wheels)',
            'status'            => '1',
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);

        DB::table('typeTable')->insert([
            'type_name'         => 'Trucks (above 4 Wheels)',
            'status'            => '1',
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);
    }
}
