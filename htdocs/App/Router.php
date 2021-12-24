<?php
namespace App;

class Router{
    public array $routes=[];
    public array $addressArray=[];

    public function __construct($get){

        if (count($get)==1){

            $key=key($get);
            $ltrimKey=ltrim($key,"/");
            $this->addressArray=explode("/",$ltrimKey);
        }else{
            $this->addressArray=["home","index"];
        }

    }

    public function dispatch(){

        if(!isset($this->routes[$this->addressArray[0]])){

            view("404");
            die();
        }else {

            $controllerName = $this->routes[$this->addressArray[0]];
        }

        $className="App\Controllers\\".$controllerName;

        if (isset($this->addressArray[1])) {

            if (file_exists("App\Views\\" . $this->addressArray[0] . "/" . $this->addressArray[1] . ".php")) {

                $methodName = $this->addressArray[1];
            } else {

                view("404");
                die();
            }
        }else{
            view("404");
            die();
        }

        if (isset($this->addressArray[2]) && is_numeric($this->addressArray[2])){
            $id=$this->addressArray[2];
        }else{
            $id=null;
        }

        include ($className.".php");
        $obj=new $className();
        $obj->$methodName($id);
    }
}