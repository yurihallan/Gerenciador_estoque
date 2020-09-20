<?php namespace App\Controllers;

class Helloworld extends BaseController{
    
    public function index(){
        echo '<h1>Hello world!</h1>';
    }

    
	public function hellopersonalizado($name){
        echo "<h1>Hello, $name!</h1>";
	}
}