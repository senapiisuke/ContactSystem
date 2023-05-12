<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contacts;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contacts::create([
            'name' => '山田',
            'kana' => 'ヤマダ',
            'tell' => '123456789',
            'email' => 'yamada@email.com',
            'body' => 'お問合せです。'
        ]);
    }
}
