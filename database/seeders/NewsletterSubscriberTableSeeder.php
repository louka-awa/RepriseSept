<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NewsletterSubscriber;

class NewsletterSubscriberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subscriberRecords = [
            ['id'=>1,'email'=>'amit100@yopmail.com','status'=>1],
            ['id'=>2,'email'=>'amit200@yopmail.com','status'=>1]
        ];
        NewsletterSubscriber::insert($subscriberRecords);
    }
}
