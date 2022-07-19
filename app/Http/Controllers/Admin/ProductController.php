<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductsRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\User;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentUser = Auth::id();
        $products = Product::where('user_id', '=', $currentUser)->orderByDesc('id')->get();
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
        $users = User::all();
        /* $products = Product::all(); */
        return view('admin.products.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsRequest $request)
    {
        //devo validarlo qua nel controller
        $request->validate([
            'name' => [Rule::unique('products')->where(function ($query) {
                return $query->where('user_id', Auth::id());
            })],
        ]);

        /* Validazione degli altri dati */
        $val_data = $request->validated();
        //generare slug
        $slug = Str::slug($request->name, '-');
        //dd($slug);
        $val_data['slug'] = $slug;
        //assegno il posto all'utente autenticato
        $val_data['user_id'] = Auth::id();
        


        //verifico se la richiesta contiene un file   ------> posso farlo anche cosi $request->hasFile('cover_image')
        if (array_key_exists('cover_img', $request->all())) {
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
        // dd($val_data);
        //creare istanza con dati validati
        Product::create($val_data);


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

        $currentUser = Auth::id();
        if ($currentUser == $product->user_id) {
            return view('admin.products.show', compact('product'));
        } else {
            return redirect()->route('admin.products.index');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        $currentUser = Auth::id();
        if ($currentUser == $product->user_id) {
            return view('admin.products.edit', compact('product'/* , 'categories' */));
        } else {
            return redirect()->route('admin.products.index');
        }

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
        $request->validate([
            'name' => [Rule::unique('products')->ignore($product)->where(function ($query) {
                return $query->where('user_id', Auth::id());
            })],
        ]);
        /* Validazione dei dati */
        $val_data = $request->validated();

        // Genera lo slug
        $slug = Str::slug($request->name, '-');
        $val_data['slug'] = $slug;

        /*
            Rimetto la stessa identica cosa di Create
            prima di post update
        */
        if (array_key_exists('cover_img', $request->all())) {
            // Valida il file
            $request->validate(
                [
                    'cover_img' => 'required|image|file|max:500|mimetypes:image/jpeg,image/png,image/svg,image/jpg'
                ]
            );
            /* Questo è lo storage dell'immagine per eliminarlo*/
            Storage::delete($product->cover_img);
            // Salvarlo nel file System
            $path = Storage::put('uploads', $request->cover_img);
            // passo il percorso all'array di dati per il salvataggio
            $val_data['cover_img'] = $path;
        }

        /* Aggiungo condizione visibilità per il toggle */
        if (!array_key_exists('visibility', $val_data)) {
            $val_data['visibility'] = 0;
        }


        /* Avvio l'update */
        $product->update($val_data);
        /* ??? lo posso sincronizzare con Orders ??? */
        /* $product->orders()->sync($request->orders); */

        // return (new PostUpdatedAdminMessage($post))->render(); // Return necessario per la Mail (1)
        /* Mail::to('user@example.com')->send(new PostUpdatedAdminMessage($product)); */
        /* Ora eseguo il return della rotta */
        return redirect()->route('admin.products.index')->with('message', "$product->name è stato aggiornato correttamente");
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
