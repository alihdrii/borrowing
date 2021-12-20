<?php

namespace App\Http\Controllers;

use App\Http\Requests\BoookShowRequest;
use App\Onion\Driver\LaravelRequest;
use App\Onion\Handler\BookHandler;
use App\Onion\UseCase\Interfaces\BookUseCaseInterface;
use Illuminate\Http\Request;


class BookController extends Controller
{

    public function show(BoookShowRequest $request){
        
        return Response()->json((new BookHandler())->getBook(new LaravelRequest($request)));
    }

    public function borrow(Request $request){
        return Response ((new BookHandler($request))->borrowBook(new LaravelRequest($request)));
    }

    public function return(Request $request){
        return Response ((new BookHandler($request))->returnBook(new LaravelRequest($request)));
    }

}
