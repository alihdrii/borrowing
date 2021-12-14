<?php

namespace App\Http\Controllers;

use App\Onion\Handler\BookIndexHandler;
use App\Onion\Handler\BookLentHandler;
use App\Onion\Service\BookLaravelRepository;
use App\Onion\UseCase\BookService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class BookController extends Controller
{
    //
    public function index(Request $request){
        // return Response((new BookIndexHandler(new BookService(new BookLaravelRepository())))->handle($request));
        return Response ((new BookIndexHandler(new BookService(new BookLaravelRepository())))->handle($request));
    }

    public function lendingBook(Request $request){
        return Response ((new BookLentHandler(new BookService(new BookLaravelRepository())))->handle($request));
    }
}
