<?php

namespace App\Onion\Driver;

use App\Models\lent_book;
use App\Models\Library;
use App\Models\User;
use App\Onion\Driver\UserRepositoryInterface;
use App\Onion\Entity\Book;

class UserElasticRepository implements UserRepositoryInterface{

    public function getById(int $id){
        return User::find($id);
    }

    public function lentBook($request){
        return ;
    }

    public function barrowBook($user_id , $book_id , $started_at , $day_of_loan) : bool
    {

        try{

            $lent_elequent = new lent_book;

            $lent_elequent->user_id = $user_id;
            $lent_elequent->book_id = $book_id;
            $lent_elequent->day_of_loan = $day_of_loan;
            $lent_elequent->started_at = $started_at;
    
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

    public function checkLibraryMemberExist($user_id){
        if(Library::where('user_id' , $user_id)->exist()){
            return true;
        }
        return false;

    }

    public function userBorrowedBook($user_id){
        $books = [];
        $borrowed_book = Library::where('user_id' , $user_id)->with('books')->get();
        foreach($borrowed_book as $item){
                $book = new Book();
                $book->name = $item->books->name;
                $book->publisher = $item->books->publisher;            
                $book->author = $item->books->author;
                array_push($books , $item);
        }
        return $books;
    }

}