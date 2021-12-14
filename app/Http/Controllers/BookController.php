<?php

namespace App\Http\Controllers;

use App\Http\Requests\LendingBookRequest;
use App\Onion\Handler\BookIndexHandler;
use App\Onion\Handler\BookLentHandler;
use App\Onion\Service\BookLaravelRepository;
use App\Onion\UseCase\BookUseCase;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class BookController extends Controller
{
    //
    public function index(Request $request){
        return Response ((new BookIndexHandler(new BookUseCase(new BookLaravelRepository())))->handle($request));
    }

}
