<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    //

    public function index() {

        $categories = Category::orderBy('name', 'asc')->get();
        return view('admin.category.index', compact('categories'));;
    }

    public function create()
    {   
        $response = Gate::inspect('super_admin');
        if ($response->allowed()) {
            return view('admin.category.create');
        }
        else {
            echo $response->message();
        }
    }

    public function store(request $request) {

        $response = Gate::inspect('super_admin');
        if ($response->allowed()) {
            try {
                $params = $request->except('token');
                 
                $record = Category::create($params);
                if ($record) {
                    Session()->flash('message', 'Record Added Successfully');
                    return redirect('categories');
                }
                else {
                    Session()->flash('message', 'An error occurred');
                    return redirect()->back(); 
                }
            }
            catch (QueryException $exception) {
                throw new InvalidArgumentException($exception->getMessage());
            }
        }
        else {
            echo $response->message();
        }
    }

    public function edit(request $request) {
        $response = Gate::inspect('super_admin');
        if ($response->allowed()) {
            try {

                $targetCategory = Category::where('id', $request->id)->first();
                return view('admin.category.edit', compact('targetCategory'));

            } catch (ModelNotFoundException $e) {

                throw new ModelNotFoundException($e);
            }
        }
        else {
            echo $response->message();
        }
        
    }

    public function update(request $request) {
        $this->validate($request, [
            'name'      =>  'required|max:191',
        ]);

        $response = Gate::inspect('super_admin');
        if ($response->allowed()) {
            
            $category = Category::where('id', $request->id)->first();

            $params = $request->except('token');
            $category->update($params);
            if ($category) {
                Session()->flash('message', 'Record Updated Successfully');
                return redirect('categories');
            }
            else {
                Session()->flash('message', 'An error occurred');
                return redirect()->back(); 
            }
        }
        else {
            echo $response->message();
        }
    }


    public function delete(request $request) {
        $response = Gate::inspect('super_admin');
        if ($response->allowed()) {
            $category = Category::where('id', $request->id)->first();
            $category->delete();
            if ($category) {
                Session()->flash('message', 'Record Deleted Successfully');
                return redirect()->back();
            }
            else {
                Session()->flash('message', 'An error occurred');
                return redirect()->back(); 
            }
        }
        else {
            echo $response->message();
        }
    }
}

