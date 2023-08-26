<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Folder;
use App\Models\Group;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $group = Group::create([
            'name' => 'Main',
            'description' => 'Main documents group',
        ]);

        $user = \App\Models\User::factory()->create([
            'name' => 'Sergey Emelyanov',
            'email' => 'se@sergeyem.ru',
            'password' => Hash::make('password'),
            'group_id' => $group->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $user->assignRole(['super_admin', 'filament_user']);

        $folder = Folder::create([
            'id' => 1,
            'name' => 'Docs',
            'description' => 'Main documents',
            'user_id' => $user->id,
            'group_id' => $group->id,
            'is_private' => false,
            'sequence' => 1,
        ])->saveAsRoot();
    }
}
