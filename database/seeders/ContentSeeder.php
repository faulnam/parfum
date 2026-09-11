<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Coupon;
use App\Models\HeroSlide;
use App\Models\Page;
use App\Models\StoreLocation;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Static Pages
        $pages = [
            [
                'title' => 'Kisah FIFA (Our Story)',
                'slug' => 'our-story',
                'meta_title' => 'Tentang Kami — Filosofi & Seni Wewangian Alami FIFA',
                'meta_description' => 'FIFA memadukan seni perfumery klasik Eropa dengan kekayaan minyak atsiri alami Nusantara untuk menciptakan wewangian mewah berjiwa modern.',
                'content' => '<p>FIFA lahir dari hasrat mendalam terhadap keindahan aroma alami yang otentik dan menenangkan. Kami percaya bahwa wewangian bukan sekadar wangi, melainkan identitas, emosi, dan kenangan tak terlupakan.</p><h2>Kemewahan Ekstrak Botani Alami</h2><p>Kami menolak penggunaan bahan kimia keras pengawet sintetis. Setiap botol parfum FIFA diformulasikan dari <strong>minyak atsiri murni</strong>, kelopak mawar Damaskus, ekstrak vanila Madagaskar, kayu gaharu Kalimantan, dan bergamot segar dari perkebunan organik terakreditasi.</p><p>Hasilnya adalah aroma yang berlapis (*multi-dimensional*), memiliki sillage memikat, dan aman di kulit Anda sepanjang hari.</p>',
            ],
            [
                'title' => 'Keberlanjutan & Bahan Botani Alami',
                'slug' => 'sustainability',
                'meta_title' => 'Komitmen Botani Alami & Keberlanjutan — FIFA Fragrance',
                'meta_description' => 'Bagaimana FIFA menjaga kelestarian alam melalui sumber bahan baku organik, botol kaca daur ulang, dan perdagangan adil bersama petani lokal.',
                'content' => '<p>Di FIFA, kami meyakini bahwa kemewahan sejati harus selaras dengan kelestarian bumi.</p><h3>Tiga Pilar Keberlanjutan FIFA:</h3><ul><li><strong>100% Minyak Atsiri Berkelanjutan:</strong> Dipanen secara etis bersama komunitas petani lokal.</li><li><strong>Kemasan Ramah Lingkungan:</strong> Botol kaca daur ulang premium, tutup logam tahan lama, dan kotak kemasan bersertifikasi FSC.</li><li><strong>Cruelty-Free & Vegan:</strong> Tidak pernah diuji pada hewan dan bebas dari turunan sintetis berbahaya.</li></ul>',
            ],
            [
                'title' => 'Tanya Jawab & Bantuan (FAQ)',
                'slug' => 'faq',
                'meta_title' => 'Pusat Bantuan & FAQ — FIFA Indonesia',
                'meta_description' => 'Pertanyaan yang sering diajukan mengenai konsentrasi parfum, tips ketahanan wangi, garansi pengiriman aman botol kaca, dan panduan memilih aroma.',
                'content' => '<h3>Berapa lama aroma parfum FIFA bertahan di kulit?</h3><p>Varian <strong>Eau de Parfum (EDP)</strong> kami memiliki ketahanan 8 - 12 jam, sedangkan varian <strong>Extrait de Parfum</strong> bertahan hingga 14 - 18 jam tergantung aktivitas dan jenis kulit Anda.</p><h3>Bagaimana cara membuat parfum lebih tahan lama?</h3><p>Semprotkan parfum pada titik-titik nadi (pergelangan tangan, leher, belakang telinga, dan dada) setelah mandi saat pori-pori kulit lembap. Oleskan pelembap/lotion tanpa wangi sebelum menyemprot untuk mengunci molekul aroma.</p><h3>Apakah pengiriman botol kaca aman sampai tujuan?</h3><p>Sangat aman! Setiap pesanan FIFA dikemas dengan pelindung box ganda, bubble wrap tebal antibenturan, dan segel tamper-evident. Jika terjadi kerusakan/pecah saat pengiriman, kami ganti 100% botol baru!</p>',
            ],
            [
                'title' => 'Pengiriman & Pengembalian',
                'slug' => 'shipping-returns',
                'meta_title' => 'Kebijakan Pengiriman & Garansi Parfum — FIFA Indonesia',
                'meta_description' => 'Informasi ekspedisi logistik pengiriman aman cairan botol kaca dan kebijakan garansi aroma FIFA.',
                'content' => '<p>Kami bekerjasama dengan ekspedisi resmi terpercaya yang memiliki standar penanganan cairan (Biteship, JNE, SiCepat, GoSend, Grab Instant).</p><p>Gratis ongkir berlaku untuk seluruh transaksi dengan total belanja minimum Rp 300.000 ke seluruh wilayah Indonesia.</p>',
            ],
            [
                'title' => 'Panduan Memilih Aroma (Fragrance Guide)',
                'slug' => 'size-guide',
                'meta_title' => 'Panduan Memilih Profil Aroma Parfum — FIFA Indonesia',
                'meta_description' => 'Pelajari piramida aroma (top, heart, base notes) dan temukan kepribadian aroma yang sesuai untuk Anda.',
                'content' => '<p>Pilihlah aroma yang merefleksikan kepribadian dan suasana Anda:</p><ul><li><strong>Fresh & Aquatic:</strong> Sempurna untuk aktivitas siang hari, olahraga, dan cuaca panas.</li><li><strong>Floral & Sweet:</strong> Memberikan kesan feminin, ceria, dan romantis.</li><li><strong>Woody & Oud:</strong> Ideal untuk acara formal, malam hari, dan memberikan kesan karismatik mendalam.</li><li><strong>Gourmand & Vanilla:</strong> Hangat, manis lembut, dan memikat untuk suasana kencan santai.</li></ul>',
            ],
            [
                'title' => 'Panduan Perawatan Parfum (Perfume Care)',
                'slug' => 'shoe-care',
                'meta_title' => 'Cara Menyimpan & Merawat Botol Parfum — FIFA Indonesia',
                'meta_description' => 'Tips menjaga kestabilan molekul minyak wangi agar kualitas aroma tetap segar dan sempurna.',
                'content' => '<p>Simpan botol parfum FIFA di tempat yang sejuk, kering, dan terhindar dari paparan sinar matahari langsung maupun perubahan suhu ekstrem (seperti di dalam mobil panas). Tutup rapat botol setelah digunakan untuk mencegah penguapan alkohol alami.</p>',
            ],
            [
                'title' => 'Jejak Karbon & Formula Bersih',
                'slug' => 'carbon-footprint',
                'meta_title' => 'Transparansi Formula Bersih & Jejak Karbon FIFA',
                'meta_description' => 'Mengapa kami berkomitmen menggunakan bahan botani alami dan meniadakan bahan kimia keras.',
                'content' => '<p>Formula FIFA dirancang dengan standar kemurnian tinggi — bebas dari paraben, ftalat, dan fiksatif hewani buatan. Kami memastikan setiap tetesnya aman untuk kulit sensitif dan ramah lingkungan.</p>',
            ],
            [
                'title' => 'Hubungi Kami',
                'slug' => 'contact',
                'meta_title' => 'Hubungi Tim Layanan Pelanggan FIFA',
                'meta_description' => 'Konsultasi aroma dan layanan bantuan via WhatsApp dan Email.',
                'content' => '<p>Konsultan wewangian dan Customer Support FIFA siap membantu Anda setiap hari (Senin - Minggu, 09:00 - 21:00 WIB).</p><p>Email: <strong>concierge@fifa.co.id</strong><br>WhatsApp: <strong>0812-3456-7890</strong></p>',
            ],
        ];

        foreach ($pages as $p) {
            Page::updateOrCreate(['slug' => $p['slug']], $p);
        }

        // 2. Store Locations
        $stores = [
            [
                'name' => 'FIFA Fragrance Flagship Senayan City',
                'address' => 'Senayan City Mall Lt. 1 Unit 1-28, Jl. Asia Afrika Lot 19, Gelora, Tanah Abang',
                'city' => 'Jakarta Pusat',
                'phone' => '(021) 7278-1234',
                'opening_hours' => 'Setiap hari 10:00 - 22:00 WIB',
                'latitude' => -6.2271230,
                'longitude' => 106.7974560,
                'is_active' => true,
            ],
            [
                'name' => 'FIFA Boutique Grand Indonesia',
                'address' => 'Grand Indonesia West Mall Lt. 2, Jl. M.H. Thamrin No. 1, Menteng',
                'city' => 'Jakarta Pusat',
                'phone' => '(021) 2358-5678',
                'opening_hours' => 'Setiap hari 10:00 - 22:00 WIB',
                'latitude' => -6.1951230,
                'longitude' => 106.8214560,
                'is_active' => true,
            ],
            [
                'name' => 'FIFA Boutique Paris Van Java Bandung',
                'address' => 'Paris Van Java Mall Resort Level, Jl. Sukajadi No. 131-139, Cipedes',
                'city' => 'Kota Bandung',
                'phone' => '(022) 8206-3456',
                'opening_hours' => 'Setiap hari 10:00 - 22:00 WIB',
                'latitude' => -6.8891230,
                'longitude' => 107.5964560,
                'is_active' => true,
            ],
            [
                'name' => 'FIFA Boutique Tunjungan Plaza Surabaya',
                'address' => 'Tunjungan Plaza 6 Lt. 3, Jl. Embong Malang No. 21-31, Kedungdoro',
                'city' => 'Kota Surabaya',
                'phone' => '(031) 5345-6789',
                'opening_hours' => 'Setiap hari 10:00 - 22:00 WIB',
                'latitude' => -7.2621230,
                'longitude' => 112.7384560,
                'is_active' => true,
            ],
            [
                'name' => 'FIFA Boutique Beachwalk Bali',
                'address' => 'Beachwalk Shopping Center Lt. 1, Jl. Pantai Kuta, Badung',
                'city' => 'Bali',
                'phone' => '(0361) 8464-1234',
                'opening_hours' => 'Setiap hari 10:00 - 23:00 WITA',
                'latitude' => -8.7181230,
                'longitude' => 115.1694560,
                'is_active' => true,
            ],
        ];

        foreach ($stores as $s) {
            StoreLocation::updateOrCreate(['name' => $s['name']], $s);
        }

        // 3. Blog Posts
        $posts = [
            [
                'title' => 'Rahasia Menggunakan Parfum Agar Tahan Lebih dari 12 Jam',
                'slug' => 'rahasia-parfum-tahan-lama-seharian',
                'excerpt' => 'Pelajari teknik layering aroma, titik semprot paling efektif, dan cara menjaga molekul minyak wangi tetap aktif sepanjang hari.',
                'cover_image' => 'https://images.unsplash.com/photo-1592945403244-b3fbafd7f539?w=1200&q=80',
                'content' => '<p>Banyak orang mengeluh aroma parfum cepat memudar hanya dalam beberapa jam. Kuncinya bukan hanya pada kualitas konsentrasi parfum, namun juga cara aplikasi dan kelembapan kulit Anda.</p><h2>Titik Nadi & Hidrasi Kulit</h2><p>Kulit yang terhidrasi dengan baik menahan molekul minyak wangi 3 kali lebih lama dibandingkan kulit kering. Semprotkan pada leher, pergelangan tangan, dan lipatan siku setelah mandi untuk hasil proyeksi terbaik.</p>',
                'is_published' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Mengenal Perbedaan Eau de Parfum (EDP) vs Extrait de Parfum',
                'slug' => 'perbedaan-edp-vs-extrait-de-parfum',
                'excerpt' => 'Mengapa konsentrasi minyak atsiri murni menentukan kedalaman aroma, sillage, dan daya tahan wewangian di kulit.',
                'cover_image' => 'https://images.unsplash.com/photo-1541643600914-78b084683601?w=1200&q=80',
                'content' => '<p>Eau de Parfum umumnya mengandung 15-20% konsentrat minyak wangi, sedangkan Extrait de Parfum mencapai 30-40%. Extrait memberikan aroma yang lebih intens, kaya, dan bertransisi secara halus selama berjam-jam.</p>',
                'is_published' => true,
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Keajaiban Kayu Gaharu & Minyak Nilam Nusantara dalam Niche Perfumery',
                'slug' => 'keajaiban-gaharu-dan-nilam-nusantara',
                'excerpt' => 'Bagaimana bahan alami Indonesia menjadi bahan paling dicari dan dihargai tinggi oleh para perfumer kelas dunia.',
                'cover_image' => 'https://images.unsplash.com/photo-1615397349754-cfa2066a298e?w=1200&q=80',
                'content' => '<p>Indonesia menghasilkan minyak nilam (patchouli) dan gaharu (oud) terbaik di dunia. FIFA dengan bangga mengangkat kekayaan botani ini menjadi karya seni wewangian bernilai seni tinggi.</p>',
                'is_published' => true,
                'published_at' => now()->subDay(),
            ],
        ];

        foreach ($posts as $post) {
            BlogPost::updateOrCreate(['slug' => $post['slug']], $post);
        }

        // 4. Hero Slides
        $slides = [
            [
                'page' => 'home',
                'title' => 'Kemewahan Aroma Alami & Wewangian Ikonik',
                'subtitle' => 'Diciptakan dari ekstrak botani murni, kelopak bunga segar, dan kayu aromatik Nusantara.',
                'cta_text' => 'Parfum Pria',
                'cta_link' => '/men',
                'image' => '/images/home/hero-dasher.jpg',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'page' => 'home',
                'title' => 'Pesona Wewangian yang Menawan Jiwa',
                'subtitle' => 'Wangi mewah, sillage memikat, dan tahan lama hingga 14 jam di setiap momen Anda.',
                'cta_text' => 'Parfum Wanita',
                'cta_link' => '/women',
                'image' => '/images/home/hero-dasher.jpg',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'page' => 'men',
                'title' => 'Koleksi Parfum Pria Eksklusif',
                'subtitle' => 'Karakter maskulin berwibawa dari oud, cedarwood, dan kesegaran laut Calabria.',
                'cta_text' => 'Lihat Semua Parfum Pria',
                'cta_link' => '/men',
                'image' => '/images/home/hero-dasher.jpg',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'page' => 'women',
                'title' => 'Koleksi Parfum Wanita Memikat',
                'subtitle' => 'Keanggunan kelopak mawar Damaskus, vanila Madagaskar, dan melati putih murni.',
                'cta_text' => 'Lihat Semua Parfum Wanita',
                'cta_link' => '/women',
                'image' => '/images/home/hero-dasher.jpg',
                'order' => 1,
                'is_active' => true,
            ],
        ];

        foreach ($slides as $slide) {
            HeroSlide::updateOrCreate([
                'page' => $slide['page'],
                'order' => $slide['order'],
            ], $slide);
        }

        // 5. Coupons
        $coupons = [
            [
                'code' => 'WELCOME10',
                'type' => 'percent',
                'value' => 10,
                'min_purchase' => 300000,
                'max_discount' => 100000,
                'starts_at' => now()->subDays(10),
                'expires_at' => now()->addMonths(6),
                'usage_limit' => 1000,
                'used_count' => 5,
                'is_active' => true,
            ],
            [
                'code' => 'FIFA50K',
                'type' => 'fixed',
                'value' => 50000,
                'min_purchase' => 500000,
                'max_discount' => null,
                'starts_at' => now()->subDays(5),
                'expires_at' => now()->addMonths(3),
                'usage_limit' => 500,
                'used_count' => 12,
                'is_active' => true,
            ],
            [
                'code' => 'FRAGRANCE20',
                'type' => 'percent',
                'value' => 20,
                'min_purchase' => 1000000,
                'max_discount' => 250000,
                'starts_at' => now()->subDays(1),
                'expires_at' => now()->addMonths(1),
                'usage_limit' => 200,
                'used_count' => 0,
                'is_active' => true,
            ],
        ];

        foreach ($coupons as $c) {
            Coupon::updateOrCreate(['code' => $c['code']], $c);
        }
    }
}

