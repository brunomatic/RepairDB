<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        factory(App\User::class)->create(['email' => 'user@mail.com']);

        factory(App\User::class,2)->create();

        factory(App\Client::class, 10)->create();

        $devices = factory(App\Device::class, 10)->create();

        foreach ($devices as $device){
            $device->jobs()->saveMany(
              factory(App\Job::class)->times(15)->make()
            );
        }

    }


}
