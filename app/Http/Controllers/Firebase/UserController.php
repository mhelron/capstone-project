<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Kreait\Firebase\Contract\Database;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = 'users';
    }

    public function index(){
        $users = $this->database->getReference($this->tablename)->getValue();
        return view('firebase.admin.users.index', compact('users'));
    }

    public function create(){
        return view('firebase.admin.users.create');
    }

    public function store(Request $request){
        $postData = [
            'user_role' =>$request->user_role,
            'fname' => $request->first_name,
            'lname' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password,
        ];
        $postRef = $this->database->getReference($this->tablename)->push($postData);

        if ($postRef) {
            return redirect('admin/users')->with('status', 'User Added Successfully');
        } else {
            return redirect('admin/users')->with('status', 'User Not Added');
        }
    }
}
