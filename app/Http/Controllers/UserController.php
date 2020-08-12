<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
   /**
    * Update User Date 
    */
   public function update_user ($id , Request $request) {
      $user = User::find($id);
      $user->update([
         'is_subscribed' => $request->is_subscribed == 'on' ? 1 : 0,
         'mobile' => $request->mobile,
         'is_active' => 1,
         'password' => $request->password ? Hash::make($request->password) : $user->password
      ]);

      $notification = [
            'message' =>  'تم تعديل الحساب بنجاح ' ,
            'alert-type' =>  'success'
      ];

      return back()->with($notification);
   }

}