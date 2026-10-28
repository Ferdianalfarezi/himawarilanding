<?php

/*
|--------------------------------------------------------------------------
| Konten Landing Page Himawari Islamic School
|--------------------------------------------------------------------------
|
| Ubah teks, kontak, dan program di sini tanpa perlu menyentuh view.
|
*/

return [

    'name' => 'Himawari Islamic School',

    'tagline' => 'Fun, Friends, Learning. Islamic Montessori based school under psychologist supervision.',

    'contact' => [
        'phone' => '+62 822 1158 9962',
        'phone_link' => 'tel:+6282211589962',
        'whatsapp' => 'https://wa.me/6282211589962',
        'instagram' => 'https://www.instagram.com/himawaripreschool/',
        'instagram_handle' => '@himawaripreschool',
        'maps' => 'https://maps.app.goo.gl/6ckNDWfaqEZXRNj96',
        'maps_embed' => 'https://www.google.com/maps?q=Jl.+Puri+Gading+Utara+Raya+No.PGR+79+Jatimelati+Pondok+Melati+Bekasi&output=embed',
        'registration' => 'https://bit.ly/3RVKHu0',
        'address' => 'Jl. Puri Gading Utara Raya No.PGR 79 RT.003/RW.014, Jatimelati, Kec. Pd. Melati, Kota Bekasi, Jawa Barat 17414',
    ],

    'features' => [
        [
            'title' => 'Home-like Environment',
            'text' => 'Ruang kelas yang hangat dan akrab, supaya si kecil merasa nyaman seperti di rumah sendiri.',
            'icon' => 'home',
            'color' => 'sun',
        ],
        [
            'title' => 'Safety and Security',
            'text' => 'Lingkungan yang aman dan terpantau, dengan rasio guru dan anak yang kecil.',
            'icon' => 'shield',
            'color' => 'leaf',
        ],
        [
            'title' => 'Quality Educators',
            'text' => 'Guru yang sabar dan terlatih, didampingi supervisi psikolog untuk tumbuh kembang anak.',
            'icon' => 'star',
            'color' => 'sun',
        ],
        [
            'title' => 'Play to Learn',
            'text' => 'Belajar lewat bermain dan eksplorasi dengan pendekatan Montessori dan sensory integration.',
            'icon' => 'puzzle',
            'color' => 'leaf',
        ],
    ],

    'programs' => [
        [
            'name' => 'Pretoddler',
            'age' => '1 – 2 tahun',
            'image' => 'images/pretoddler.jpg',
            'text' => 'Pengalaman sekolah pertama yang lembut. Si kecil belajar mengenal lingkungan baru dengan rasa aman.',
            'schedule' => '08.00 – 09.45 WIB',
            'class_size' => 'Maks. 6 anak',
        ],
        [
            'name' => 'Toddler',
            'age' => '2 – 3 tahun',
            'image' => 'images/toddler.jpg',
            'text' => 'Tempat anak belajar bermain, berbagi, dan mengekspresikan diri bersama teman sebaya.',
            'schedule' => '08.30 – 11.00 WIB',
            'class_size' => 'Maks. 10 anak',
        ],
        [
            'name' => 'Kids',
            'age' => '3,5 – 4 tahun',
            'image' => 'images/kids-web.jpg',
            'text' => 'Langkah menuju kesiapan sekolah: mandiri, percaya diri, dan siap belajar.',
            'schedule' => '08.30 – 11.00 WIB',
            'class_size' => 'Maks. 10 anak',
        ],
        [
            'name' => 'Kindergarten',
            'age' => '4 – 6 tahun',
            'image' => 'images/main.png',
            'text' => 'Persiapan menuju sekolah dasar: membaca, menulis, berhitung, dan akhlak baik lewat cara belajar yang menyenangkan.',
            'schedule' => null,
            'class_size' => null,
        ],
    ],

    'activities' => [
        [
            'title' => 'Islamic Montessori',
            'tag' => 'Belajar mandiri',
            'image' => 'images/montessori.jpg',
            'icon' => 'puzzle',
        ],
        [
            'title' => 'Sensory Integration',
            'tag' => 'Stimulasi indra',
            'image' => 'images/toddler.jpg',
            'icon' => 'star',
        ],
        [
            'title' => 'Outing Class & Field Trip',
            'tag' => 'Belajar di luar kelas',
            'image' => 'images/field-trip-web.jpg',
            'icon' => 'map',
        ],
        [
            'title' => 'Under Supervision by Psychologist & Therapist',
            'tag' => 'Pendampingan ahli',
            'image' => 'images/consultation-web.jpg',
            'icon' => 'shield',
        ],
        [
            'title' => 'Graduation',
            'tag' => 'Momen kelulusan',
            'image' => 'images/graduation-web.jpg',
            'icon' => 'users',
        ],
        [
            'title' => 'Practical Life',
            'tag' => 'Belajar menjemur pakaian',
            'image' => 'images/jemuran.jpg',
            'icon' => 'star',
        ],
        [
            'title' => 'Art & Craft',
            'tag' => 'Kreativitas',
            'image' => 'images/toddler.jpg',
            'icon' => 'puzzle',
        ],
        [
            'title' => 'Hari Kemerdekaan',
            'tag' => 'Lomba 17 Agustus',
            'image' => 'images/kemerdekaan.jpg',
            'icon' => 'star',
        ],
        [
            'title' => 'Eco Print',
            'tag' => 'Berkarya dengan bahan alam',
            'image' => 'images/tumbuk-web.jpg',
            'icon' => 'puzzle',
        ],
        [
            'title' => 'Cooking Class',
            'tag' => 'Praktik kehidupan',
            'image' => 'images/pretoddler.jpg',
            'icon' => 'users',
        ],
    ],

    /*
    | Testimoni orang tua (sementara masih contoh, ganti dengan testimoni asli).
    | color: yellow, green, pink, blue, orange
    */
    'testimonials' => [
        [
            'name' => 'Bunda Aisyah',
            'role' => 'Orang tua murid Toddler',
            'quote' => 'Anak saya jadi lebih berani dan mandiri. Setiap pagi malah semangat minta berangkat sekolah!',
            'image' => 'images/pegboard/web/testimoni-2.jpg',
            'color' => 'yellow',
        ],
        [
            'name' => 'Ayah Raka',
            'role' => 'Orang tua murid Kids',
            'quote' => 'Gurunya sabar sekali dan laporan hariannya bikin kami tenang selama bekerja.',
            'image' => 'images/pegboard/web/testimoni-3.jpg',
            'color' => 'green',
        ],
        [
            'name' => 'Bunda Nadia',
            'role' => 'Orang tua murid Pretoddler',
            'quote' => 'Sekolah pertama yang pas untuk si kecil. Suasananya hangat seperti di rumah.',
            'image' => 'images/pegboard/web/testimoni-4.jpg',
            'color' => 'pink',
        ],
        [
            'name' => 'Bunda Salma',
            'role' => 'Orang tua murid Kindergarten',
            'quote' => 'Field trip ke pos pemadam kebakaran seru sekali. Anak pulang semangat cerita ingin jadi pemadam kebakaran!',
            'image' => 'images/pegboard/web/testimoni-1.jpg',
            'color' => 'blue',
        ],
        [
            'name' => 'Ayah Fikri',
            'role' => 'Orang tua murid Kids',
            'quote' => 'Ada supervisi psikolog, jadi tumbuh kembang anak benar-benar terpantau.',
            'image' => 'images/pegboard/web/testimoni-5.jpg',
            'color' => 'orange',
        ],
        [
            'name' => 'Bunda Hana',
            'role' => 'Orang tua murid Toddler',
            'quote' => 'Kelasnya kecil, jadi setiap anak dapat perhatian penuh dari gurunya.',
            'image' => 'images/pegboard/web/testimoni-6.jpg',
            'color' => 'green',
        ],
        [
            'name' => 'Bunda Rina',
            'role' => 'Orang tua murid Kindergarten',
            'quote' => 'Terharu lihat anak tampil percaya diri saat graduation. Terima kasih Himawari!',
            'image' => 'images/pegboard/web/testimoni-7.jpg',
            'color' => 'yellow',
        ],
    ],

    'curriculum' => [
        [
            'title' => 'Kurikulum Nasional',
            'text' => 'Fondasi pembelajaran mengikuti kurikulum nasional untuk pendidikan anak usia dini.',
        ],
        [
            'title' => 'Metode Montessori',
            'text' => 'Anak belajar mandiri lewat aktivitas nyata dan material yang dirancang sesuai tahap perkembangannya.',
        ],
        [
            'title' => 'Sensory Integration',
            'text' => 'Aktivitas yang melatih indra dan motorik, membantu anak memahami dunia di sekitarnya.',
        ],
        [
            'title' => 'Nilai Islami',
            'text' => 'Kebiasaan baik dan nilai-nilai Islam ditanamkan lewat rutinitas sehari-hari yang menyenangkan.',
        ],
    ],

    'faqs' => [
        [
            'question' => 'Kurikulum apa yang digunakan?',
            'answer' => 'Kami memadukan kurikulum nasional dengan pendekatan Montessori dan sensory integration.',
        ],
        [
            'question' => 'Bagaimana jadwal kelasnya?',
            'answer' => 'Kelas Toddler dan Kids berlangsung pukul 08.30 – 11.00 WIB (2,5 jam). Kelas Pretoddler pukul 08.00 – 09.45 WIB (1 jam 45 menit). Jadwal ini berlaku untuk tahun ajaran 2027–2028.',
        ],
        [
            'question' => 'Berapa jumlah anak dalam satu kelas?',
            'answer' => 'Kelas Toddler dan Kids maksimal 10 anak dengan 2 guru utama dan 1 asisten. Kelas Pretoddler maksimal 6 anak dengan 2 guru utama dan 1 asisten.',
        ],
        [
            'question' => 'Bagaimana dengan makanan anak?',
            'answer' => 'Orang tua membawakan bekal snack ringan yang rendah gula. Waktu makan dibatasi 20 menit.',
        ],
        [
            'question' => 'Apakah ada laporan harian?',
            'answer' => 'Ada. Guru mengirimkan laporan aktivitas harian beserta foto ke grup orang tua.',
        ],
    ],

];
