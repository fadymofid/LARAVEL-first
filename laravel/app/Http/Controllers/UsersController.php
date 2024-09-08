<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {

         $data=User::query()->create([
             'username'=>'fady',
             'email'=>'fady@gmail.com',
             'password'=>bcrypt('1234'),
             'phone'=>'012222222',
             'type'=>'admin',
         ]);

       $data =request()->all(); // get the data passed in GET method //http://127.0.0.1:8000/user?username=a
        // if(request()->filled('username')) // if there is query parameter called username and it has a value
        // {
        //     $data =User::query()
        //     ->where('username','LIKE','%'.request('username').'%')
        //     ->get();
        // return $data;
        // }else{
        //     echo 'No data';
        // }
        //////////////////////////////////
//
//         //with('questions'); many to many relation data
//        $data = User::query()->withCount('questions'); //many to many relation data count
//        if(request()->filled('username'))
//        {
//            $data->where('username','LIKE','%'.request('username').'%');
//        }
//        $result = $data
//        // ->select('username','email')
//        ->get();
//
//        // return view('about',compact('result'));
//        return $result;

    }

    public function profile($id){

        $user = User::query()
            // ->where('id','=',$id)
            // ->get();
            // ==
            // ->find($id);
            // if($user){
            //     return $user;
            // }else{
            //     echo 'No data';
            // }
            //////////////////////////////////
            ->find($id);
            if($user){
                $user->update(['username'=>'test web']);
            }
    }

    public function all_users(Request $request)
    {
        $search = $request->input('search', '');
        $query = User::query();

        if ($search) {
            $query->where('username', 'like',  $search . '%');
        }

        // Fetch users with their images and contacts
        $users = $query->with('image', 'contacts')->paginate(10);

        return view('all_users', compact('users', 'search'));
    }



}
