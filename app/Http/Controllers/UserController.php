<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\RedirectResponse;
use PHPUnit\TextUI\XmlConfiguration\RemoveBeStrictAboutResourceUsageDuringSmallTestsAttribute;

class UserController extends Controller
{
  public function index()
  {
    dump(User::all());
  }

  public function delete($id){

    $user = User::where('id', $id)->firstOrFail();

    $user->delete();
  }
  
  public function update($id, UserUpdateRequest $request): RedirectResponse
  {
    $validated = $request->validate();
    $user = User::where('id', $id)->firstOrFail();
    $user->email = $request->email ? $request->email : $user->email;
    $user->name = $request->name ? $request->name : $user->name;
    $user->password = $request->password ? $request->password : $user->password;
    $user->save();
    return redirect('/user');
  }

  public function store(UserCreateRequest $request): RedirectResponse
  {
    $validated = $request->validate();
    $user = new User([
      'email' => $request()->post('email', ''),
      'name' => $request()->post('name', ''),
      'password' => $request()->post('password', ''),
    ]);
    $user->save();

    return redirect('/user');
  }
  
}