<?php 

namespace App\Onion\UseCase\Interfaces;

use App\Onion\Driver\RequestInterface;
use App\Onion\Service\BookServiceInterface;
use Illuminate\Http\Request;

interface GetBookListUseCaseInterface{
    
    public function __construct(BookServiceInterface $service);
    
    public function handle(array $req);

}