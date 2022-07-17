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
                'cover_img' => 'required|image|max:500'
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
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        /* Qua Dichiaro i dati da editare tramite modello */
        /*
            $categories = Category::all();
        */
        /* Qua ritorno la view del form per editare */
        return view('admin.products.edit', compact('product'/* , 'categories' */));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductsRequest $request, Product $product)
    {
        /* Validazione dei dati */
        $val_data = $request->validated();

        // Genera lo slug
        $slug = Product::generateSlug($request->name);
        $val_data['slug'] = $slug;

        /*
            Rimetto la stessa identica cosa di Create
            prima di post update
        */
        if(array_key_exists('cover_img', $request->all())) {
            // Valida il file
            $request->validate(
                [
                    'cover_img' => 'required|image|max:500'
                ]
            );
            /* Questo è lo storage dell'immagine per eliminarlo*/
            Storage::delete($product->cover_img);
            // Salvarlo nel file System
            $path = Storage::put('uploads', $request->cover_img);
            // passo il percorso all'array di dati per il salvataggio
            $val_data['cover_img'] = $path;
        }


        /* Avvio l'update */
        $product->update($val_data);
        /* ??? lo posso sincronizzare con Orders ??? */
        /* $product->orders()->sync($request->orders); */

        // return (new PostUpdatedAdminMessage($post))->render(); // Return necessario per la Mail (1)
        /* Mail::to('user@example.com')->send(new PostUpdatedAdminMessage($product)); */
        /* Ora eseguo il return della rotta */
        return redirect()->route('admin.products.index')->with('message', "$product->title è stato aggiornato");
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
