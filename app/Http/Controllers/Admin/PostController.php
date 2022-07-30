<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }
    
    public function index()
    {
        $data['posts'] = Post::all();
        return view('admin.post.index', $data)->with('no', 1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['category'] = Category::where('status', '0')->orderBy('name', 'ASC')->get();
        return view('admin.post.create', $data);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'category_id' => 'required|integer',
            'name' => 'required|string|max:200',
            'description' => 'required',
            'yt_iframe' => 'nullable|string',
            'meta_title' => 'required|string|max:200',
            'meta_description' => 'required|string',
            'meta_keyword' => 'required|string',
            'navbar_status' => 'nullable',
            'status' => 'nullable',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        $post = new Post();
        $post->category_id = $request->category_id;
        $post->name = $request->name;
        $post->slug = Str::slug($request->slug);
        $post->description = $request->description;
        $post->yt_iframe = $request->yt_iframe;
        $post->meta_title = $request->meta_title;
        $post->meta_description = $request->meta_description;
        $post->meta_keyword = $request->meta_keyword;
        $post->status = $request->status == true ? '1' : '0';
        $post->created_by = Auth::user()->id;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data['post'] = Post::find($id);
        return view('admin.post.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'category_id' => 'required|integer',
            'name' => 'required|string|max:200',
            'description' => 'required',
            'yt_iframe' => 'nullable|string',
            'meta_title' => 'required|string|max:200',
            'meta_description' => 'required|string',
            'meta_keyword' => 'required|string',
            'navbar_status' => 'nullable',
            'status' => 'nullable',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        $post = Post::find($id);
        $post->category_id = $request->category_id;
        $post->name = $request->name;
        $post->slug = Str::slug($request->slug);
        $post->description = $request->description;
        $post->yt_iframe = $request->yt_iframe;
        $post->meta_title = $request->meta_title;
        $post->meta_description = $request->meta_description;
        $post->meta_keyword = $request->meta_keyword;
        $post->status = $request->status == true ? '1' : '0';
        $post->created_by = Auth::user()->id;

        if ($post->isDirty()) {
            $post->update();
            return redirect()->route('posts.index')->with('success', 'Post updated successfully');
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
        Post::find($id)->delete();
        return redirect()->back()->with('warning', 'Post Deleted Successfully');
    }
}
