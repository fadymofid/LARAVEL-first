<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Models\Contact;

use App\Http\Resources\UserResource; // Correct import
class DashboardController extends Controller
{
//    public function users()
//    {
//        $data = User::query()
//            ->with('image')
//            ->where('type','client')
//            ->orderBy('id','DESC')
//            ->paginate(10);
//        $contacts = Contact::all(); // Load all contacts
//        $users = UserResource::collection($data);
//        return view('admin.users', compact('users','contacts'));
//    }

    public function users()
    {
        // Retrieve the search term from the request
        $search = request()->input('search');

        $query = User::query()
            ->with('image')
            ->where('type', 'client' , );

        // Apply search filter
        if ($search) {
            $query->where('username', 'like', $search . '%');
        }

        $users = $query->orderBy('id', 'DESC')->paginate(10);

        // You don't need to load all contacts unless you're using them for something specific
         $contacts = Contact::all();

        return view('admin.users', compact('users','contacts' ,'search'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit_user', compact('user'));
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->validated());

        return redirect()->route('dashboard.users')->with('success', 'User updated successfully.');
    }
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
