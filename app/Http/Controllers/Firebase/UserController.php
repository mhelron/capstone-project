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
        $users = $this->database->getReference($this->tablename)->getValue() ?? [];
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

    public function edit($id){
        $key = $id;
        $editdata = $this->database->getReference($this->tablename)->getChild($key)->getValue();
        if($editdata){
            return view('firebase.admin.users.edit', compact('editdata', 'key'));
        } else {
            return redirect('admin/users')->with('status', 'User ID Not Found');
        }
    }

    public function update(Request $request, $id){
        $key = $id;
        $updateData = [
            'user_role' =>$request->user_role,
            'fname' => $request->first_name,
            'lname' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password,
        ];
        $res_updated = $this->database->getReference($this->tablename. '/'.$key)->update($updateData);

        if ($res_updated) {
            return redirect('admin/users')->with('status', 'User Updated Successfully');
        } else {
            return redirect('admin/users')->with('status', 'User Not Updated');
        }
    }

    public function destroy($id){
        $key = $id;
        $del_data = $this->database->getReference($this->tablename. '/'.$key)->remove();

        if ($del_data) {
            return redirect('admin/users')->with('status', 'User Deleted Successfully');
        } else {
            return redirect('admin/users')->with('status', 'User Not Deleted');
        }
    }
}
