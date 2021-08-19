<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use LaraSnap\LaravelAdmin\Models\Screen;
use LaraSnap\LaravelAdmin\Models\Module;
use LaraSnap\LaravelAdmin\Models\MenuItem;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $menuItems = ['2','3','4','5','6','9'];
        MenuItem::whereIn('id', $menuItems)->delete();
        $modules = ['2','3','4','5','6','7','10'];
        Module::whereIn('id', $modules)->delete();
        $screens = ['2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','41','42'];
        Screen::whereIn('id', $screens)->delete();
    }
}
