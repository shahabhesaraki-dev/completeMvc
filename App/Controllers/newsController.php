<?php
namespace App\Controllers;

class newsController{

    public function show($id){

        view("/news/show");
    }

    public function index(){

        view("/news/index");
    }

    public function create(){

        view("/news/create");
    }
}