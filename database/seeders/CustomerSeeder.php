<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customers;
use App\Models\Machines;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customer = Customers::create([
            'name'      => 'APS Stock Machines',
            'syrinx'    => 'APS_STOCK'
        ]);
        Machines::create([
            'stock'     => '804/0123',
            'serial'    => 'LWJAZ140AN07300123',
            'make'      => 'LGMG',
            'model'     => 'AR14J',
            'yom'       => '2022',
            'customer'  => $customer->id,
        ]);
    }
}
