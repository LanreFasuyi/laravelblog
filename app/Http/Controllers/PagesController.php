<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index (){
        $title= 'My anme is ';

        return view('pages.index')->with('title', $title);
    }

    public function about(){
        $title= 'I am the about Page';
        return view('pages.about')->with('title', $title);
    }

    public function services(){
        $data = array(
            'title'=> 'Services',
            'services'=>['web design', 'Programming', 'SEO']
        );
        return view('pages.services')->with($data);
    }
}