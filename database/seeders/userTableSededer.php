<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userTableSededer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 
     DB::table("users")->insert([  
        //     Admin
        [ 
            "name"=>"Admin", 
            "username"=>"admin", 
            "email"=>"admin@gmail.com", 
            "password"=>Hash::make("admin10")  , 
            "role"=>"admin" , 
            "status"=>"active"
        ],  
           //    Agent
          [ 
            "name"=>"Agent", 
            "username"=>"agent", 
            "email"=>"agent@gmail.com", 
            "password"=>Hash::make("agent10")  , 
            "role"=>"agent" , 
            "status"=>"active"
        ],
          // User
          [ 
            "name"=>"User", 
            "username"=>"user", 
            "email"=>"user@gmail.com", 
            "password"=>Hash::make("user10")  , 
            "role"=>"user" , 
            "status"=>"active"
        ],

        ]);
    }
}
