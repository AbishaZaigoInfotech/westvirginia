<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use LaraSnap\LaravelAdmin\Models\User;
use LaraSnap\LaravelAdmin\Models\UserProfile;
use LaraSnap\LaravelAdmin\Models\Screen;
use LaraSnap\LaravelAdmin\Models\Module;
use LaraSnap\LaravelAdmin\Models\Menu;
use LaraSnap\LaravelAdmin\Models\MenuItem;
use LaraSnap\LaravelAdmin\Models\Setting;
use LaraSnap\LaravelAdmin\Models\Role;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         //User Seed 
         $user = User::where('email', 'admin@admin.com')->first();
         if(!$user){
             $user = new User;
             $user->email = 'admin@admin.com';
             $user->password = bcrypt('password');
             $user->status = 1;
             $user->created_by = 0;
             $user->save();
             
             $userProfile = new UserProfile;
             $userProfile->first_name = 'Super';
             $userProfile->last_name = 'Admin';
             $userProfile->mobile_no = 9876543210;
             $userProfile->address = 'Test Address';
             $userProfile->state = 'Test State';
             $userProfile->city = 'Test State';
             $userProfile->pincode = 98765;
             $user->userProfile()->save($userProfile); 
         }
         
         //Role Seed
         $role = Role::where('name', 'super-admin')->first();
         if(!$role){
             $role = new Role;
             $role->name = 'super-admin';
             $role->label = 'Super Admin';
             $role->save();
         }
         
         //User Role Mapping Seed
         $user->roles()->detach();
         $user->assignRole($role->id);

         //Module
         Module::whereIn('label', ['Station Management', 'Promo Management'])->delete();
         
         $module11 = new Module;
         $module11->label = 'Station Management';
         $module11->save();

         $module9 = new Module;
         $module9->label = 'Settings';
         $module9->save(); 

         $module12 = new Module;
         $module12->label = 'Promo Management';
         $module12->save();
         
         //Screen Seed & Role Screen Mapping Seed
         Screen::whereIn('name', ['stations.index', 'stations.create', 'stations.edit', 'stations.show', 'stations.destroy', 'settings.create', 'stations.deleteImage', 'promos.index', 'promos.create', 'promos.edit', 'promos.show', 'promos.destroy'])->delete();
         
         $screens = [
             ['name' => 'stations.index','label' => 'Station List', 'module_id' => $module11->id],
             ['name' => 'stations.create','label' => 'Station Create', 'module_id' => $module11->id],
             ['name' => 'stations.edit','label' => 'Station Edit', 'module_id' => $module11->id],
             ['name' => 'stations.show','label' => 'Station Show', 'module_id' => $module11->id],
             ['name' => 'stations.deleteImage','label' => 'Station Delete Image', 'module_id' => $module11->id],
             ['name' => 'stations.destroy','label' => 'Station Delete', 'module_id' => $module11->id],
             ['name' => 'settings.create','label' => 'Settings', 'module_id' => $module9->id],
             ['name' => 'promos.index','label' => 'Promo List', 'module_id' => $module12->id],
             ['name' => 'promos.create','label' => 'Promo Create', 'module_id' => $module12->id],
             ['name' => 'promos.edit','label' => 'Promo Edit', 'module_id' => $module12->id],
             ['name' => 'promos.show','label' => 'Promo Show', 'module_id' => $module12->id],
             ['name' => 'promos.destroy','label' => 'Promo Delete', 'module_id' => $module12->id],
            ];
         
         foreach ($screens as $screen){
                 $newScreen = Screen::create($screen);
                 $role->assignScreen($newScreen->id);
         }      
 
         //Menu Seed 
         MenuItem::whereIn('title', ['Station Management', 'Settings', 'Promo Management'])->delete();

             $menuItem11 = new MenuItem;
             $menuItem11->menu_id  = 1;
             $menuItem11->title  = "Station Management";
             $menuItem11->icon   = "fa-list";
             $menuItem11->order  = 11;
             $menuItem11->target = "_self";
             $menuItem11->route  = "stations.index";
             $menuItem11->save(); 
             
             $menuItem8 = new MenuItem;
             $menuItem8->menu_id  = 1;
             $menuItem8->title  = "Settings";
             $menuItem8->icon   = "fa-wrench";
             $menuItem8->order  = 8;
             $menuItem8->target = "_self";
             $menuItem8->route  = "settings.create";
             $menuItem8->save(); 

             $menuItem12 = new MenuItem;
             $menuItem12->menu_id  = 1;
             $menuItem12->title  = "Promo Management";
             $menuItem12->icon   = "fa-list";
             $menuItem12->order  = 12;
             $menuItem12->target = "_self";
             $menuItem12->route  = "promos.index";
             $menuItem12->save(); 
             
             Setting::whereIn('name', ['site_name', 'site_logo', 'admin_email', 'date_format', 'date_time_format', 'time_format', 'entries_per_page', 'sleep_time'])->delete();
        
             $settings = [
                 ['name' => 'site_name','value' => 'LaraSnap'],
                 ['name' => 'site_logo','value' => ''],
                 ['name' => 'admin_email','value' => 'admin@larasnap.com'],
                 ['name' => 'date_format','value' => 'd/m/Y'],
                 ['name' => 'date_time_format','value' => 'd/m/Y  h:i A'],
                 ['name' => 'time_format','value' => 'h:i:s A'],
                 ['name' => 'entries_per_page','value' => '10'],
                 ['name' => 'default_user_role','value' => '0'],
                 ['name' => 'sleep_time','value' => '10:54'],
             ];
             Setting::insert($settings);
    }
}
