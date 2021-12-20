<?php

namespace App\Onion\Driver;

use Illuminate\Http\Request;

class LaravelRequest implements RequestInterface{

    public $request ;

    public $method ;

    public function __construct($request)
    {
        $this->request = $request;

        $this->method =  $request->method();

    }

    public function data(){
        return $this->request->all();
    }

}