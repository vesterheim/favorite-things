<?php

class Thumbnails_seeder {

	public function run($model)
	{
		$this->model = $model;

		// Uncomment the below to wipe the table clean before populating
		$this->model->truncate();

		$data = array(
			array(
				'artifact_id' => 1,
				'image' => '1968.025.001-ft.jpg'
			),
			array(
				'artifact_id' => 2,
				'image' => 'lc4300-front-thumbnail.jpg'
			),
			array(
				'artifact_id' => 3,
				'image' => '1968.034.002-ft.jpg'
			),
			array(
				'artifact_id' => 4,
				'image' => '1970.006.001-ft.jpg'
			),
			array(
				'artifact_id' => 5,
				'image' => '1971.013.001-thumbnail-ft.jpg'
			),
			array(
				'artifact_id' => 6,
				'image' => '1972.003.017-ft.jpg'
			),
			array(
				'artifact_id' => 7,
				'image' => '1976.083.013-ft.jpg'
			),
			array(
				'artifact_id' => 8,
				'image' => '1977.058.013-ft.jpg'
			),
			array(
				'artifact_id' => 9,
				'image' => '1977.058.027-ft.jpg'
			),
			array(
				'artifact_id' => 10,
				'image' => '1980.080.002-thumbnail-ft.jpg'
			),
			array(
				'artifact_id' => 11,
				'image' => '1980.097.001-ft.jpg'
			),
			array(
				'artifact_id' => 12,
				'image' => '1981.134.001-ft.jpg'
			),
			array(
				'artifact_id' => 13,
				'image' => '1982.040.001-ft.jpg'
			),
			array(
				'artifact_id' => 14,
				'image' => '1984.035.001-ft.jpg'
			),
			array(
				'artifact_id' => 15,
				'image' => '1984.056.008-ft.jpg'
			),
			array(
				'artifact_id' => 16,
				'image' => '1984.061.004-rgb-copy.jpg'
			),
			array(
				'artifact_id' => 17,
				'image' => '1985.097.002-ft.jpg'
			),
			array(
				'artifact_id' => 18,
				'image' => '1985.101.029-ft.jpg'
			),
			array(
				'artifact_id' => 19,
				'image' => '1986.077.001-thumbnail-ft.jpg'
			),
			array(
				'artifact_id' => 20,
				'image' => '1986.093.006-ft.jpg'
			),
			array(
				'artifact_id' => 21,
				'image' => '1987.009.001-thumbnail-ft.jpg'
			),
			array(
				'artifact_id' => 22,
				'image' => '1987.009.003-ft.jpg'
			),
			array(
				'artifact_id' => 23,
				'image' => '1987.039.001-ft.jpg'
			),
			array(
				'artifact_id' => 24,
				'image' => '1987.160.001-ft.jpg'
			),
			array(
				'artifact_id' => 25,
				'image' => '1989.067.002.14-ft.jpg'
			),
			array(
				'artifact_id' => 26,
				'image' => '1991.010.001-thumbnail-ft.jpg'
			),
			array(
				'artifact_id' => 27,
				'image' => '1992.079.001-thumbnail-ft.jpg'
			),
			array(
				'artifact_id' => 28,
				'image' => '1995.018.004-ft.jpg'
			),
			array(
				'artifact_id' => 29,
				'image' => '1995.031.001-ft.jpg'
			),
			array(
				'artifact_id' => 30,
				'image' => '1996.016.001.jpg'
			),
			array(
				'artifact_id' => 31,
				'image' => '1997.001.001.jpg'
			),
			array(
				'artifact_id' => 32,
				'image' => '1997.070.001-ft.jpg'
			),
			array(
				'artifact_id' => 33,
				'image' => '1997.082.001-ft.jpg'
			),
			array(
				'artifact_id' => 34,
				'image' => '1998.080.007-ft.jpg'
			),
			array(
				'artifact_id' => 35,
				'image' => '2000.028.013-thumbnail-ft.jpg'
			),	
			array(
				'artifact_id' => 36,
				'image' => '2000.002.001-ft.jpg'
			),
			array(
				'artifact_id' => 37,
				'image' => '2003.042.001-thumbnail-ft.jpg'
			),
			array(
				'artifact_id' => 38,
				'image' => '2004.061.001-thumbnail-ft.jpg'
			),
			array(
				'artifact_id' => 39,
				'image' => '2008.004.002.jpg'
			),
			array(
				'artifact_id' => 40,
				'image' => '2010.012.001-thumbnail.jpg'
			), 
			array(
				'artifact_id' => 41,
				'image' => '2012.030.001-ft.jpg'
			),
			array(
				'artifact_id' => 42,
				'image' => '2012.041.001-thumbnail-ft.jpg'
			),
			array(
				'artifact_id' => 43,
				'image' => 'lc0120-thumbnail.jpg'
			),
			array(
				'artifact_id' => 44,
				'image' => 'lc1213-ft.jpg'
			),
			array(
				'artifact_id' => 45,
				'image' => 'lc1284-exterior-ft.jpg'
			),
			array(
				'artifact_id' => 46,
				'image' => 'lc1665-ft.jpg'
			),
			array(
				'artifact_id' => 47,
				'image' => 'lc1745-thumbnail-ft.jpg'
			),
			array(
				'artifact_id' => 48,
				'image' => 'lc4293-thumbnail-ft.jpg'
			),
			array(
				'artifact_id' => 49,
				'image' => 'lc5632-ft.jpg'
			),
			array(
				'artifact_id' => 50,
				'image' => 'lc7465-front-thumbnail.jpg'
			)
		);

		// Uncomment the below to run the seeder
		$this->model->insert($data, TRUE);
	}

}