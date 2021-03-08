<?php
namespace Database\Seeders;

use App\Models\Todo;
use Illuminate\Database\Seeder;

class TodoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Todo::factory()
        ->count(10)
        ->create();
    }
}
