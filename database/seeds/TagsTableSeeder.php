<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'tag' => 'sport'
            
            
        ]);
        DB::table('tags')->insert([
            'tag' => 'art'
            
            
        ]);
        DB::table('tags')->insert([
            'tag' => 'indestiel'
            
            
        ]);
        DB::table('tags')->insert([
            'tag' => 'techstyle'
            
            
        ]);
        DB::table('tags')->insert([
            'tag' => 'lolo'
            
            
        ]);
    }
}
