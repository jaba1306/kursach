<?php

namespace Database\Seeders;

use App\Models\Interest;
use Illuminate\Database\Seeder;


class InterestTableSeeder extends Seeder
{
    public function run()
    {
        $interests = [
            ['name' => 'Путешествия'],
            ['name' => 'Кулинария'],
            ['name' => 'Футбол'],
            ['name' => 'Музыка'],
            ['name' => 'Наука'],
            ['name' => 'Искусство'],
        ];

        foreach ($interests as $interest) {
            Interest::create($interest);
        }
    }
}
