<?php
/**
 * Created by PhpStorm.
 * User: sam
 * Date: 16/12/12
 * Time: 17:06
 */

namespace App\Auth;

use Cake\Auth\AbstractPasswordHasher;

class LegacyPasswordHasher extends AbstractPasswordHasher
{

    public function hash($password)
    {
        return md5($password);
    }

    public function check($password, $hashedPassword)
    {
        return md5($password) === $hashedPassword;
    }
}