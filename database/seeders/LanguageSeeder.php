<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([
            'name' => 'العربية',
            'code' => 'ar',
            'active' => true,
            'is_rtl' => true,
        ]);

        Language::create([
            'name' => 'English',
            'code' => 'en',
            'active' => true,
            'is_rtl' => false,
        ]);

    }
}
