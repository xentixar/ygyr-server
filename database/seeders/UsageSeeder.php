<?php

namespace Database\Seeders;

use App\Models\Label;
use App\Models\Usage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class UsageSeeder extends Seeder
{
    public function run(): void
    {
        $data = File::json(public_path('usages.json'));
        foreach ($data as $key => $dt) {
            $label  = Label::query()->where('name', '=', $key)->first();
            foreach ($dt as $row) {
                Usage::query()->create([
                    'description' => $row,
                    'label' => $label
                ]);
            }
        }
    }
}
