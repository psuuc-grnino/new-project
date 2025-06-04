<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Accesstype;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $roles = ['admin', 'lecturer', 'student'];

    foreach ($roles as $role) {
        Accesstype::firstOrCreate(['username' => $role]);
    	}
        
    }
}

