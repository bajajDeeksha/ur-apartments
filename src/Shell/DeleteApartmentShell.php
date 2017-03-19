<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Shell;

use Cake\Console\Shell;

/**
 * Simple console wrapper around Psy\Shell.
 */
class DeleteApartmentShell extends Shell
{

    /**
     * Start the shell and interactive console.
     *
     * @return int|null
     */
    public function main()
    {
        $this->loadModel('Apartments');
        $this->loadModel('Users');
        //$this->Apartments->deleteAll(['Apartments.created <' => date('Y-m-d', strtotime('-13 days'))]);
        $this->Users->deleteAll([date('Y-m-d', strtotime('Users.created')).'<' => date('Y-m-d', strtotime('-'. 'Users.validity' . ' days')), 'Users.auth' => 0]);

//        $users = $this->Users->find()->where(['Users.auth' => 0]);
//        foreach ($users as $user){
//            var_dump($user->created); //var_dump($user->validity);
//            if ($user->created < date('Y-m-d', strtotime('-'. (int)$user->validity . ' days'))){
//                $this->Users->delete($user);
//            }
//        }
        //$users = $this->Users->find()->where(['Users.created <' => date('Y-m-d', strtotime('-'. 'Users.validity' . ' days'))])->toArray();

    }
}
