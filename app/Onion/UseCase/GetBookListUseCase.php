<?php 

namespace App\Onion\UseCase;

use App\Onion\Driver\RequestInterface;
use App\Onion\Service\BookServiceInterface;
use App\Onion\UseCase\Interfaces\GetBookListUseCaseInterface;

class GetBookListUseCase implements GetBookListUseCaseInterface{

    private $service;
    
    public function __construct(BookServiceInterface $service)
    {
        $this->service = $service;
    }

    public function handle($request)
    {

        $req_data = $request->data();
        if($this->service->exist($req_data['book_id'])){
            return $this->service->show($req_data['book_id']);
        }
 
    }

}