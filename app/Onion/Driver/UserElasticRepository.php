<?php

namespace App\Onion\Driver;

use App\Models\lent_book;
use App\Models\User;
use App\Onion\Driver\UserRepositoryInterface;

class UserElasticRepository implements UserRepositoryInterface{

    public function getById(int $id){
        return User::find($id);
    }

    public function lentBook($request){

        try{

            $lent_elequent = new lent_book;

            $lent_elequent->user_id = $request->user_id;
            $lent_elequent->book_id = $request->book_id;
            $lent_elequent->day_of_loan = $request->day_of_loan;
            $lent_elequent->started_at = $request->started_at;
    
            $lent_elequent->save();
            return true;
    
        } catch(\Exception $e){
            return false;
        }

    }

    public function userLentBook($user_id , $book_id){
        if(lent_book::where('user_id' , $user_id)->where('book_id' , $book_id)->exist()){
            return true;
        }
        return false;
    }

}