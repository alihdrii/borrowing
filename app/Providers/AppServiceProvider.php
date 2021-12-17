<?php

namespace App\Providers;

use App\Onion\Driver\BookLaravelRepository;
use App\Onion\Service\BookService;
use App\Onion\Service\BookServiceInterface;
use App\Onion\UseCase\BookUseCase;
use App\Onion\UseCase\Interfaces\BookUseCaseInterface;
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

        // $this->app->when(BookController::class)
        //     ->needs(BookServiceInterface::class)
        //     ->give(function() {
        //         return new BookService(new BookLaravelRepository());
        // });

        $this->app->bind(BookUseCaseInterface::class, function ($app) {
            return new BookUseCase(new BookService(new BookLaravelRepository()));
        });
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
