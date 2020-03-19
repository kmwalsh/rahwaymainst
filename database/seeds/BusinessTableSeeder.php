<?php

use Illuminate\Database\Seeder;

class BusinessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('businesses')->insert([
            'name' => 'KMW, LLC',
            'email' => 'kwalshucnj@gmail.com',
            'approved' => 1,
            'tagline' => 'Experienced and multidisciplinary web development in Rahway.',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed iaculis ac sapien nec consequat. Sed eu velit dictum, tincidunt ante eget, malesuada magna. Duis sollicitudin ac nibh vitae ullamcorper. Praesent id feugiat justo.',
            'address' => '2363 Price St. Rahway New Jersey 07065',
            'public_address' => 0,
            'phone' => '(7324999824)',
            'fax' => '(7324999824)',
            'linkedin' => 'http://linkedin.com',
            'instagram' => 'http://instagram.com',
            'youtube' => 'http://youtube.com',
            'twitter' => 'http://twitter.com',
            'facebook' => 'http://facebook.com',
            'store' => 'http://katemwalsh.com',
            'type' => 'freelance',
            'user_id' => 1,
        ]);
    }
}
