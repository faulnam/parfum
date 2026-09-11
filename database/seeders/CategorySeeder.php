<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Collection;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // 1. Men Perfume Main Category & Subcategories
        $men = Category::updateOrCreate(
            ['slug' => 'men'],
            [
                'parent_id' => null,
                'gender' => 'men',
                'name' => 'Pria',
                'description' => 'Koleksi parfum pria dengan aroma maskulin, segar, kayu aromatik, dan rempah elegan berbahan alami.',
                'order' => 1,
                'is_active' => true,
            ]
        );

        $menPerfume = Category::updateOrCreate(
            ['slug' => 'men-perfume'],
            [
                'parent_id' => $men->id,
                'gender' => 'men',
                'name' => 'Parfum Pria',
                'description' => 'Koleksi wewangian pria mewah dan tahan lama dari ekstrak botani alami',
                'order' => 1,
                'is_active' => true,
            ]
        );

        $menPerfumeTypes = [
            'Eau de Parfum (EDP)' => 'men-eau-de-parfum',
            'Extrait de Parfum' => 'men-extrait-de-parfum',
            'Woody & Smoky Oud' => 'men-woody-oud',
            'Fresh Aquatic & Citrus' => 'men-fresh-aquatic',
            'Aromatic Spices & Leather' => 'men-spices-leather',
        ];

        foreach ($menPerfumeTypes as $name => $slug) {
            Category::updateOrCreate(
                ['slug' => $slug],
                [
                    'parent_id' => $menPerfume->id,
                    'gender' => 'men',
                    'name' => $name,
                    'order' => 0,
                    'is_active' => true,
                ]
            );
        }

        $menCare = Category::updateOrCreate(
            ['slug' => 'men-body-care'],
            [
                'parent_id' => $men->id,
                'gender' => 'men',
                'name' => 'Perawatan & Set Hadiah',
                'description' => 'Travel spray, hair mist, dan set hadiah eksklusif pria',
                'order' => 2,
                'is_active' => true,
            ]
        );

        foreach (['Discovery Set Pria' => 'men-discovery-set', 'Travel Spray 10ml' => 'men-travel-spray', 'Scented Body Mist' => 'men-body-mist'] as $name => $slug) {
            Category::updateOrCreate(
                ['slug' => $slug],
                [
                    'parent_id' => $menCare->id,
                    'gender' => 'men',
                    'name' => $name,
                    'order' => 0,
                    'is_active' => true,
                ]
            );
        }

        // 2. Women Perfume Main Category & Subcategories
        $women = Category::updateOrCreate(
            ['slug' => 'women'],
            [
                'parent_id' => null,
                'gender' => 'women',
                'name' => 'Wanita',
                'description' => 'Koleksi parfum wanita bernuansa floral mewah, vanilla manis, citrus segar, dan sentuhan amber feminin.',
                'order' => 2,
                'is_active' => true,
            ]
        );

        $womenPerfume = Category::updateOrCreate(
            ['slug' => 'women-perfume'],
            [
                'parent_id' => $women->id,
                'gender' => 'women',
                'name' => 'Parfum Wanita',
                'description' => 'Koleksi wewangian wanita memikat dari bunga dan minyak atsiri murni',
                'order' => 1,
                'is_active' => true,
            ]
        );

        $womenPerfumeTypes = [
            'Floral & Rose Petals' => 'women-floral-rose',
            'Sweet Vanilla & Gourmand' => 'women-vanilla-gourmand',
            'Fresh Citrus & White Floral' => 'women-fresh-citrus',
            'Extrait de Parfum Intense' => 'women-extrait-intense',
            'Warm Amber & Musk' => 'women-amber-musk',
        ];

        foreach ($womenPerfumeTypes as $name => $slug) {
            Category::updateOrCreate(
                ['slug' => $slug],
                [
                    'parent_id' => $womenPerfume->id,
                    'gender' => 'women',
                    'name' => $name,
                    'order' => 0,
                    'is_active' => true,
                ]
            );
        }

        $womenCare = Category::updateOrCreate(
            ['slug' => 'women-body-care'],
            [
                'parent_id' => $women->id,
                'gender' => 'women',
                'name' => 'Hair Mist & Set Hadiah',
                'description' => 'Hair perfume mist, travel roller, dan set hadiah eksklusif wanita',
                'order' => 2,
                'is_active' => true,
            ]
        );

        foreach (['Discovery Set Wanita' => 'women-discovery-set', 'Hair Fragrance Mist' => 'women-hair-mist', 'Rollerball & Travel Set' => 'women-travel-set'] as $name => $slug) {
            Category::updateOrCreate(
                ['slug' => $slug],
                [
                    'parent_id' => $womenCare->id,
                    'gender' => 'women',
                    'name' => $name,
                    'order' => 0,
                    'is_active' => true,
                ]
            );
        }

        // Backward compatibility mapping for old slug links if any
        $oldSlugs = [
            'men-everyday-sneakers' => 'men-eau-de-parfum',
            'men-running-shoes' => 'men-extrait-de-parfum',
            'men-slip-ons-loungers' => 'men-woody-oud',
            'men-water-repellent-shoes' => 'men-fresh-aquatic',
            'men-hiking-trail-shoes' => 'men-spices-leather',
            'men-tees-tops' => 'men-discovery-set',
            'men-sweats-hoodies' => 'men-travel-spray',
            'men-socks' => 'men-body-mist',
            'bags-accessories' => 'men-travel-spray',
            'women-everyday-sneakers' => 'women-floral-rose',
            'women-running-shoes' => 'women-vanilla-gourmand',
            'women-flats-loungers' => 'women-fresh-citrus',
            'women-water-repellent-shoes' => 'women-extrait-intense',
            'women-slip-ons' => 'women-amber-musk',
            'women-tees-tops' => 'women-discovery-set',
            'women-socks' => 'women-hair-mist',
            'women-bags-accessories' => 'women-travel-set',
        ];

        foreach ($oldSlugs as $oldSlug => $targetSlug) {
            $target = Category::where('slug', $targetSlug)->first();
            if ($target) {
                Category::updateOrCreate(
                    ['slug' => $oldSlug],
                    [
                        'parent_id' => $target->parent_id,
                        'gender' => $target->gender,
                        'name' => $target->name,
                        'order' => 99,
                        'is_active' => true,
                    ]
                );
            }
        }

        // 3. Fragrance Collections
        $collections = [
            [
                'title' => 'Produk Terbaru',
                'slug' => 'new-arrivals',
                'description' => 'Koleksi parfum edisi rilis terbaru dengan formulasi aroma botani alami dan ketahanan sillage ekstra.',
                'order' => 1,
            ],
            [
                'title' => 'Produk Terlaris',
                'slug' => 'best-sellers',
                'description' => 'Wewangian paling dicari dan menjadi signature scent ribuan pelanggan setia FIFA.',
                'order' => 2,
            ],
            [
                'title' => 'Diskon Spesial',
                'slug' => 'sale',
                'description' => 'Penawaran istimewa berbatas waktu untuk botol pilihan dan paket bundling hemat.',
                'order' => 3,
            ],
            [
                'title' => 'Koleksi Botanical Elixir',
                'slug' => 'tree-runners',
                'description' => 'Aroma segar alami dari distilasi tanaman eukaliptus, sage, dan rempah pilihan.',
                'order' => 4,
            ],
            [
                'title' => 'Koleksi Pure Extrait',
                'slug' => 'wool-runners',
                'description' => 'Konsentrasi minyak parfum 30-40% dengan proyeksi mewah yang bertahan lebih dari 12 jam.',
                'order' => 5,
            ],
        ];

        foreach ($collections as $col) {
            Collection::updateOrCreate(
                ['slug' => $col['slug']],
                [
                    'title' => $col['title'],
                    'description' => $col['description'],
                    'is_active' => true,
                    'order' => $col['order'],
                ]
            );
        }
    }
}
