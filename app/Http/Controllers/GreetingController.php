<?php
 
namespace App\Http\Controllers;
 
use App\Models\User;
 
class GreetingController extends Controller{
    public functionindex
}
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        return view('user.profile', [
            'user' => User::findOrFail($id)
        ]);
    }
}
