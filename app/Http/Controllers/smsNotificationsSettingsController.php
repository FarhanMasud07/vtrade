<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Smsconfig;
use Illuminate\Http\Request;

class smsNotificationsSettingsController extends Controller
{
    public function index(){
        return view('sms_notifications.index');
    }

    public function edit(){
        $admins = Admin::all();
        return view('sms_notifications.edit',compact('admins'));
    }
}
