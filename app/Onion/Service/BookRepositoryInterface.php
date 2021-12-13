<?php 

namespace App\Onion\Service;

interface BookRepositoryInterface{

    public function getAll();
    public function get(int $id);
    // public function ($request);

}