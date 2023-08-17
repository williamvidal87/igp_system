<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
			[

				'status' 			=> 'Available',
			],
			[
				'status' 			=> 'Not Available',
			],
			[
				'status' 			=> 'Under Maintenance',
			],
			[
				'status' 			=> 'Defective',
			],
			[
				'status' 			=> 'Recieved',
			],
			[
				'status' 			=> 'Pending',
			],
			[
				'status' 			=> 'Cancelled',
			],
            
        ];
        
        
        Status::insert($statuses);
    }
}
