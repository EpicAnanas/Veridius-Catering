<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Bread;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $request->user()->authorizeRoles(['user', 'admin']);

      if(Auth::user()->roles->first()->name == 'admin'){
        // $blogposts = blog::orderByDesc("created_at")->paginate(7);
        $breads = Bread::All();
        $users = User::all();
        return view('admin', compact('users', 'breads'));
      }else{
        $breads = Bread::All();
        return view('home', compact('breads'));
      }
    }

    public function create()
    {
      return view('auth/create');
    }

    public function store(Request $request)
    {
      $validatedData = $request->validate([
        'name' => 'required|max:20',
        'email' => 'required|email',
      ]);

      $user = new  user();
      $user->name = $request['name'];
      $user->email = $request['email'];

      $user->save();

      return redirect('home');
    }

    public function show(User $user)
    {
      // return view('auth/show', compact('user'));
    }

    public function edit(user $user)
    {
      return view('auth/edit', compact('user'));
    }

    public function update(user $user)
    {
      $user->name = request('name');
      $user->email = request('email');

      $user->save();
      return redirect('user');
    }

    public function destroy(user $user)
    {
      $user->delete();
      return redirect('user');
    }
}
