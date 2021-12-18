<?php 

namespace App\Onion\UseCase\Interfaces;

use App\Onion\Service\BookServiceInterface;
use Illuminate\Http\Request;

interface BookUseCaseInterface{
    
    public function show(BookServiceInterface $instance , Request $request);

}