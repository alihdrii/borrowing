<?php

namespace App\Http\Controllers;

use App\Onion\Handler\BookHandler;
use App\Onion\UseCase\Interfaces\BookUseCaseInterface;
use Illuminate\Http\Request;


class BookController extends Controller
{

    public function show(Request $request , BookUseCaseInterface $usecase){
        return Response ((new BookHandler($request , $usecase))->returnBook());
    }

}
