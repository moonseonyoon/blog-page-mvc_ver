<?php

// Parent Class
class Manager
{
    // similar to private but this function can be accessed to any child classes 
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=blogScott;charset=utf8', 'root', 'root');
        return $db;
    }
}
