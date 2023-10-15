<?php

use Illuminate\Database\Seeder;
use App\Customer;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Customer::create([
            'name' => 'customer',
            'email' => 'customer5@customer.com',
            'password' => bcrypt('1234'),
            'nationality' => 'Egyptian',
            'address' => 'egypt cairo',
            'picture' => 'image-profile.jpeg',
        ]);
    }
}


