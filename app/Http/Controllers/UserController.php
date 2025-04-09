<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{

    public function index(){

    $Usuario = new Usuario[
        'email' => 'testando@gmail.com',
        'name' => 'Testildo',
        'password' => '123',];
    $Usuario->save();
    
    dump(Usuario::all());

    
      
 }
    public function destroy($id){

        $Usuario = Usuario::where('id', $id)->firstOrFail();

        $Usuario->delete();

     

    }

    
    public function update($id)
  {
    $Usuario = Idea::where('id', $id)->firstOrFail();
    $Usuario->email = request()->get('email', '');
    $Usuario->name = request()->get('name', '');
    $Usuario->password = request()->get('password', '');
    $Usuario->save();

  }

}