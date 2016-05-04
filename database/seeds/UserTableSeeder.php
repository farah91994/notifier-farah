<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role_user=Role::where('name','User')->first();
        $role_author=Role::where('name','Author')->first();
        $role_admin=Role::where('name','Admin')->first();


        $user = new User();
        $user->first_name = 'Firas';
        $user->email = 'firas@psut.com';
        $user->password = bcrypt('firas1');
        $user->save();
        $user->roles()->attach($role_user);

        $admin = new User();
        $admin->first_name = 'Arafat';
        $admin->email = 'arafat@psut.com';
        $admin->password = bcrypt('arafat');
        $admin->save();
        $admin->roles()->attach($role_admin);


        $author = new User();
        $author->first_name = 'Sufyan';
        $author->email = 'sufyan@gmail.com';
        $author->password = bcrypt('Sufyan');
        $author->save();
        $author->roles()->attach($role_author);

    }
}
