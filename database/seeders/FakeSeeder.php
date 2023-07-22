<?php

namespace Database\Seeders;

use App\Models\Fake;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Fake::factory(100)->create();

        $fakes = new Fake();
        $fakes->name = 'ali';
        $fakes->email = 'ali@k.com';
        $fakes->password = Hash::make('123456789');

        $isSaved = $fakes->save();
    }
}
