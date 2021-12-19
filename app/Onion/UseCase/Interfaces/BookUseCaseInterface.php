<?php 

namespace App\Onion\UseCase\Interfaces;

use App\Onion\Service\BookServiceInterface;
use Illuminate\Http\Request;

interface BookUseCaseInterface{
    
    public function __construct(BookServiceInterface $service);
    
    public function __invoke();

}