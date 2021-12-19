<?php 

namespace App\Onion\Handler;

use App\Onion\Service\BookServiceInterface;
use App\Onion\Service\UserServiceInterface;
use App\Onion\UseCase\BookUseCase;
use App\Onion\UseCase\Interfaces\BookUseCaseInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class BookHandler{

    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function returnBook()
    {
        // $book_service = App::make(BookServiceInterface::class);
        return (new BookUseCase())->show($book_service , $this->request);
    }

    public function borrowBook(){
        $book_service = App::make(BookServiceInterface::class);
        $user_service = App::make(UserServiceInterface::class);

        return (new BookUseCase())->borrow($book_service , $user_service);
    }

}