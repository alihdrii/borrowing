<?php

namespace App\Providers;

use App\Onion\Driver\BookElasticRepository;
use App\Onion\Driver\BookLaravelRepository;
use App\Onion\Driver\UserLaravelRepository;
use App\Onion\Service\BookService;
use App\Onion\Service\BookServiceInterface;
use App\Onion\Service\UserService;
use App\Onion\UseCase\BookUseCase;
use App\Onion\UseCase\Interfaces\BookUseCaseInterface;
use App\Onion\UseCase\UserUseCase;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        // $this->app->bind('BookServiceInterface' , function($app){
        //     return new BookService(new BookLaravelRepository());
        // });
        // $this->app->bind(BookServiceInterface::class, BookService::class);


        $this->app->bind(BookUseCaseInterface::class, function ($app) {
            if (request()->has('repo')) 
                $repository = new BookLaravelRepository();
            else
                $repository = new BookElasticRepository();

            return new BookUseCase(new BookService(new $repository));
        });


        // $this->app->when(BookUseCase::class)
        //     ->needs(BookServiceInterface::class)
        //     ->give(function() {
        //         return new UserService(new UserLaravelRepository());
        // });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        
    }
}
