<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class ApartmentsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'name' => 'Blank',
                'area_id' => 1,
                'address' => 'Komatsugawa, 2-6-4',
                'floor' => 11,
                'size' => 55,
                'model_plan' => 4,
                'rent' => 120000,
                'service_fee' => 5000,
                'facilities' => '1,2,3',
                'traffic' => 'something about traffic',
                'remarks' => 'some remark',
                'famous_area' => 1,
                'image1' => 'xyz.jpg',
            ],
            [
                'id' => 2,
                'name' => 'id 2 house',
                'area_id' => 7,
                'address' => 'Nishi-kasai, 5-8-5',
                'floor' => 11,
                'size' => 55,
                'model_plan' => 4,
                'rent' => 120000,
                'service_fee' => 5000,
                'facilities' => '1,2,3',
                'traffic' => 'something about traffic',
                'remarks' => 'some remark',
                'famous_area' => 2,
                'image1' => 'xyz.jpg',
            ],
            [
                'id' => 3,
                'name' => 'id 3 house',
                'area_id' => 8,
                'address' => 'Komatsugawa, 1-5-14',
                'floor' => 11,
                'size' => 55,
                'model_plan' => 5,
                'rent' => 120000,
                'service_fee' => 5000,
                'facilities' => '1,2,3',
                'traffic' => 'something about traffic',
                'remarks' => 'some remark',
                'famous_area' => 1,
                'image1' => 'xyz.jpg',
            ],
            [
                'id' => 4,
                'name' => 'id 4 house',
                'area_id' => 7,
                'address' => 'Nishi-kasai, 1-8-5',
                'floor' => 11,
                'size' => 55,
                'model_plan' => 5,
                'rent' => 120000,
                'service_fee' => 5000,
                'facilities' => '1,3',
                'traffic' => 'something about traffic',
                'remarks' => 'some remark',
                'famous_area' => 2,
                'image1' => 'xyz.jpg',
            ]
        ];

        $table = $this->table('apartments');
        $table->insert($data)->save();
    }
}
