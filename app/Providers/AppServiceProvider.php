<?php

namespace App\Providers;

use App\Onion\Driver\BookElasticRepository;
use App\Onion\Driver\BookLaravelRepository;
use App\Onion\Driver\UserElasticRepository;
use App\Onion\Driver\UserLaravelRepository;
use App\Onion\Service\BookService;
use App\Onion\Service\BookServiceInterface;
use App\Onion\Service\UserServiceInterface;
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

        $this->app->bind(BookServiceInterface::class, function ($app) {
            if (request()->has('repo')) 
                $repository = new BookLaravelRepository();
            else
                $repository = new BookElasticRepository();

            return new BookService(new $repository);
        });

        $this->app->bind(UserServiceInterface::class, function ($app) {
            if (request()->has('repo')) 
                $repository = new UserLaravelRepository();
            else
                $repository = new UserElasticRepository();

            return new UserService(new $repository);
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
