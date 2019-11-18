<?php

use App\User;
use App\Test;
use Illuminate\Database\Seeder;

class UserSeedTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 20)->create(['role' => 'main_creator'])->each(function ($user) {
            $user->main_creators()->save(factory(Test::class)->create());

        });

        factory(App\User::class, 30)->create(['role' => 'creator'])->each(function ($user) {
            $digits = collect([random_int(1, 2), random_int(1, 4), random_int(1, 29), random_int(1, 29)])->unique();
            foreach ($digits as $digit) {
                # code...
                $user->tests()->attach($digit);
            }
        });

        factory(App\User::class, 50)->create(['role' => 'user'])->each(function ($user) {
            $digits = collect([random_int(1, 2), random_int(1, 4), random_int(1, 49), random_int(1, 49)])->unique();
            foreach ($digits as $digit) {
                # code...
                $user->tests()->attach($digit);
            }
        });
    }
}
