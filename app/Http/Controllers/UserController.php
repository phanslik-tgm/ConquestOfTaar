<?php
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
  public function getDashboard()
  {
    return view('dashboard');
  }

  public function postSignUp(Request $request)
  {
    $this->validate($request,[
      'email' => 'required|email|unique:users',
      'username' => 'required|max:120',
      'first_name' => 'required|max:120',
      'last_name' => 'required|max:120',
      'password' => 'required|max:4'
    ]);

    $email = $request['email'];
    $username = $request['username'];
    $first_name = $request['first_name'];
    $last_name = $request['last_name'];
    $password =bcrypt($request['password']);

    $user = new User();
    $user->email = $email;
    $user->username = $username;
    $user->first_name = $first_name;
    $user->last_name = $last_name;
    $user->password = $password;

    $user->save();
    Auth::login($user);

    return redirect()->route('dashboard');

  }

  public function postSignIn(Request $request)
  {
    $this->validate($request,[
      'email' => 'required',
      'password' => 'required'
    ]);

    if(Auth::attempt(['email'=>$request['email'],'password'=>$request['password']]))
    {
      return redirect()->route('dashboard');
    }
    return redirect()->back();

  }
}



 ?>
