<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
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
                'name' => 'sam',
                'username' => 'sam',
                'password' => md5('test'),
                'email' => 'sam@sam.com',
                'auth' => 9,
                'validity' => 0,
            ],
            [
                'id' => 2,
                'name' => 'sam2',
                'username' => 'sam2',
                'password' => md5('test'),
                'email' => 'sam2@sam2.com',
                'auth' => 1,
                'validity' => 0,
            ],
            [
                'id' => 3,
                'name' => 'sam3',
                'username' => 'sam3',
                'password' => md5('test'),
                'email' => 'sam3@sam3.com',
                'auth' => 1,
                'validity' => 0,
            ]
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
