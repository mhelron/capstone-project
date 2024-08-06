<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Kreait\Firebase\Contract\Database;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class FoodController extends Controller
{
    protected $perPage = 10;
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = 'food';
    }

    public function index(Request $request){
        $food = $this->database->getReference('food')->getValue();
        $food = is_array($food) ? $food : [];

        if ($request->has('search')) {
            $search = $request->input('search');
            $food = array_filter($food, function($item) use ($search) {
                return strpos(strtolower($item['dish_name']), strtolower($search)) !== false;
            });
        }

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = array_slice($food, ($currentPage - 1) * $this->perPage, $this->perPage);
        $food = new LengthAwarePaginator($currentItems, count($food), $this->perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
            'pageName' => 'page',
        ]);

        return view('firebase.admin.food.index', compact('food'));
    }

    public function create(){
        return view('firebase.admin.food.create');
    }

    public function store(Request $request){
        $postData = [
            'category' =>$request->category,
            'dish_name' => $request->dish_name,
            'desc' => $request->desc,
        ];
        $postRef = $this->database->getReference($this->tablename)->push($postData);

        if ($postRef) {
            return redirect('admin/food')->with('status', 'Food Added Successfully');
        } else {
            return redirect('admin/food')->with('status', 'Food Not Added');
        }
    }

    public function edit($id){
        $key = $id;
        $editdata = $this->database->getReference($this->tablename)->getChild($key)->getValue();
        if($editdata){
            return view('firebase.admin.food.edit', compact('editdata', 'key'));
        } else {
            return redirect('admin/food')->with('status', 'Food ID Not Found');
        }
    }

    public function update(Request $request, $id){
        $key = $id;
        $updateData = [
            'category' =>$request->category,
            'dish_name' => $request->dish_name,
            'desc' => $request->desc,
        ];
        $res_updated = $this->database->getReference($this->tablename. '/'.$key)->update($updateData);

        if ($res_updated) {
            return redirect('admin/food')->with('status', 'Food Updated Successfully');
        } else {
            return redirect('admin/food')->with('status', 'Food Not Updated');
        }
    }

    public function destroy($id){
        $key = $id;
        $del_data = $this->database->getReference($this->tablename. '/'.$key)->remove();

        if ($del_data) {
            return redirect('admin/food')->with('status', 'Food Deleted Successfully');
        } else {
            return redirect('admin/food')->with('status', 'Food Not Deleted');
        }
    }
}