<?php

namespace App\Http\Controllers;

use App\Http\Requests\LendingRequest;
use App\Onion\Handler\UserHandler;
use Illuminate\Http\Response;

class UserController extends Controller
{

    public function lending(LendingRequest $request){

        return Response((new UserHandler($request))->borrowBook()); 

    }

}
