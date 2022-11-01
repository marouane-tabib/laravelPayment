<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PaymentPlatform;

class PaymentPlatformsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentPlatform::create([
            'name' => 'Paypal',
            'image' => 'img/payment-platforms/paypal.jpg',
        ]);
        PaymentPlatform::create([
            'name' => 'Stripe',
            'image' => 'img/payment-platforms/stripe.jpg',
        ]);
    }
}
