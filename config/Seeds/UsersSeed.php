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
                'name' => 'super_user',
                'username' => 'super',
                'password' => md5('test'),
                'email' => 'dishab16@gmail.com',
                'auth' => 9,
                'validity' => 0,
            ],
            [
                'id' => 2,
                'name' => 'Kamal Ishikawa',
                'username' => 'kamal',
                'password' => md5('kamal'),
                'email' => 'asahiservices2017@gmail.com',
                'auth' => 9,
                'validity' => 0,
            ]
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
