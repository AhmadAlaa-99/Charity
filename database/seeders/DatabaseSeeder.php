<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
class DatabaseSeeder extends Seeder
{
  public function run(): void
  {
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

  }
}
