<?php

namespace Database\Seeders;

use App\Models\Customers;
use App\Models\Engineers;
use App\Models\Jobs;
use App\Models\Machines;
use App\Models\Status;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status_1 = Status::where('parent', 1)->orderBy('order', 'ASC')->get();
        $status_2 = Status::where('parent', 2)->orderBy('order', 'ASC')->get();
        $status_3 = Status::where('parent', 3)->orderBy('order', 'ASC')->get();
        $status_4 = Status::where('parent', 4)->orderBy('order', 'ASC')->get();
        
        $engineer = Engineers::create([
            'name'          => 'Chris Rowell',
            'email'         => 'c.j.rowell@sky.com',
            'mobile'        => '07508 448 120',
            'invoice'       => 'APS',
            'Shipping'      => 'APS',
        ]);
        $customer = Customers::create([
            'name'          => 'APS Stock Machine',
            'syrinx'        => 'APSSTOCK',
        ]);
        $machine = Machines::create([
            'stock'         => '804/0001',
            'serial'        => 'LWJAZ140AN0730012',
            'make'          => 'LGMG',
            'model'         => 'AR14J',
            'yom'           => '2023',
            'customer'      => $customer->id,
        ]);
        $job = Jobs::create([
            'machine'       => $machine->id,
            'number'        => rand(10000, 99999),
            'fault'         => 'its proper broken!',
            'address'       => 'somewhere',
            'contactName'   => 'someone',
            'contactNo'     => '01480 891 251',
            'engineer'      => $engineer->id,
            'status'        => true,
            'status_1'      => $status_1[0]->id,
            'status_2'      => $status_2[0]->id,
            'status_3'      => $status_3[0]->id,
            'status_4'      => $status_4[0]->id,
        ]);
        $job = Jobs::create([
            'machine'       => $machine->id,
            'number'        => rand(10000, 99999),
            'fault'         => 'its proper fixed!',
            'address'       => 'somewhere',
            'contactName'   => 'someone',
            'contactNo'     => '01480 891 251',
            'engineer'      => $engineer->id,
            'status'        => false,
            'status_1'      => $status_1[1]->id,
            'status_2'      => $status_2[1]->id,
            'status_3'      => $status_3[1]->id,
            'status_4'      => $status_4[1]->id,
        ]);
    }
}
