<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Dotenv\Util\Str;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class FrontendController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        return view('frontend.index');
    }

    public function viewCategory(string $slug)
    {
        $data['category'] = Category::where('slug', $slug)->where('status', '0')->first();
        if ($data['category']) {
            $data['post'] = Post::where('category_id', $data['category']->id)->where('status', '0')->paginate(2);
            return view('frontend.post.index',$data);
        }
        else{
            return redirect()->route('home');
        }
        return view('frontend.index');
    }

    public function viewPost(string $category_slug, string $post_slug)
    {
        $data['category'] = Category::where('slug', $category_slug)->where('status', '0')->first();
        if ($data['category']) {
            $data['post'] = Post::where('category_id', $data['category']->id)->where('slug', $post_slug)->first();
            return view('frontend.post.view',$data);
        }
        else{
            return redirect()->route('home');
        }
        return view('frontend.index');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
