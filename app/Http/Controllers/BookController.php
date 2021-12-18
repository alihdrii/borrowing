<?php

namespace App\Http\Controllers;

use App\Http\Requests\BoookShowRequest;
use App\Onion\Handler\BookHandler;
use App\Onion\UseCase\Interfaces\BookUseCaseInterface;
use Illuminate\Http\Request;


class BookController extends Controller
{

    public function show(BoookShowRequest $request){
        return Response()->json((new BookHandler($request))->returnBook());
    }

    public function borrow(Request $request){
        return Response ((new BookHandler($request))->borrowBook());
    }

}
