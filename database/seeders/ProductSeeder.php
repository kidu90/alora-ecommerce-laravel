<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $skincare = Category::where('name', 'Skincare')->first();
        $haircare = Category::where('name', 'Haircare')->first();
        $makeup = Category::where('name', 'Makeup')->first();

        $products = [
            [
                'name' => 'Hydrating Face Cream',
                'description' => 'A luxurious moisturizing cream for all skin types',
                'price' => 29.99,
                'stock' => 50,
                'ingredients' => 'Hyaluronic Acid, Vitamin E, Aloe Vera',
                'usage_tips' => 'Apply morning and evening to clean skin',
                'category_id' => $skincare->id,
            ],
            [
                'name' => 'Vitamin C Serum',
                'description' => 'Brightening serum with 20% Vitamin C',
                'price' => 39.99,
                'stock' => 30,
                'ingredients' => 'Vitamin C, Vitamin E, Ferulic Acid',
                'usage_tips' => 'Use in the morning before moisturizer',
                'category_id' => $skincare->id,
            ],
            [
                'name' => 'Nourishing Hair Oil',
                'description' => 'Deep conditioning oil for damaged hair',
                'price' => 24.99,
                'stock' => 40,
                'ingredients' => 'Argan Oil, Coconut Oil, Vitamin E',
                'usage_tips' => 'Apply to damp hair, leave for 30 minutes before washing',
                'category_id' => $haircare->id,
            ],
            [
                'name' => 'Strengthening Shampoo',
                'description' => 'Sulfate-free shampoo for weak and brittle hair',
                'price' => 19.99,
                'stock' => 60,
                'ingredients' => 'Keratin, Biotin, Natural Oils',
                'usage_tips' => 'Massage into wet hair, rinse thoroughly',
                'category_id' => $haircare->id,
            ],
            [
                'name' => 'Matte Lipstick - Rouge',
                'description' => 'Long-lasting matte lipstick in classic red',
                'price' => 22.99,
                'stock' => 35,
                'ingredients' => 'Natural Waxes, Plant-based Pigments',
                'usage_tips' => 'Apply directly to lips, blot for longer wear',
                'category_id' => $makeup->id,
            ],
            [
                'name' => 'Foundation - Natural Glow',
                'description' => 'Medium coverage foundation with natural finish',
                'price' => 34.99,
                'stock' => 25,
                'ingredients' => 'Mineral Pigments, Hyaluronic Acid, SPF 15',
                'usage_tips' => 'Blend with brush or sponge for even coverage',
                'category_id' => $makeup->id,
            ],
            [
                'name' => 'Eye Shadow Palette',
                'description' => '12-shade neutral eye shadow palette',
                'price' => 45.99,
                'stock' => 20,
                'ingredients' => 'Mica, Talc, Natural Pigments',
                'usage_tips' => 'Use primer for longer-lasting color',
                'category_id' => $makeup->id,
            ],
            [
                'name' => 'Gentle Cleanser',
                'description' => 'Mild foam cleanser for sensitive skin',
                'price' => 16.99,
                'stock' => 45,
                'ingredients' => 'Chamomile, Glycerin, Mild Surfactants',
                'usage_tips' => 'Use twice daily, massage gently and rinse',
                'category_id' => $skincare->id,
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}