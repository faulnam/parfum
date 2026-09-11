<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Fetch Categories
        $menEdp = Category::where('slug', 'men-eau-de-parfum')->first() ?? Category::first();
        $menExtrait = Category::where('slug', 'men-extrait-de-parfum')->first() ?? $menEdp;
        $menOud = Category::where('slug', 'men-woody-oud')->first() ?? $menEdp;
        $menAquatic = Category::where('slug', 'men-fresh-aquatic')->first() ?? $menEdp;
        $menLeather = Category::where('slug', 'men-spices-leather')->first() ?? $menEdp;
        $menSet = Category::where('slug', 'men-discovery-set')->first() ?? $menEdp;

        $womenFloral = Category::where('slug', 'women-floral-rose')->first() ?? Category::first();
        $womenGourmand = Category::where('slug', 'women-vanilla-gourmand')->first() ?? $womenFloral;
        $womenCitrus = Category::where('slug', 'women-fresh-citrus')->first() ?? $womenFloral;
        $womenExtrait = Category::where('slug', 'women-extrait-intense')->first() ?? $womenFloral;
        $womenAmber = Category::where('slug', 'women-amber-musk')->first() ?? $womenFloral;
        $womenSet = Category::where('slug', 'women-discovery-set')->first() ?? $womenFloral;

        // 2. Fetch Collections
        $newArrivalsCol = Collection::where('slug', 'new-arrivals')->first();
        $bestSellersCol = Collection::where('slug', 'best-sellers')->first();
        $saleCol = Collection::where('slug', 'sale')->first();
        $botanicalCol = Collection::where('slug', 'tree-runners')->first();
        $extraitCol = Collection::where('slug', 'wool-runners')->first();

        // 3. Products Master Dataset
        $productsData = [
            // ----------------------------------------------------
            // MEN FRAGRANCES
            // ----------------------------------------------------
            [
                'category_id' => $menAquatic->id,
                'name' => "Parfum Pria Aurora Blue Marine EDP",
                'slug' => 'mens-aurora-blue-marine-edp',
                'short_description' => 'Aroma laut segar yang membangkitkan energi dengan perpaduan Bergamot Calabria, garam laut, dan kayu cedar alami.',
                'description' => '<p>Diciptakan untuk pria dinamis dan modern. Aurora Blue Marine EDP menghadirkan kesegaran hembusan angin samudra yang memikat. Dibuka dengan kesegaran citrus Calabria berpadu lembut dengan nuansa mineral garam laut, lalu beralih ke kehangatan kayu cedar dan lumut pohon oak alami.</p><p>Dibuat dari 100% konsentrat minyak wangi alami terbarukan dengan ketahanan wangi hingga 10-12 jam di iklim tropis.</p>',
                'material_info' => 'Top Notes: Bergamot Calabria, Grapefruit, Sea Salt. Heart Notes: Marine Accord, Geranium, Rosemary. Base Notes: Virginian Cedarwood, Ambergris, Oakmoss.',
                'sustainability_note' => 'Ekstrak minyak atsiri 100% dari perkebunan organik terverifikasi. Botol kaca daur ulang dengan tutup perak premium.',
                'base_price' => 850000,
                'compare_at_price' => 950000,
                'is_active' => true,
                'is_featured' => true,
                'weight_grams' => 350,
                'collections' => array_filter([$newArrivalsCol?->id, $bestSellersCol?->id, $botanicalCol?->id]),
                'variants' => [
                    [
                        'color_name' => 'Signature Blue Crystal',
                        'color_hex' => '#5c778a',
                        'sizes' => ['50ml' => 25, '100ml' => 15, '30ml' => 30],
                    ],
                ],
                'images' => [
                    ['url' => '/images/products/tree-runner-blue.png', 'order' => 1, 'is_primary' => true],
                    ['url' => '/images/products/tree-runner-white.png', 'order' => 2, 'is_primary' => false],
                ],
            ],
            [
                'category_id' => $menOud->id,
                'name' => "Parfum Pria Obsidian Noir Oud Extrait",
                'slug' => 'mens-obsidian-noir-oud-extrait',
                'short_description' => 'Mahakarya aroma kayu gaharu Kalimantan, lada hitam, dan kulit mewah dengan konsentrasi Extrait de Parfum 35%.',
                'description' => '<p>Obsidian Noir Oud adalah simbol kemewahan dan wibawa maskulin. Memadukan kekayaan kayu gaharu (agarwood) Nusantara murni, resin kemenyan, dan kapulaga eksotis. Memberikan impresi karismatik, hangat, dan tahan lama hingga lebih dari 16 jam.</p>',
                'material_info' => 'Top Notes: Black Pepper, Wild Cardamom, Saffron. Heart Notes: Royal Agarwood (Oud), Birch Smoke, Rose Damask. Base Notes: Indonesian Patchouli, Black Leather, Rich Amber.',
                'sustainability_note' => 'Gaharu bersertifikasi CITES lestari. 100% bebas phthalates dan paraben.',
                'base_price' => 1250000,
                'compare_at_price' => null,
                'is_active' => true,
                'is_featured' => true,
                'weight_grams' => 400,
                'collections' => array_filter([$bestSellersCol?->id, $extraitCol?->id]),
                'variants' => [
                    [
                        'color_name' => 'Obsidian Black Edition',
                        'color_hex' => '#1a1a1a',
                        'sizes' => ['50ml' => 20, '100ml' => 12, '30ml' => 18],
                    ],
                ],
                'images' => [
                    ['url' => '/images/products/wool-runner-black.png', 'order' => 1, 'is_primary' => true],
                    ['url' => '/images/products/wool-runner-grey.png', 'order' => 2, 'is_primary' => false],
                ],
            ],
            [
                'category_id' => $menExtrait->id,
                'name' => "Parfum Pria Sage & Vetiver Elixir",
                'slug' => 'mens-sage-vetiver-elixir',
                'short_description' => 'Kesegaran herbal berkarakter perpaduan daun clary sage Prancis, vetiver Haiti, dan lavender pegunungan.',
                'description' => '<p>Wewangian aromatik hijau yang menenangkan sekaligus menyegarkan pikiran. Dirancang untuk pertemuan bisnis, suasana kantor ber-AC, maupun acara santai berkelas.</p>',
                'material_info' => 'Top Notes: French Clary Sage, Green Apple, Bergamot. Heart Notes: Mountain Lavender, Nutmeg, Geranium. Base Notes: Haitian Vetiver, White Musk, Tonka Bean.',
                'sustainability_note' => 'Minyak vetiver dan sage hasil panen petani lokal berkelanjutan.',
                'base_price' => 890000,
                'compare_at_price' => 990000,
                'is_active' => true,
                'is_featured' => true,
                'weight_grams' => 350,
                'collections' => array_filter([$newArrivalsCol?->id, $bestSellersCol?->id, $botanicalCol?->id]),
                'variants' => [
                    [
                        'color_name' => 'Sage Frost Edition',
                        'color_hex' => '#7d8d7e',
                        'sizes' => ['50ml' => 22, '100ml' => 14, '30ml' => 20],
                    ],
                ],
                'images' => [
                    ['url' => '/images/products/tree-dasher-sage.png', 'order' => 1, 'is_primary' => true],
                    ['url' => '/images/products/tree-dasher-navy.png', 'order' => 2, 'is_primary' => false],
                ],
            ],
            [
                'category_id' => $menLeather->id,
                'name' => "Parfum Pria Smoky Tobacco & Sandalwood",
                'slug' => 'mens-smoky-tobacco-sandalwood',
                'short_description' => 'Aroma tembakau madu manis, kayu cendana Kupang, dan rempah cengkeh hangat yang menggoda.',
                'description' => '<p>Kehangatan malam dalam satu semprotan. Kombinasi daun tembakau berkualitas tinggi dengan manisnya vanila madu dan kedalaman kayu cendana murni memberikan aroma sensual dan elegan.</p>',
                'material_info' => 'Top Notes: Sweet Tobacco Leaf, Spiced Ginger, Clove. Heart Notes: Cacao Pod, Tonka Bean, Vanilla Blossom. Base Notes: Timor Sandalwood, Dry Fruit Accord, Sweet Wood Sap.',
                'sustainability_note' => 'Cendana legal bersertifikat hutan lestari Nusa Tenggara.',
                'base_price' => 1100000,
                'compare_at_price' => 1250000,
                'is_active' => true,
                'is_featured' => true,
                'weight_grams' => 380,
                'collections' => array_filter([$bestSellersCol?->id, $extraitCol?->id]),
                'variants' => [
                    [
                        'color_name' => 'Smoky Charcoal Glass',
                        'color_hex' => '#444240',
                        'sizes' => ['50ml' => 18, '100ml' => 10, '30ml' => 15],
                    ],
                ],
                'images' => [
                    ['url' => '/images/products/runner-nz-anthracite.png', 'order' => 1, 'is_primary' => true],
                    ['url' => '/images/products/runner-nz-mushroom.png', 'order' => 2, 'is_primary' => false],
                ],
            ],
            [
                'category_id' => $menEdp->id,
                'name' => "Parfum Pria Citrus Breeze & Neroli EDP",
                'slug' => 'mens-citrus-breeze-neroli-edp',
                'short_description' => 'Kesegaran jeruk Sisilia, bunga neroli putih, dan amberwood yang cerah dan memikat.',
                'description' => '<p>Parfum musim panas terbaik untuk aktivitas luar ruangan maupun liburan pantai. Memberikan sensasi bersih, bersemangat, dan wangi yang sangat disukai orang sekitar.</p>',
                'material_info' => 'Top Notes: Sicilian Lemon, Mandarin Orange, Bergamot. Heart Notes: Neroli, Orange Blossom, Jasmine Sambac. Base Notes: Amberwood, White Musk, Angelica Root.',
                'sustainability_note' => 'Bahan botani murni tanpa pewarna sintetis berbahaya.',
                'base_price' => 780000,
                'compare_at_price' => null,
                'is_active' => true,
                'is_featured' => false,
                'weight_grams' => 320,
                'collections' => array_filter([$botanicalCol?->id, $saleCol?->id]),
                'variants' => [
                    [
                        'color_name' => 'Sunlight Gold',
                        'color_hex' => '#ded4c5',
                        'sizes' => ['50ml' => 20, '100ml' => 15, '30ml' => 25],
                    ],
                ],
                'images' => [
                    ['url' => '/images/products/cruiser-slipon-blizzard.png', 'order' => 1, 'is_primary' => true],
                ],
            ],

            // ----------------------------------------------------
            // WOMEN FRAGRANCES
            // ----------------------------------------------------
            [
                'category_id' => $womenFloral->id,
                'name' => "Parfum Wanita Rose Velvet & Damask Mist",
                'slug' => 'womens-rose-velvet-damask-mist',
                'short_description' => 'Kemewahan kelopak mawar Damaskus, raspberry manis, dan sentuhan musk sutra yang memikat.',
                'description' => '<p>Parfum wanita terlaris FIFA. Memancarkan aura feminin yang anggun, romantis, dan percaya diri. Setiap tetesnya mengekstrak ribuan kelopak mawar segar yang dipanen di waktu fajar.</p>',
                'material_info' => 'Top Notes: Damask Rose Petals, Pink Pepper, Wild Raspberry. Heart Notes: Peony, Turkish Rose Absolute, White Peach. Base Notes: Cashmere Wood, Silky White Musk, Amber.',
                'sustainability_note' => 'Kelopak mawar alami dari perkebunan bunga bebas pestisida.',
                'base_price' => 920000,
                'compare_at_price' => 1050000,
                'is_active' => true,
                'is_featured' => true,
                'weight_grams' => 350,
                'collections' => array_filter([$bestSellersCol?->id, $newArrivalsCol?->id, $botanicalCol?->id]),
                'variants' => [
                    [
                        'color_name' => 'Rose Petal Blush',
                        'color_hex' => '#9d7370',
                        'sizes' => ['50ml' => 30, '100ml' => 18, '30ml' => 35],
                    ],
                ],
                'images' => [
                    ['url' => '/images/products/tree-lounger-pink.png', 'order' => 1, 'is_primary' => true],
                    ['url' => '/images/products/tree-lounger-terracotta.png', 'order' => 2, 'is_primary' => false],
                ],
            ],
            [
                'category_id' => $womenGourmand->id,
                'name' => "Parfum Wanita Vanilla Silk & Warm Amber",
                'slug' => 'womens-vanilla-silk-warm-amber',
                'short_description' => 'Aroma vanila Madagaskar manis lembut berpadu krim kelapa, gula cokelat, dan kayu cendana.',
                'description' => '<p>Keharuman manis gourmand yang lezat dan membuat ketagihan. Lembut seperti pelukan sutra kasmir hangat, sempurna untuk malam kencan dan momen istimewa.</p>',
                'material_info' => 'Top Notes: Madagascar Vanilla Pod, Coconut Milk, Almond Blossom. Heart Notes: Brown Sugar, Heliotrope, Marshmallow Fluff. Base Notes: Warm Amber, Sandalwood, Clean Skin Musk.',
                'sustainability_note' => 'Vanila organik tersertifikasi fair-trade membantu komunitas petani lokal.',
                'base_price' => 880000,
                'compare_at_price' => 980000,
                'is_active' => true,
                'is_featured' => true,
                'weight_grams' => 340,
                'collections' => array_filter([$bestSellersCol?->id, $newArrivalsCol?->id]),
                'variants' => [
                    [
                        'color_name' => 'Warm Vanilla Cream',
                        'color_hex' => '#ded7cd',
                        'sizes' => ['50ml' => 28, '100ml' => 16, '30ml' => 24],
                    ],
                ],
                'images' => [
                    ['url' => '/images/products/canvas-cruiser-white.png', 'order' => 1, 'is_primary' => true],
                ],
            ],
            [
                'category_id' => $womenCitrus->id,
                'name' => "Parfum Wanita Blanc Pure White Floral EDP",
                'slug' => 'womens-blanc-pure-white-floral-edp',
                'short_description' => 'Sentuhan bunga melati putih, bunga lili lembah, dan embun pagi yang murni dan bersih.',
                'description' => '<p>Sensasi kemurnian sejati. Blanc Pure adalah wewangian floral putih yang bersih, anggun, dan segar seperti linen putih yang tertiup angin musim semi.</p>',
                'material_info' => 'Top Notes: White Jasmine Sambac, Lily of the Valley, Dewy Green Leaves. Heart Notes: Tuberose, White Freesia, Magnolia. Base Notes: Soft White Cedar, Clean Musk, Ambrette Seed.',
                'sustainability_note' => 'Formula 100% vegan, cruelty-free, dan bebas alergen berbahaya.',
                'base_price' => 950000,
                'compare_at_price' => null,
                'is_active' => true,
                'is_featured' => true,
                'weight_grams' => 350,
                'collections' => array_filter([$bestSellersCol?->id, $botanicalCol?->id]),
                'variants' => [
                    [
                        'color_name' => 'Pure Blanc Crystal',
                        'color_hex' => '#ffffff',
                        'sizes' => ['50ml' => 25, '100ml' => 15, '30ml' => 30],
                    ],
                ],
                'images' => [
                    ['url' => '/images/products/tree-runner-white.png', 'order' => 1, 'is_primary' => true],
                ],
            ],
            [
                'category_id' => $womenExtrait->id,
                'name' => "Parfum Wanita Crimson Ruby Rose Extrait",
                'slug' => 'womens-crimson-ruby-rose-extrait',
                'short_description' => 'Aroma misterius mawar merah pekat, safron Spanyol, dan kayu dupa mewah bertransisi magis.',
                'description' => '<p>Edisi terbatas Extrait de Parfum dengan konsentrasi tinggi. Memberikan sillage luar biasa yang meninggalkan jejak aroma tak terlupakan ke mana pun Anda melangkah.</p>',
                'material_info' => 'Top Notes: Spanish Saffron, Red Currant, Pomegranate. Heart Notes: Midnight Rose Absolute, Jasmine Grandiflorum, Incense Smoke. Base Notes: Dark Oud, Patchouli Oil, Black Amber.',
                'sustainability_note' => 'Minyak atsiri murni hasil distilasi uap mikro tanpa bahan kimia keras.',
                'base_price' => 1350000,
                'compare_at_price' => 1500000,
                'is_active' => true,
                'is_featured' => true,
                'weight_grams' => 420,
                'collections' => array_filter([$extraitCol?->id, $bestSellersCol?->id]),
                'variants' => [
                    [
                        'color_name' => 'Crimson Ruby Flacon',
                        'color_hex' => '#9e4747',
                        'sizes' => ['50ml' => 15, '100ml' => 10, '30ml' => 12],
                    ],
                ],
                'images' => [
                    ['url' => '/images/products/tree-dasher-red.png', 'order' => 1, 'is_primary' => true],
                ],
            ],
            [
                'category_id' => $womenAmber->id,
                'name' => "Parfum Wanita Terracotta Spiced Chai EDP",
                'slug' => 'womens-terracotta-spiced-chai-edp',
                'short_description' => 'Perpaduan kayu manis hangat, kapulaga India, susu rempah, dan kayu cedar cokelat.',
                'description' => '<p>Wewangian hangat bernuansa bumi yang unik dan eksotis. Memberikan ketenangan jiwa dan rasa nyaman sepanjang hari seperti menikmati secangkir chai tea hangat di sore yang sejuk.</p>',
                'material_info' => 'Top Notes: Ceylon Cinnamon, Cardamom Pods, Bergamot. Heart Notes: Chai Milk Accord, Nutmeg, Star Anise. Base Notes: Virginian Cedar, Sandalwood, Benzoin Resin.',
                'sustainability_note' => 'Bahan rempah organik berstandar internasional.',
                'base_price' => 840000,
                'compare_at_price' => null,
                'is_active' => true,
                'is_featured' => false,
                'weight_grams' => 330,
                'collections' => array_filter([$botanicalCol?->id]),
                'variants' => [
                    [
                        'color_name' => 'Terracotta Amber',
                        'color_hex' => '#b87358',
                        'sizes' => ['50ml' => 20, '100ml' => 12, '30ml' => 18],
                    ],
                ],
                'images' => [
                    ['url' => '/images/products/tree-lounger-terracotta.png', 'order' => 1, 'is_primary' => true],
                ],
            ],

            // ----------------------------------------------------
            // DISCOVERY SETS & TRAVEL GIFTS
            // ----------------------------------------------------
            [
                'category_id' => $menSet->id,
                'name' => "FIFA Men's Discovery Set (5 x 10ml)",
                'slug' => 'fifa-mens-discovery-set',
                'short_description' => 'Set sampel lengkap 5 varian parfum pria terlaris FIFA dalam kemasan travel spray mewah.',
                'description' => '<p>Temukan aroma signature Anda sebelum membeli botol penuh. Set berisi 5 botol mini 10ml: Aurora Blue, Obsidian Noir Oud, Sage Vetiver, Smoky Tobacco, dan Citrus Breeze.</p>',
                'material_info' => '5 botol kaca mini 10ml atomizer semprot halus dengan box hardcase bertekstur linen mewah.',
                'sustainability_note' => '100% kemasan kertas daur ulang bersertifikasi FSC.',
                'base_price' => 450000,
                'compare_at_price' => 550000,
                'is_active' => true,
                'is_featured' => false,
                'weight_grams' => 250,
                'collections' => array_filter([$newArrivalsCol?->id, $saleCol?->id]),
                'variants' => [
                    [
                        'color_name' => 'Matte Black Box Set',
                        'color_hex' => '#2b2b2b',
                        'sizes' => ['5x10ml' => 50],
                    ],
                ],
                'images' => [
                    ['url' => '/images/products/wool-runner-black.png', 'order' => 1, 'is_primary' => true],
                ],
            ],
            [
                'category_id' => $womenSet->id,
                'name' => "FIFA Women's Discovery Set (5 x 10ml)",
                'slug' => 'fifa-womens-discovery-set',
                'short_description' => 'Set sampel lengkap 5 varian parfum wanita favorit FIFA dalam kemasan gift box elegan.',
                'description' => '<p>Kado sempurna untuk diri sendiri atau orang tersayang. Berisi 5 botol mini 10ml: Rose Velvet, Vanilla Silk, Blanc Pure, Crimson Ruby Rose, dan Terracotta Chai.</p>',
                'material_info' => '5 botol kaca mini 10ml atomizer semprot halus dalam kotak hadiah kasmir putih.',
                'sustainability_note' => 'Kemasan ramah lingkungan bebas plastik sekali pakai.',
                'base_price' => 450000,
                'compare_at_price' => 550000,
                'is_active' => true,
                'is_featured' => false,
                'weight_grams' => 250,
                'collections' => array_filter([$newArrivalsCol?->id, $saleCol?->id]),
                'variants' => [
                    [
                        'color_name' => 'Pearl White Box Set',
                        'color_hex' => '#ffffff',
                        'sizes' => ['5x10ml' => 45],
                    ],
                ],
                'images' => [
                    ['url' => '/images/products/canvas-cruiser-white.png', 'order' => 1, 'is_primary' => true],
                ],
            ],
        ];

        // 4. Seed Products, Variants, Images & Reviews
        foreach ($productsData as $data) {
            $product = Product::updateOrCreate(
                ['slug' => $data['slug']],
                [
                    'category_id' => $data['category_id'],
                    'name' => $data['name'],
                    'short_description' => $data['short_description'],
                    'description' => $data['description'],
                    'material_info' => $data['material_info'],
                    'sustainability_note' => $data['sustainability_note'],
                    'base_price' => $data['base_price'],
                    'compare_at_price' => $data['compare_at_price'],
                    'is_active' => $data['is_active'],
                    'is_featured' => $data['is_featured'],
                    'weight_grams' => $data['weight_grams'],
                ]
            );

            // Sync collections
            if (!empty($data['collections'])) {
                $product->collections()->sync($data['collections']);
            }

            // Sync Images
            $product->images()->delete();
            foreach ($data['images'] as $img) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $img['url'],
                    'order' => $img['order'],
                    'is_primary' => $img['is_primary'],
                ]);
            }

            // Sync Variants
            $product->variants()->delete();
            $varIndex = 1;
            foreach ($data['variants'] as $varGroup) {
                foreach ($varGroup['sizes'] as $size => $stock) {
                    $sku = 'FIF-PRF-' . str_pad($product->id, 3, '0', STR_PAD_LEFT) . '-' . strtoupper(substr(Str::slug($varGroup['color_name']), 0, 4)) . '-' . $size . '-' . $varIndex;
                    ProductVariant::create([
                        'product_id' => $product->id,
                        'sku' => $sku,
                        'color_name' => $varGroup['color_name'],
                        'color_hex' => $varGroup['color_hex'],
                        'size' => (string) $size,
                        'stock' => (int) $stock,
                        'price_override' => null,
                        'is_active' => true,
                    ]);
                    $varIndex++;
                }
            }

            // Seed Sample Verified Reviews for each product
            $user = User::first();
            if ($user && $product->reviews()->count() === 0) {
                Review::create([
                    'product_id' => $product->id,
                    'user_id' => $user->id,
                    'rating' => 5,
                    'title' => 'Aroma luar biasa mewah & tahan seharian!',
                    'comment' => 'Wanginya sangat elegan dan tidak menyengat di hidung. Sillage dan ketahanannya di kulit lebih dari 12 jam. Banyak teman kantor yang menanyakan parfum apa yang saya pakai!',
                    'is_approved' => true,
                ]);
                Review::create([
                    'product_id' => $product->id,
                    'user_id' => $user->id,
                    'rating' => 5,
                    'title' => 'Kualitas parfum niche dengan botol estetik',
                    'comment' => 'Kemasan botol kacanya tebal dan terasa solid, atomizernya menyemprotkan partikel wangi yang sangat halus. 100% recommended untuk hadiah maupun pemakaian pribadi!',
                    'is_approved' => true,
                ]);
            }
        }

        echo "ProductSeeder completed: " . count($productsData) . " rich perfume products with transparent PNGs and variants seeded.\n";
    }
}

