<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    static $nomes = [
        'Diego',
        'Douglas',
        'Visitante',
        'Administrador',
    ];
    static $emails = [
        'diego@diego.com',
        'douglas@douglas.com',
        'visitante@visitante.com',
        'admin@admin.com',
    ];

    static $admin = [
        '0',
        '0',
        '2',
        '1',
    ];

    public function run(){
        for ($i = 0; $i < count(self::$nomes); $i++)
            $user = User::create([
                'name' => self::$nomes[$i],
                'email' => self::$emails[$i],
                'password' => Hash::make('123456789'),
                'admin' => self::$admin[$i],
            ]);            
        $user->save();
    }
}
