<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\toDo;
class toDoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        toDo::factory()->times(10)->create();
    }
}
