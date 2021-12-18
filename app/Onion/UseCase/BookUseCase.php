<?php 

namespace App\Onion\UseCase;

use App\Onion\Driver\BookRepositoryInterface;
use App\Onion\Service\BookServiceInterface;
use App\Onion\Service\UserServiceInterface;
use App\Onion\UseCase\Interfaces\BookUseCaseInterface;
use Illuminate\Http\Request;

class BookUseCase implements BookUseCaseInterface{

    private $request;
    
    // public function __construct(BookServiceInterface $service)
    // {
    //     $this->request = $request;
    // }

    public function index(){
        return ;
    }

    public function show(BookServiceInterface $service , Request $request){

        if($service->exist($request->book_id)){
            return $service->show($request->book_id);
        }
 
    }

    public function borrow(BookServiceInterface $book_service , UserServiceInterface $user_service)
    {

        return 'borrow book use case';
        if($book_service->exist(150) && $user_service->exist(12)){
            $book_service->borrow();  
        }
        
    }

}