<?php

use App\Method;
use App\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class RankingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        factory(User::class, 50)
            ->create()
            ->each(function (User $user) use ($faker) {
                foreach (Method::all() as $method) {
                    $method->users()->attach($user, [
                        'attempt' => $faker->randomNumber(1),
                        'time' => $faker->numberBetween(300, 900)
                    ]);
                }
            });
    }
}
