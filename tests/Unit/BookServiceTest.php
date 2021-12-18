<?php

namespace Tests\Unit;

use App\Onion\Driver\BookElasticRepository;
use App\Onion\Driver\BookLaravelRepository;
use App\Onion\Service\BookService;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase as TestsTestCase;

class BookServiceTest extends TestsTestCase
{

    private $repository ;

    public function setUp() :void
    {
        $this->repository = new BookElasticRepository();
    }

    /**
     * 
     *
     * @return void
     */
    public function test_book_not_exist()
    {
        $rrr = (new BookService($this->repository))->exist(50);
        $this->assertTrue($rrr);
    }
}
