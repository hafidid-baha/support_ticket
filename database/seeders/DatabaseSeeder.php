<?php

namespace Database\Seeders;

use App\Models\Comments;
use App\Models\User;
use Egulias\EmailValidator\Warning\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Comments::factory(100)->create();
    }
}
