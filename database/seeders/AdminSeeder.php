<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user= User::create([
            'name'          => 'Admin',
            'email'         => 'admin@gmail.com',
            'password'      => Hash::make('Akash@9381'),
            'city'          => "Gurgaon",
            'email_verified_at'=> Carbon::now()
        ]);
        $user->assignRole('admin');
    }
}
