<?php

class Ratings_seeder {

	public function run($model, $limit=1000)
	{
		$this->model = $model;

		// Uncomment the below to wipe the table clean before populating
		$this->model->truncate();
		
		// Uncomment the below to wipe the table clean before populating
		$this->model->truncate();

		$data = array();

		for ($i = 1; $i <= $limit; $i++) {
			$data[] = array(
				'artifact_id' => mt_rand(1, 51),
				'rating' => mt_rand(1, 10),
				'status' => 1,
				/**
				 * Why? Because 
				 * (string) DB::raw('INET_ATON(\'' . long2ip(mt_rand(0, 4294967295)) . '\')'),
				 * didn't work for me. Oh, why not just use 
				 * mt_rand(0, 4294967295)? Because I am crazy!
				 */
				'ip_address' => ip2long(long2ip(mt_rand(0, 4294967295))),
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			);
		}

		// Uncomment the below to run the seeder
		$this->model->insert($data);
	}

}
