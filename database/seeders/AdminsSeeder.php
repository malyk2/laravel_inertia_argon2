<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                'name' => 'admin',
                'email' => 'admin@email.com',
            ]
        ];
        foreach ($admins as $data) {
            $admin = User::firstOrNew($data);
            if (!$admin->exists()) {
                $admin->password = bcrypt('secret');
                $admin->save();
            }
        }
    }
}
