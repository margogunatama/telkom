<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = config("permission-list");
        foreach ($list as $key => $value) {
            foreach($value as $v) { Permission::create(["name" => $v. " ".$key ]); }
        }
    }
}
