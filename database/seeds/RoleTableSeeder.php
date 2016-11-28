<?php

use Illuminate\Database\Seeder;
use App\Model\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_position')->delete();
        $string = file_get_contents(__DIR__."/../../resources/json/job_position_default.json");
        $jsonA = json_decode($string, true);
        // Loop through each user above and create the record for them in the database
        foreach ($jsonA as $position)
        {
            $positionID = $position['id'];
            $positionName = $position['name'];
            if(isset($positionID)){
                DB::table('job_position')->insert(
                    [
                        'id' => $positionID,
                        'name' => $positionName
                    ]
                );
            }else{
                DB::table('job_position')->insert(
                    ['name' => $positionName]
                );
            }
        }

        DB::table('roles')->delete();
        $string = file_get_contents(__DIR__."/../../resources/json/role_default.json");
        $jsonA = json_decode($string, true);
        // Loop through each user above and create the record for them in the database
        foreach ($jsonA as $role)
        {
            Role::create($role);
        }

    }
}
