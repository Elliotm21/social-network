<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $u = new User;
        $u->name = "Dave Davies";
        $u->email = "dave123@gmail.com";
        $u->password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
        $u->save();

        $users = User::factory()->count(10)->create();
    }
}