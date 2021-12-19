<?php 

namespace App\Onion\UseCase;

use App\Onion\Driver\BookRepositoryInterface;
use App\Onion\Service\BookServiceInterface;
use App\Onion\Service\UserServiceInterface;
use App\Onion\UseCase\Interfaces\BookUseCaseInterface;
use Illuminate\Http\Request;

class getBookListUseCase implements BookUseCaseInterface{

    private $service;
    
    public function __construct(BookServiceInterface $service)
    {
        $this->service = $service;
    }

    public function __invoke()
    {

        if($this->service->exist(40)){
            return $this->service->show(15);
        }
 
    }

}