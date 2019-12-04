<?php

use App\Http\Models\Member;
use App\Http\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserNMember extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $objUser = new User;
        $objUser->first_name = 'Super';
        $objUser->last_name = 'Admin';
        $objUser->email = 'admin@dojo.com';
        $objUser->password = bcrypt('password');
        $objUser->email_verified_at = Carbon::createFromDate(2019, 11, 20);
        $objUser->role = 'admin';
        $objUser->save();

        $objMember = new Member;
        $objMember->user_id = $objUser->id;
        $objMember->type = 'admin';
        $objMember->first_name = 'Super';
        $objMember->last_name = 'Admin';
        $objMember->dob = Carbon::createFromDate(1987, 11, 20);
        $objMember->address = 'Flat #25 Kinoshita Royal Residency';
        $objMember->city = 'Hyderabad';
        $objMember->state = 'Sindh';
        $objMember->zip = '71000';
        $objMember->country = 'PK';
        $objMember->email = 'admin@dojo.com';
        $objMember->phone = '0331541987';
        $objMember->save();
    }
}
