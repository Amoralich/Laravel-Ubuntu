<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function uploadAvatar(Request $request)
    {
        if ($request->hasFile("image")){
            if (auth()->user()->avatar){
                Storage::delete("/public/".auth()->user()-avatar);
            }

        $filename = $request->image->store("image","public");
        auth()->User()->Update(['avatar'=>$filename]);
        return redirect()->back-with("message","Image Upload");

    }
        return redirect()->back("error","Image not upload");
}

    public function Index()
    {

        //create
//       DB::insert("insert into users(name,email,password)value (?,?,?)",[
 //           "Sten",
 //           "Sten.bruzas@gmail.com",
 //           "Reiksv23",
 //           ]);
        //Eloquent
//        $user = new User();
//        $user->name = "Sten";
//        $user->email = "bruzas5743@gmail.com";
//        $user->password = "Reiksv23";
//        $user->save();
          $data = [
              'name' => 'Elon',
              'email' => 'elon5@bitfumes.com',
              'password' => ('password'),
           ];
         // User::create($data);
        //Read
//      $users = DB::select("select * from users");
        //Eloquent
//        $users = user::all();
        //Update
//        $users= DB::update("update users set name=? where id = 1", ["uuendatud Sten"]);
//        User::where("id", 2)->update(["name"=>"Eloquent"]);
        //delete
//          DB::delete("delete from users where id = 1");
//          $users = DB::select("select * from users");
//            User::where("id", 2)->delete();

          $users = User::all();
          return $users;
    }
}
