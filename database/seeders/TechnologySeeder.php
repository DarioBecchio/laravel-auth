<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = ['Php', 'SQL','javascript', 'Laravel', 'VueJS'];
        foreach ($technologies as $tech) {
            $technologies = new Technology();
            $technologies->name =$tech;
            $technologies->slug = Str::slug($tech,'-');
            $technologies->save();
        }
    }
}
