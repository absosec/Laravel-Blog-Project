<?php

use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configs')->insert([
            'title'=> 'Sample Blog Website',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
