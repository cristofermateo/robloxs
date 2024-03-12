<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Chat;
use App\Models\Comment;
use App\Models\Game;
use App\Models\Role;
use App\Models\Server;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create([
            'name'=>'player',
        ]);
        Role::create([
            'name'=>'admin',
        ]);
        Game::create([
            'name'=>'Blox Fruits',
            'type'=>1
        ]);
        Game::create([
            'name'=>'BloxBurg',
            'type'=>2
        ]);
        Server::create([
            'name'=>'fruits_server',
            'region'=>'Mexico',
            'type'=>1,
            'game_id'=>1
        ]);
    
        User::create([
            'name'=>'Cristo',
            'email'=>'cristo@cristo.com',
            'password'=>bcrypt('123123123'),
            'gender'=>'male',
            'role_id'=>1,
            'server_id'=>1
        ]);
        
        Chat::create([
            'game_id'=>1
        ]); 
        Comment::create([
            'user_id'=>1,
            'text'=>'Estoy jugando blox',
            'chat_id'=>1, 
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
