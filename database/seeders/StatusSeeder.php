<?php

namespace Database\Seeders;

use App\Models\Status;

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status_0A = Status::create([
            'parent'        => '0',
            'name'          => 'Jobsheet',
            'description'   => 'status of jobsheet reciept',
            'order'         => 0,
            'colour'        => 'info',
        ]);
        $status_0C = Status::create([
            'parent'        => '0',
            'name'          => 'Photos',
            'description'   => 'status of photo reciept',
            'order'         => 0,
            'colour'        => 'info',
        ]);
        $status_0B = Status::create([
            'parent'        => '0',
            'name'          => 'Incoming Invoice',
            'description'   => 'status of invoice reciept',
            'order'         => 1,
            'colour'        => 'info',
        ]);
        $status_0D = Status::create([
            'parent'        => '0',
            'name'          => 'Outgoing Invoice',
            'description'   => 'status of APS invoice or Warranty claim',
            'order'         => 0,
            'colour'        => 'info',
        ]);
        Status::create([ // Jobsheet
            'parent'        => $status_0A->id,
            'name'          => 'Pending',
            'description'   => 'job sheet has not yet been recieved',
            'order'         => 0,
            'colour'        => 'info',
        ]);
        Status::create([
            'parent'        => $status_0A->id,
            'name'          => 'Recieved',
            'description'   => 'job sheet has been recieved',
            'order'         => 1,
            'colour'        => 'success',
        ]);
        Status::create([
            'parent'        => $status_0A->id,
            'name'          => 'Overdue',
            'description'   => 'job sheet has been requested and is now overdue',
            'order'         => 2,
            'colour'        => 'danger',
        ]);
        Status::create([ // Incoming Invoice
            'parent'        => $status_0B->id,
            'name'          => 'Pending',
            'description'   => 'invoice has not yet been recieved',
            'order'         => 0,
            'colour'        => 'info',
        ]);
        Status::create([
            'parent'        => $status_0B->id,
            'name'          => 'Recieved',
            'description'   => 'invoice has been recieved',
            'order'         => 1,
            'colour'        => 'success',
        ]);
        Status::create([
            'parent'        => $status_0B->id,
            'name'          => 'Overdue',
            'description'   => 'invoice has been requested and is now overdue',
            'order'         => 2,
            'colour'        => 'danger',
        ]);
        Status::create([
            'parent'        => $status_0B->id,
            'name'          => 'N/A',
            'description'   => 'invoice has is not required',
            'order'         => 3,
            'colour'        => 'success',
        ]);
        Status::create([ // Photos
            'parent'        => $status_0C->id,
            'name'          => 'Pending',
            'description'   => 'Photos has not yet been recieved',
            'order'         => 0,
            'colour'        => 'info',
        ]);
        Status::create([
            'parent'        => $status_0C->id,
            'name'          => 'Recieved',
            'description'   => 'Photos has been recieved',
            'order'         => 1,
            'colour'        => 'success',
        ]);
        Status::create([
            'parent'        => $status_0C->id,
            'name'          => 'Overdue',
            'description'   => 'Photos has been requested and are now overdue',
            'order'         => 2,
            'colour'        => 'danger',
        ]);
        Status::create([ // Outgoing invoice
            'parent'        => $status_0D->id,
            'name'          => 'Pending',
            'description'   => 'Chargeable invoice or warranty claim has not yet been sent',
            'order'         => 0,
            'colour'        => 'info',
        ]);
        Status::create([
            'parent'        => $status_0D->id,
            'name'          => 'Sent',
            'description'   => 'Chargeable invoice or warranty claim has been sent',
            'order'         => 1,
            'colour'        => 'success',
        ]); 
    }
}
