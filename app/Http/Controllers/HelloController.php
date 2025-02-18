<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index(){
        // $products = Product::all();
        $numbers = [1,2,3,4];
        $sum = 0;
        foreach($numbers as $n){
            $sum += $n;
        }

        return view("hello",compact("sum","numbers"));
    }
}
