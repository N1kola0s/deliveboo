<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Type;
use App\Product;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = User::with(['types', 'products'])->orderByDesc('id')->paginate(12);

        return $restaurants;
    }


     /* FILTRAGGIO RISTORANTI */
     public function filteredUsers(Request $request){
        /* array di tipologie ottenute dalle checkbox */
       $richiesta = $request['type'];

        /* chiamata a db con relazione */
        $restaurants = User::whereHas('types', function($q) use($richiesta) {
            $q->whereIn('type_id', $richiesta);
        })->paginate(12);

        return response()->json($restaurants);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $restaurant = User::with(['types', 'products'])->where('slug', $slug)->first();

        return $restaurant;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
