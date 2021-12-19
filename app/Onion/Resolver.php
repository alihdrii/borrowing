<?php 

namespace App\Onion ;

use Illuminate\Http\Request;

class Resolver{

    private $request;

    private $identify;

    private $header_value;

    private $query_param_value;

    private $body_value;

    private $method;

    public function __construct(Request $request )
    {
        $this->request = $request;
    }

    public function identifyBy($identify){
        $this->identify = $identify ;         
    }

    public function param($param){
        $this->param = $param ;         
    }

    public function value($value){
        $this->value = $value ;
    }

    public function selectedRepo($repo){
        $this->repo = $repo;
    }

    public function handler()
    {
       
    }

}
