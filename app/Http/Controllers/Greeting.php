<?php
 
namespace App\Http\Controllers;
 
use App\Models\User;
 
class GreetingController extends Controller{
    public function index() {
        $name = 'EVA';
        $name = 'DWI';
        return view('greeting', [
            'name' => $name
        ]);
    }
}

