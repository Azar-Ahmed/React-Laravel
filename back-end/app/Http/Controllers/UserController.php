<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Nette\Utils\Json;

class UserController extends Controller
{  
   public function index()
   {
        return response()->Json(User::latest()->get());
   }

   public function store(Request $request)
   { 
      User::create([
         'name' => $request->fname,
         'email' => $request->email,
         'password' => bcrypt($request->password),
      ]);
      return response()->Json("Successfully Added");

   }
   public function edit($id)
   { 
      return response()->Json(User::whereId($id)->first());
   }
 
  public function update(Request $request, $id)
   { 
     $user = User::whereId($id)->first();
     
     $user->update([
         'name' => $request->fname,
         'email' => $request->email,
      ]);
      return response()->Json("Successfully Updated");

   }
   public function destroy($id)
   { 
      User::whereId($id)->first()->delete();
      return response()->Json("User Deleted");
   }
}
