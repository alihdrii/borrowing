<?php 

namespace App\Onion\UseCase\Interfaces;

interface BookUseCaseInterface{
    
    public function index();
    public function show($book_id);

}