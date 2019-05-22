<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //

    public function index(){
    	$data = array(
    		'title' => 'Quiz Mainia | Home',
    	);
    	return view('pages.index')->with($data);
    }
}
