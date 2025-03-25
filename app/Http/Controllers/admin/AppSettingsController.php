<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class AppSettingsController extends Controller
{
    public function generateRoles(){
        $super_admin=new Role();
        $super_admin->name='super_admin';
        $super_admin->display_name='website administrator';
        $super_admin->description='this role allow to manage every thing in the site';
        $super_admin->save();

        $manager=new Role();
        $manager->name='content_manager';
        $manager->display_name='site manager ';
        $manager->description='this role allow to manage part of site like articles and comments';
        $manager->save();


        $user=new Role();
        $user->name='user';
        $user->display_name='username';
        $user->save();
    }
}
