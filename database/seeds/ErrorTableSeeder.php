<?php

use Illuminate\Database\Seeder;
use App\Model\Error;

class ErrorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('errors')->delete();
        $string = file_get_contents(__DIR__."/../../resources/json/error_code_default.json");
        $jsonA = json_decode($string, true);
        // Loop through each user above and create the record for them in the database
        foreach ($jsonA as $error)
        {
            Error::create($error);
        }
    }
}
