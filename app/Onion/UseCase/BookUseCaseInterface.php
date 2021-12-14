<?php 

namespace App\Onion\UseCase;

interface BookUseCaseInterface{
    
    public function index();
    public function show($book_id);

}