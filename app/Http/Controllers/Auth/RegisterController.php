<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Type;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str; // Questo per lo slug
use Illuminate\Support\Facades\Storage;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    public function showRegistrationForm()
    {
        // Recupero dal db le tipologie e le ordine per nome 
        $types = Type::orderBy('name', 'ASC')->get();

        // Return view auth register 
        return view('auth.register', compact('types'));
    }


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'min:3', 'max:50', 'regex:/^[a-zA-Z\s]+$/'],
            'surname' => ['required', 'string', 'min:3', 'max:50', 'regex:/^[a-zA-Z\s]+$/'],
            'telephone_number' => ['required', 'string', 'min:10', 'max:10', 'regex:/^[0-9]+$/'],
            'business_name' => ['required', 'string', 'max:50', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'types' => ['required', 'exists:types,id'],
            'cover_img' => ['required', 'file', 'image', 'mimetypes:image/jpeg,image/png,image/svg,image/jpg'],
            'zip_code' => ['required', 'string', 'min:5', 'max:5', 'regex:/^[0-9]+$/'],
            'address' => ['required', 'string', 'max:255'],
            'vat_number' => ['required', 'string', 'min:11', 'max:11', 'regex:/^[0-9]+$/'],
            
        ]);
 /*        [
        //messaggi d'errore custom
        'name.regex' => 'Il nome pu?? contenere solo lettere',
        'surname.regex' => 'Il cognome pu?? contenere solo lettere',
        'telephone_number.regex' => 'Il numero di telefono deve contenere 10 numeri',
        'zip_code' => 'Il codice Fiscale deve contenere 5 numeri',
        'vat_number.regex' => 'Il formato di P.Iva deve contenere 11 numeri',
        ]); */
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        /* dd($data); */
        // Salvo il path dell'immagine e la pusho su storage uploads
        $img_path = Storage::put('uploads', $data['cover_img']);
        // Imposto il valore dell'immagine utente uguale a img_path
        $data['cover_img'] = $img_path;
        $data['slug'] = Str::slug($data['business_name'], '-');

        $user =  User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'telephone_number' => $data['telephone_number'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'business_name' => $data['business_name'],
            'slug' => $data['slug'],
            'cover_img' => $data['cover_img'],
            'city' => 'Milano',
            'zip_code' => $data['zip_code'],
            'address' => $data['address'],
            'vat_number' => $data['vat_number'],
        ]);

         // Attach tiplogie ristorante inserite dall'utente tramite checkbox
         $user->types()->attach($data['types']);

         return $user;
    }
}

