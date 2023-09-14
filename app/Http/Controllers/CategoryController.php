<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create()
    {
        return view('categories.create');
    }
    
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            
            'name'=>'required|unique:categories',
            // dd('siuuuuu')
        ]);
        // dd('siuuuuu');
        $category = new Category();
        $category->name = strtolower($validated['name']);
        
        $category->save();
        return redirect()->route('categories.create')->with('success','Category Added Successfully');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        if($category->name == $request->name)
        {
            $validated = $request->validate([
                'name' => 'required | unique:categories,name,'.$id,
            ]);
            $category->name = strtolower($validated['name']);
            $category->update();
            //return redirect("/products")       
            return redirect()->route('admin.categories');
        }
        else
        {
            $validated = $request->validate([
                'name' => 'required | unique:categories',
            ]);
            $category->name = strtolower($validated['name']);
            $category->update();
            //return redirect("/products")       
            return redirect()->route('admin.categories');
        }
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            return redirect()->route('admin.categories');
        } else {
            return redirect()->route('admin.categories');
        }
    }
}
