<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User; // Questo è il mio model
use Faker\Generator as Faker;
use Illuminate\Support\Str; // Questo per lo slug

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Salvo l'array presente nel db */
        $users = config('db.arrayUsers');

        /* Avvio ciclo ForEach */
        foreach ($users as $user) {
            $new_user = new User();
            $new_user->name = $user['name'];
            $new_user->surname = $user['surname'];
            $new_user->telephone_number = $user['telephone_number'];
            $new_user->email = $user['email'];
            $new_user->password = Hash::make($user['password']);
            $new_user->business_name = $user['business_name'];
            $new_user->slug = Str::slug($new_user->business_name, '-');
            $new_user->cover_img = $user['cover_img'];
            $new_user->city = $user['city'];
            $new_user->zip_code = $user['zip_code'];
            $new_user->address = $user['address'];
            $new_user->vat_number = $user['vat_number'];
            $new_user->save();
        }
    }
}
