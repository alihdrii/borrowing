<?php 

namespace App\Onion\Handler;

// use App\Onion\Service\BookElasticRepository;
use App\Onion\Service\UserLaravelRepository;
use App\Onion\UseCase\UserUseCase;

// use Onion\UseCase\BookUseCaseInterface;

class UserLentHandler{

    private $request;
    private $repository;

    public function __construct($request)
    {
        $this->request = $request;
        $this->prepareDependency();                
    }

    public function handle(){
        return (new UserUseCase($this->repository))->lentBook($this->request);
    }

    public function prepareDependency(){
        $this->repository = $this->getRepo($this->request->header('REPO'));
    }

    private function getRepo($repo){

        switch ($repo){           
            case 'elequent':
                return new UserLaravelRepository();
            // case 'elastic':
            //     return new BookElasticRepository();
            default : 
                return new UserLaravelRepository();
        }
    }    

}