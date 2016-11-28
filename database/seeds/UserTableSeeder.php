<?php

use Illuminate\Database\Seeder;
use App\Model\User;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_role')->delete();
        DB::table('users')->delete();

        $string = file_get_contents(__DIR__."/../../resources/json/user_default.json");
        $jsonA = json_decode($string, true);

        foreach ($jsonA as $userA)
        {
            $newUser = User::create(
                [
                    "username"      => $userA["username"],
                    "email"         => $userA["email"],
                    "password"      => Hash::make($userA["password"]),
                    "first_name"    => $userA["first_name"],
                    "last_name"     => $userA["last_name"],
                    "phone"         => $userA["phone"],
                    "job_position"  => $userA["job_position"]
                ]
            );
            $newUser->makePermission($userA['job_position']);
        }

    }
}
