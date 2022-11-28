<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class NavigationController extends Controller
{

    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function index(){
        $data = [
           ['name'=> 'home','slug' => 'home'],
           ['name'=> 'about','slug' => 'about'],
           ['name'=> 'events','slug' => 'events'],
           ['name'=> 'donate','slug' => 'donate'],
           ['name'=> 'contact','slug' => 'contact']
        ];

        $title = "Navigation";

        return  view('home');
    }
}
