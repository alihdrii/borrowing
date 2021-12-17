<?php

namespace App\Onion\Service;

interface BookServiceInterface {

    public function show(int $book_id);

    public function exist(int $book_id);

}