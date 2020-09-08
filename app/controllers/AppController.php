<?php

namespace Controllers;



class AppController
{

    public function __construct()
    {

    }

    /**
     * @return array
     */
    public function index() : array
    {
        return [
            'title'   => 'My New Simple API',
            'version' => 1,
        ];
    }
}
