<?php

namespace Database\Seeders;

use App\Models\Webhooks\Webhook;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebhookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'type' => 'PIX_CASH_IN',
                'url' => 'http://localhost/webhook/pix_cash_in',
                'description' => 'Pix received',
            ],
            [
                'type' => 'PIX_CASH_OUT',
                'url' => 'http://localhost/webhook/pix_cash_out',
                'description' => 'Pix sent',
            ]
        ];

        foreach ($types as $type) {
            Webhook::updateOrCreate(
                $type
            );
        }
    }
}
