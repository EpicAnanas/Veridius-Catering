<?php

namespace App\Http\Controllers;

use App\bestelling;
use App\Bread;
use Illuminate\Http\Request;

class BestellingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bestelling = bestelling::all();
        $breads = bread::all();

        return view('home', compact('bestelling', 'breads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bestelling = array();

        return view('home', compact('bestelling'));
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
        'hoeveelheid' => 'required',
      ]);

      $bestelling = new  bestelling();
      $bestelling->hoeveelheid = $request['hoeveelheid'];

      $bestelling->save();

      return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\bestelling  $bestelling
     * @return \Illuminate\Http\Response
     */
    public function show(bestelling $bestelling)
    {
        // return view('home', compact('bestelling'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\bestelling  $bestelling
     * @return \Illuminate\Http\Response
     */
    public function edit(bestelling $bestelling)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\bestelling  $bestelling
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bestelling $bestelling)
    {
        $bestelling->hoeveelheid = $request['heoveelheid'];
        $bestelling->done = $request['done'];

        $bestelling->save();
        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\bestelling  $bestelling
     * @return \Illuminate\Http\Response
     */
    public function destroy(bestelling $bestelling)
    {
        $bestelling->delete();

        return redirect('home');
    }
}
