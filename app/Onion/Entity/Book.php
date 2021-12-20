<?php

namespace App\Onion\Entity;

class Book{

    private $id;
    private $name;
    private $author;
    private $publisher;
    private $published_at;
    private $rate;
    private $isbn;

    public function body() :array
    {
        return [
            $this->id,
            $this->name,
            $this->author,
            $this->publisher,
            $this->published_at,
            $this->rate,
            $this->isbn
        ];
    }

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;        
    }

    public function getAuthor(){
        return $this->author;                
    }

    public function getPublisher(){
        return $this->publisher;
    }

    public function getIsnb(){
        return $this->isbn;                
    }

    public function getRate(){
        return $this->rate;
    }

    public function getPublishedAt(){
        return $this->published_at;                
    }

    public function setId(int $id){
        $this->id = $id;        
    }

    public function setName(string $name){
        $this->name = $name;                
    }

    public function setAuthor(string $author){
        $this->author = $author;    
    }

    public function setPublisher(string $publisher){
        $this->publisher = $publisher;
    }

    public function setIsnb(string $isbn){
        $this->isbn = $isbn;
    }

    public function setRate($rate){
        $this->rate = $rate;
    }

    public function setPublishedAt($date){
        $this->published_at = $date;
    }


}