<?php

namespace Database\Seeders;

use App\Models\Customers;
use App\Models\Engineers;
use App\Models\Jobs;
use App\Models\Machines;
use App\Models\Status;
use App\Models\Visits;
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
            'short'         => 'ChrisR',
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
        $job1 = Jobs::create([
            'machine'       => $machine->id,
            'number'        => rand(10000, 99999),
            'fault'         => 'its proper broken!',
            'address'       => 'somewhere',
            'contactName'   => 'someone',
            'contactNo'     => '01480 891 251',
            'status'        => true,
            'status_1'      => $status_1[0]->id,
            'status_2'      => $status_2[0]->id,
            'status_3'      => $status_3[0]->id,
            'status_4'      => $status_4[0]->id,
        ]);
        $visit1A = Visits::create([
            'job'           => $job1->id,
            'engineer'      => null,
            'scheduled'     => null,
            'attended'      => null,
            'status'        => 1,
            'report'        => null,
            'outcome'       => 0,
        ]);
        $visit1B = Visits::create([
            'job'           => $job1->id,
            'engineer'      => $engineer->id,
            'scheduled'     => '2023-03-01 08:00:00', // year month day hr min sec
            'attended'      => now(),
            'status'        => 1,
            'report'        => 'Attended site, machine needs parts',
            'outcome'       => 1,
        ]);
        $job2 = Jobs::create([
            'machine'       => $machine->id,
            'number'        => rand(10000, 99999),
            'fault'         => 'its proper fixed!',
            'address'       => 'somewhere',
            'contactName'   => 'someone',
            'contactNo'     => '01480 891 251',
            'status'        => false,
            'status_1'      => $status_1[1]->id,
            'status_2'      => $status_2[1]->id,
            'status_3'      => $status_3[1]->id,
            'status_4'      => $status_4[1]->id,
        ]);
        $visit2A = Visits::create([
            'job'           => $job2->id,
            'engineer'      => null,
            'scheduled'     => null,
            'attended'      => null,
            'status'        => 1,
            'report'        => null,
            'outcome'       => 0,
        ]);
    }
}
