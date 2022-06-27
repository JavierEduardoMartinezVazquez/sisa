<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $users = new User();

        $users->name = "JAVIER EDUARDO";
        $users->lastname_p = "MARTINEZ";
        $users->lastname_m = "VAZQUEZ";
        $users->email = "javier.martinez@socasa.com.mx";
        $users->password= bcrypt("854620");
        $users->status = "ALTA";

        $users->save();

        $users = new User();

        $users->name = "MARCO";
        $users->lastname_p = "POLO";
        $users->lastname_m = "BLATAZAR";
        $users->email = "marco.baltazar@socasa.com.mx";
        $users->password= bcrypt("12345678");
        $users->status = "ALTA";

        $users->save();


        

        
    }
}
