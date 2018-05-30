<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
  public function index(){
    $users = User::paginate(5);

    return view('Users.index', compact('users'));
  }

  public function create(){
    return view('Users.create');
  }

  public function store(Request $request){
    $name     = $request->name;
    $email    = $request->email;
    $password = bcrypt($request->password);

    $request->validate([
      'name'      => 'required',
      'email'     => 'required',
      'password'  => 'required',
    ]);
    
    $elousers = User::create(['name' => $name, 'email' => $email, 'password' => $password]);
  }
}
