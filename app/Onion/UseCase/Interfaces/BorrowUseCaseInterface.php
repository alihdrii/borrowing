<?php 

namespace App\Onion\UseCase\Interfaces;

use App\Onion\Driver\RequestInterface;
use App\Onion\Service\BookServiceInterface;
use App\Onion\Service\UserServiceInterface;


interface BorrowUseCaseInterface{
    
    public function __construct( BookServiceInterface $b_s , UserServiceInterface $u_s);

    public function handle($req);


}