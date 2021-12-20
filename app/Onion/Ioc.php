<?php 

namespace App\Onion ;

use App\Onion\Driver\BookElasticRepository;
use App\Onion\Driver\BookLaravelRepository;
use App\Onion\Driver\RequestInterface;
use App\Onion\Driver\UserElasticRepository;
use App\Onion\Driver\UserLaravelRepository;
use App\Onion\Service\BookService;
use App\Onion\Service\UserService;
use App\Onion\UseCase\BorrowBookUseCase;
use App\Onion\UseCase\GetBookListUseCase;
use App\Onion\UseCase\ReturnBorrowedBookUseCase;

class Ioc{


    protected static $instance = null;

    public static function resolve() {
        if (is_null(self::$instance)) {
            self::$instance = new Ioc();
        }
        return self::$instance;
    }

    public function getBookListUseCaseDependency()
    {

        $book_service_repo = ($_SERVER['REQUEST_METHOD'] == 'get') ? new BookLaravelRepository() : new BookElasticRepository();
        return
            new GetBookListUseCase(
                new BookService($book_service_repo)
            );
    }

    public function borrowBookUseCaseDependency(){

        $book_service_repo = ($_SERVER['REQUEST_METHOD'] == 'post') ? new BookLaravelRepository() : new BookElasticRepository(); 
        $user_service_repo = ($_SERVER['REQUEST_METHOD'] == 'post') ? new UserLaravelRepository() : new UserElasticRepository();         
        return 
            new BorrowBookUseCase(
                new BookService($book_service_repo),
                new UserService($user_service_repo),
            );
    }

    // public function returnBookUseCaseDependency($request){
    //     $book_service_repo = ($_SERVER['REQUEST_METHOD'] == 'post') ? new BookLaravelRepository() : new BookElasticRepository(); 
    //     $user_service_repo = ($_SERVER['REQUEST_METHOD'] == 'post') ? new UserLaravelRepository() : new UserElasticRepository();         
        
    //     return 
    //         new ReturnBorrowedBookUseCase(
    //             new BookService($book_service_repo),
    //             new UserService($user_service_repo),
    //             $request->book_id,
    //             $request->user_id,
    //         );
    // }
}
