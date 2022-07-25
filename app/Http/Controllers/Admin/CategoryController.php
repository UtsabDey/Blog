<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $data['category'] = Category::all();
        return view('admin.category.index', $data)->with('no', 1);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:200',
            'description' => 'required',
            'meta_title' => 'required|string|max:200',
            'meta_description' => 'required|string',
            'meta_keyword' => 'required|string',
            'navbar_status' => 'nullable',
            'status' => 'nullable',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            $photo_name = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move('images/category', $photo_name);
            $category->image = $photo_name;
        }
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keyword = $request->meta_keyword;
        $category->navbar_status = $request->navbar_status == true ? '1' : '0';
        $category->status = $request->status == true ? '1' : '0';
        $category->created_by = Auth::user()->id;
        $category->save();

        return redirect()->route('category.index')->with('success', 'Category added successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data['category'] = Category::find($id);
        return view('admin.category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:200',
            'description' => 'required',
            'meta_title' => 'required|string|max:200',
            'meta_description' => 'required|string',
            'meta_keyword' => 'required|string',
            'navbar_status' => 'nullable',
            'status' => 'nullable',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        if ($request->hasFile('image')) {

            $destination = 'images/category/' . $category->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $photo = $request->file('image');
            $photo_name = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move('images/category', $photo_name);
            $category->image = $photo_name;
        }
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keyword = $request->meta_keyword;
        $category->navbar_status = $request->navbar_status == true ? '1' : '0';
        $category->status = $request->status == true ? '1' : '0';
        $category->created_by = Auth::user()->id;

        if ($category->isDirty()) {
            $category->update();
            return redirect()->route('category.index')->with('success', 'Category updated successfully');

        }
        return back()->with('error', 'Nothing Changed !!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if ($category) {
            $destination = 'images/category/' . $category->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $category->delete();
            return redirect()->back()->with('warning', 'Data Delete Success');
        }
    }
}
