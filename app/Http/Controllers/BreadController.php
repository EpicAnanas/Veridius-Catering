<?php

namespace App\Http\Controllers;

use App\Bread;
use Illuminate\Http\Request;

class BreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Bread $bread)
    {
      // $breads = bread::orderByDesc("created_at")->paginate(7);
      $breads = bread::all();

      return view('home', compact('breads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $breads = bread::all();

      return view('breadCreate', compact('breads'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validatedData = $request->validate([
        'name' => 'required|max:20',
        'description' => 'required|max:255',
        'in_opslag' => 'required'
      ]);

      $bread = new  bread();
      $bread->name = $request['name'];
      $bread->description = $request['description'];
      $bread->in_opslag = $request['in_opslag'];

      $bread->save();

      return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bread  $bread
     * @return \Illuminate\Http\Response
     */
    public function show(Bread $bread)
    {
      return view('breadShow', compact('bread'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bread  $bread
     * @return \Illuminate\Http\Response
     */
    public function edit(Bread $bread)
    {
      return view('breadEdit', compact('bread'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bread  $bread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bread $bread)
    {
      $bread->name = $request['name'];
      $bread->description = $request['description'];
      $bread->in_opslag = $request['in_opslag'];

      $bread->save();
      return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bread  $bread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bread $bread)
    {
      $bread->delete();

      return redirect('home');
    }
}
