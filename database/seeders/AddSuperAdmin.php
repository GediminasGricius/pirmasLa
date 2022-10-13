<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AddSuperAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      /*  DB::table('users')->insert([
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('admin')
        ]);
        */
        //User::factory()->count(100)->create();
        Category::factory()->count(1000)->create();
    }
}
