<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            'name' => 'Upoznajmo Excel',
            'price' => 130,
        ]);
        
        DB::table('courses')->insert([
            'name' => '101 upotreba Excel funkcija',
            'price' => 200
        ]);

        DB::table('courses')->insert([
            'name' => 'Analiza podataka uz Pivot tabele',
            'price' => 250
        ]);

        DB::table('courses')->insert([
            'name' => 'Excel za finansijsku analizu',
            'price' => 150
        ]);
            
        DB::table('courses')->insert([
            'name' => 'Tajne uspješnog vizuelnog predstavljanja u Excelu',
            'price' => 200
        ]);

        DB::table('courses')->insert([
            'name' => 'Tajne uspješnog vizuelnog predstavljanja u Excelu',
            'price' => 250
        ]);
    }
}
