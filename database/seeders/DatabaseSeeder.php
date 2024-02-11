<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('ar_SA'); // لتوليد بيانات باللغة العربية
        $jsonPath = base_path('public/countries.json');
        if (File::exists($jsonPath)) {
            $jsonData = File::get($jsonPath);
            $countries = json_decode($jsonData);
            foreach ($countries as $country) {
                DB::table('nationalities')->insert([
                    'name' => $country->name,
                ]);
            }
        } else {
            echo "ملف JSON غير موجود في المسار المحدد.";
        }

        $this->call(PermissionSeeder::class);
        $this->call(AdminSeeder::class);
        foreach (range(1, 10) as $index) {
            DB::table('partners')->insert([
                'name' => $faker->company,
                'logo' => $faker->imageUrl(200, 200, 'business', true, 'logo'),
                'link' => $faker->url,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null, // اختياري: يمكن استخدام $faker->boolean ? null : now() لجعل بعض السجلات محذوفة
            ]);
        }
        foreach (range(1, 10) as $index) {
            DB::table('links')->insert([
                'name' => $faker->company,
                'link' => $faker->url,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        $sections = ['دعم فني', 'إدارة', 'برامج'];
        foreach ($sections as $section) {
            DB::table('sections')->insert([
                'name' => $section,
                'email' => strtolower(str_replace(' ', '', $section)) . '@example.com',
                'phone' => '1234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        DB::table('about_us')->insert([
            'name' => 'جمعية الدعوة بالمزاحمية',
            'logo' => 'path/to/logo.png', // يجب تغيير المسار //C:\laragon\www\charity\public\seeder\logo.png
            'email' => 'info@example.com',
            'address' => 'العنوان هنا',
            'permit_number' => '123456',
            'bank_account_1' => '1234567890',
            'bank_account_2' => '0987654321',
            'phone' => '1234567890',
            'description' => '<p>وصف الجمعية</p>',
            'vision' => '<p>رؤية الجمعية</p>',
            'message' => '<p>رسالة الجمعية</p>',
            'value' => '<p>قيم الجمعية</p>',
            'objectives' => '<p>أهداف الجمعية</p>',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $contacts = ['فيسبوك', 'واتس اب', 'يوتيوب', 'تويتر'];
        foreach ($contacts as $contact) {
            DB::table('contact_informations')->insert([
                'name' => $contact,
                'link' => 'https://' . strtolower($contact) . '.com/example',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        $faker = Faker::create('ar_SA'); // لتوليد بيانات باللغة العربية
        for ($i = 1; $i <= 5; $i++) {
            DB::table('council_metting')->insert([
                'name' => 'اجتماع ' . $i,
                'date' => $faker->date(),
                'type' => $faker->randomElement(['type1', 'type2']),
                'is_publication' => true,
                'documention' => $faker->url,
                'cost' => $faker->numberBetween(1000, 5000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            DB::table('employees')->insert([
                'name' => $faker->name,
                'section_id' => $faker->numberBetween(1, 3), // افتراض أن لديك 3 أقسام
                'nationality_id' => $faker->numberBetween(1, 10), // افتراض وجود 10 جنسيات
                'gender' => $faker->randomElement(['ذكر', 'أنثى']),
                'date' => $faker->date(),
                'work_nature' => 'دوام كامل',
                'qualification' => $faker->randomElement(['بكالوريوس', 'ماجستير', 'دكتوراه']),
                'type' => $faker->randomElement(['part', 'full']),
                'work_status' => $faker->randomElement(['type1', 'type2']),
                'wage' => $faker->numberBetween(3000, 7000),
                'grant' => $faker->randomElement(['نعم', 'لا']),
                'notes' => $faker->text(50),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        for ($i = 0; $i < 8; $i++) {
            DB::table('events')->insert([
                'name' => $faker->sentence(3),
                'type' => $faker->randomElement(['كلمة', 'درس','لقاء','معرض']),
                'location' => $faker->address,
                'date' => $faker->date(),
                'image' => $faker->imageUrl(640, 480, 'events'),
                'brive' => $faker->text(200),
                'notes' => $faker->text(100),
                'is_publish' => $faker->boolean,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        for ($i = 0; $i < 10; $i++) {
            DB::table('governances')->insert([
                'name' => 'حوكمة ' . ($i + 1),
                'date' => $faker->date(),
                'documention' => $faker->url,
                'image' => $faker->imageUrl(640, 480, 'governance'),
                'note' => $faker->text(100),
                'cost' => $faker->numberBetween(1000, 5000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        for ($i = 0; $i < 5; $i++) {
            DB::table('umrahs')->insert([
                'name' => 'عمرة ' . ($i + 1),
                'type' => $faker->randomElement(['عوائل', 'افراد']),
                'company' => $faker->company,
                'n_days' => $faker->numberBetween(3, 10),
                'location' => $faker->city,
                'move_on' => $faker->date(),
                'start_date' => $faker->date(),
                'end_date' => $faker->date(),
                'status' => $faker->randomElement(['قريبا', 'متاحة','مغلقة','منفذة']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        for ($i = 0; $i < 5; $i++) {
            DB::table('muamtaris')->insert([
                'name' => $faker->name,
                'number' => $faker->unique()->numberBetween(10000, 99999),
                'gender' => $faker->randomElement(['ذكر', 'أنثى']),
                'nationality_id' => $faker->numberBetween(1, 10), // افتراض وجود 10 جنسيات
                'umrah_id' => $faker->numberBetween(1, 5), // افتراض إنشاء 5 سجلات عمرة
                'last' => $faker->date(),
                'birth_date' => $faker->date(),
                'members' => $faker->numberBetween(1, 4),
                'created_at' => now(),
                'updated_at' => now(),
                'status'=>'done',
            ]);
        }

for ($i = 0; $i < 10; $i++) { // إنشاء 10 سجلات
    DB::table('news')->insert([
        'title' => $faker->sentence,
        'brive_new' => $faker->text(200),
        'whole_new' => $faker->text(500),
        'date' => $faker->date(),
        'image' => $faker->imageUrl(640, 480, 'news'),
        'main' => $faker->boolean,
        'is_publish' => $faker->boolean,
        'created_at' => now(),
        'updated_at' => now(),
    ]);
}
for ($i = 0; $i < 10; $i++) { // إنشاء 10 سجلات
    DB::table('projects')->insert([
        'name' => $faker->word,
        'description' => $faker->paragraph,
        'category' => $faker->word,
        'cost' => $faker->randomNumber(4) . ' SAR',
        'suppport_party' => $faker->company,
        'objective' => $faker->sentence,
        'image' => $faker->imageUrl(640, 480, 'business'),
        'documention' => $faker->url,
        'date' => $faker->date(),
        'note' => $faker->text(200),
        'is_publish' => $faker->boolean,
        'created_at' => now(),
        'updated_at' => now(),
    ]);
}
foreach (range(1, 10) as $index) {
    DB::table('sliders')->insert([
        'sub_title' => $faker->text(30), // نص قصير بحد أقصى 30 حرف
        'main_title' => $faker->text(50), // نص أطول بحد أقصى 50 حرف
        'details' => $faker->text(100), // نص تفصيلي بحد أقصى 100 حرف
        'image' => $faker->imageUrl(640, 480, 'abstract'), // رابط صورة عشوائية
        'is_publish' => $faker->boolean, // قيمة بوليانية عشوائية
        'created_at' => now(),
        'updated_at' => now(),
    ]);
}
foreach (range(1, 10) as $index) {
    DB::table('videos')->insert([
        'title' => $faker->sentence(6), // عنوان فيديو قصير
        'description' => $faker->text(200), // وصف بسيط للفيديو
        'date' => $faker->date(), // تاريخ عشوائي
        'link' => $faker->url, // رابط عشوائي (يمكنك استخدام $faker->imageUrl لصور ولكن هنا يفترض أن يكون رابط يوتيوب)
        'type' => $faker->randomElement(['channel', 'video']), // نوع الفيديو
        'is_publication' => $faker->boolean, // قيمة بوليانية عشوائية
        'notes' => $faker->text(100), // ملاحظات عشوائية
        'created_at' => now(),
        'updated_at' => now(),
    ]);
}
foreach (range(1, 10) as $index) {
    DB::table('images')->insert([
        'imageUrl' => $faker->imageUrl(640, 480, 'nature'), // رابط صورة عشوائية لطبيعة
        'created_at' => now(),
        'updated_at' => now(),
    ]);
}






    }
}
