<?php

namespace Database\Seeders;

use App\Models\Donation;
use App\Models\Label;
use App\Models\User;
use Illuminate\Database\Seeder;

class DonationSeeder extends Seeder
{
    public function run(): void
    {
        if (Label::query()->where('id', '=', 1)->exists() && User::query()->where('id', '=', 2)->exists()) {
            Donation::query()->create([
                'image' => 'aluminum.jpg',
                'label_id' => 1,
                'user_id' => 2,
            ]);
        }
    }
}
