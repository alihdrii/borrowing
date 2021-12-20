<?php 

namespace App\Onion\Handler;

use App\Onion\Driver\RequestInterface;
use App\Onion\Ioc;
use App\Onion\Service\BookServiceInterface;
use App\Onion\Service\UserServiceInterface;
use App\Onion\UseCase\BookUseCase;
use App\Onion\UseCase\BorrowBookUseCase;
use App\Onion\UseCase\GetBookListUseCase;
use App\Onion\UseCase\Interfaces\BookUseCaseInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class BookHandler{

    private $request;

    public function __construct()
    {
    }

    public function getBook(RequestInterface $request)
    {        
        $use_case = Ioc::resolve()->getBookListUseCaseDependency();
        return $use_case->handle($request);
    }

    public function borrowBook(RequestInterface $request)
    {
        $use_case = Ioc::resolve()->borrowBookUseCaseDependency();
        return $use_case->handle($request);        
    }

    public function returnBook(RequestInterface $request)
    {
        $use_case = Ioc::resolve()->returnBookUseCaseDependency();
        return $use_case();
    }


}