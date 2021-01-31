<?php 

namespace Catalog\Model;

use Engine\Model;

class User extends Model 
{

    public function getUserData()
    {

        $dataUsers = [
            ['id' => '1', 'email' => 'admin@admin.com',  'name' => 'Admin'],
            ['id' => '2', 'email' => 'admin@admin.com',  'name' => 'Admin'],
            ['id' => '2', 'email' => 'kea96@yandex.ru',  'name' => 'Eduard'],
            ['id' => '3', 'email' => 'ssl@yandex.ru',  'name' => 'Anton'],
            ['id' => '4', 'email' => 'http@yandex.ru', 'name' => 'Terminal'],
            ['id' => '5', 'email' => 'https@yandex.ru', 'name' => 'Server'],
            ['id' => '6', 'email' => 'udp@yandex.ru', 'name' => 'API'],
        ];

        foreach ($dataUsers as $key => $value) {
            $std[$key] = (object) $value;;
        }
        return $std;


    }

    
}