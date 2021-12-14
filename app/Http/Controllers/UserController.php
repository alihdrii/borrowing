<?php

namespace App\Http\Controllers;

use App\Http\Requests\LendingRequest;
use App\Onion\Handler\UserLentHandler;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class UserController extends Controller
{
    //

    // public function show(Request $request){
    //     return Response ((new BookLentHandler($request))->handle());
    // }

    public function lending(LendingRequest $request){
        return Response ((new UserLentHandler($request))->handle());
    }

}
