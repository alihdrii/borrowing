<?php 

namespace App\Onion\Handler;

use App\Onion\Service\BookServiceInterface;
use App\Onion\UseCase\BookUseCase;
use App\Onion\UseCase\Interfaces\BookUseCaseInterface;

class BookHandler{

    private $use_case;
    private $request;

    public function __construct($request , BookUseCaseInterface $use_case)
    {
        $this->use_case = $use_case;
        $this->request = $request;
    }

    public function returnBook(){
        // dd($this->use_case);
        return ($this->use_case)->show();
        // return ((new BookUseCase())->show());
    }

}