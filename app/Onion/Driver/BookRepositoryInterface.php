<?php 

namespace App\Onion\Driver;

interface BookRepositoryInterface{


    public function getAll();

    public function get(int $id);

    public function getById(int $id);

    public function lentBook($request);
    
    public function checkLentBookByUserId($request);

}