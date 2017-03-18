<?php
use Migrations\AbstractSeed;

/**
 * Areas seed.
 */
class AreasSeed extends AbstractSeed
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
                'prefecture' => 'Tokyo',
                'ward' => 'Ward1',
            ],
            [
                'id' => 2,
                'prefecture' => 'Tokyo',
                'ward' => 'Ward2',
            ],
            [
                'id' => 3,
                'prefecture' => 'Tokyo',
                'ward' => 'Ward3',
            ],
            [
                'id' => 4,
                'prefecture' => 'Osaka',
                'ward' => 'OWard1',
            ],
            [
                'id' => 5,
                'prefecture' => 'Osaka',
                'ward' => 'OWard2',
            ],
            [
                'id' => 6,
                'prefecture' => 'Niigata',
                'ward' => 'NWard1',
            ],
            [
                'id' => 7,
                'prefecture' => 'Niigata',
                'ward' => 'NWard2',
            ],
        ];

        $table = $this->table('areas');
        $table->insert($data)->save();
    }
}
