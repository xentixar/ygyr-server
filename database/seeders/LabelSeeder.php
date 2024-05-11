<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Label;

class LabelSeeder extends Seeder
{
    public function run(): void
    {
        $labels = [
            "Aluminium foil",
            "Battery",
            "Blister pack",
            "Bottle",
            "Bottle cap",
            "Broken glass",
            "Can",
            "Carton",
            "Cigarette",
            "Cup",
            "Food waste",
            "Glass jar",
            "Lid",
            "Other plastic",
            "Paper",
            "Paper bag",
            "Plastic bag + wrapper",
            "Plastic container",
            "Plastic glooves",
            "Plastic utensils",
            "Pop tab",
            "Rope = strings",
            "Scrap metal",
            "Shoe",
            "Squeezable tube",
            "Straw",
            "Styrofoam piece",
            "Unlabeled litter"
        ];

        foreach($labels as $label)
        {
            Label::query()->create([
                'name' => $label
            ]);
        }
    }
}
