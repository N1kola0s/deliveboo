<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentUser= Auth::id();
        /* Nome dell'utente */
        $nomeUtente = Auth::user()->where('id', '=', $currentUser)->get('name');
        /* Cognome dell'utente */
        $cognomeUtente = Auth::user()->where('id', '=', $currentUser)->get('surname');
        /* Nome completo */
        $name = $nomeUtente;
        $surname = $cognomeUtente;
        $orders= Order::where('user_id', '=', $currentUser)->orderByDesc('created_at')->get();

        return view('admin.orders.index', compact('orders', 'name', 'surname'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $currentUser = Auth::id();
        if ($currentUser == $order->user_id) {
            return view('admin.orders.show', compact('order'));
        } else {
            return redirect()->route('admin.products.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
