<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = new User();
        $user->name = 'Sefa Kendirli';
        $user->username = 'blacq0o';
        $user->email = 'sefa.kendirli@gmail.com';
        $user->password = bcrypt('s2ua35246');
        $user->group_id = 2;
        $user->sms_code = 61031;
        $user->status = 1;
        $user->delegation_id = 1;

        $user->save();
    }
}
