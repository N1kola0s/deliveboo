<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductsRequest;
use Illuminate\Support\Facades\Storage;
use App\User;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentUser= Auth::id();
        $products= Product::where('user_id', '=', $currentUser)->orderByDesc('id')->get();
        /* $products = Auth::user()->products; */
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsRequest $request)
    {
        // ddd($request->all());
        //validare dati
        $val_data = $request->validated();
        //generare slug
        $slug = Product::generateSlug($request->name);
        //dd($slug);
        $val_data['slug'] = $slug;
        //assegno il posto all'utente autenticato
        $val_data['user_id'] = Auth::id();
       
        //verifico se la richiesta contiene un file   ------> posso farlo anche cosi $request->hasFile('cover_image')
        if(array_key_exists('cover_img', $request->all())){
            //validiamo il file
            $request->validate([
                'cover_img' => 'nullable|image|max:500'
            ]);
            //lo salviamo nel filesystem
            //recupero il percorso path
            $path = Storage::put('uploads', $request->cover_img);
            //passo il percorso all'array di dati validati per il salvataggio della risorsa
            $val_data['cover_img'] = $path;
        }
        /* //creare istanza con dati validati
        $new_product = Product::create($val_data); */
   
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
