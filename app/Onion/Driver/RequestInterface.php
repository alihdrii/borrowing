<?php

namespace App\Onion\Driver;

interface RequestInterface {

    public function __construct($requset);

    public function data();

}