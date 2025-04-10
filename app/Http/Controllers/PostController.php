<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tags;
use App\Category;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tags::all();
        $categories = Category::all();
        return view('posts.create',compact('tags','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:100',
            'description' => 'required',
            'image' => 'required|image',
            'category' => 'required',
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category;
        $post->admin_id = Auth::user()->id;

            //Product Image Upload
    if($request->hasFile('image')){
        //get form image
        $image = $request->file('image');
        $slug = Str::slug($request->title);
        $current_date = Carbon::now()->toDateString();
        //get unique name for image
        $image_name = $slug."-".$current_date."-".time().".".$image->getClientOriginalExtension();
        //location for new image 

        $cropped_location = public_path('uploads/posts/single/cropped/'.$image_name);
        $original_location = public_path('uploads/posts/single/original/'.$image_name);
        //resize image for category and upload temp 
        Image::make($image)->fit(371,267)->save($cropped_location);
        Image::make($image)->save($original_location);
        $post->image =  $image_name;
     }
     $post->save();
     $post->tags()->attach($request->tags);
    
     Toastr::success('Blog Post Added Successfully');
     return redirect()->route('posts.index');
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
        $post = Post::findOrFail($id);
        $tags = Tags::all();
        $categories = Category::all();
        return view('posts.edit',compact('post','tags','categories'));
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
        $this->validate($request,[
            'title' => 'required|max:100',
            'description' => 'required',
            'category' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category;
        $post->admin_id = Auth::user()->id;

            //Product Image Upload
    if($request->hasFile('image')){
        //get form image
        $image = $request->file('image');
        $slug = Str::slug($request->title);
        $current_date = Carbon::now()->toDateString();
        //get unique name for image
        $image_name = $slug."-".$current_date."-".time().".".$image->getClientOriginalExtension();
        //location for new image 

        $old_cropped_location = public_path('uploads/posts/single/cropped/'.$post->image);
        $old_original_location = public_path('uploads/posts/single/original/'.$post->image);
        if (File::exists($old_cropped_location)) {
            File::delete($old_cropped_location);
        }
        if (File::exists($old_original_location)) {
            File::delete($old_original_location);
        }



        $cropped_location = public_path('uploads/posts/single/cropped/'.$image_name);
        $original_location = public_path('uploads/posts/single/original/'.$image_name);
        //resize image for category and upload temp 
        Image::make($image)->fit(371,267)->save($cropped_location);
        Image::make($image)->save($original_location);
        $post->image =  $image_name;
     }
     $post->save();
     $post->tags()->sync($request->tags);
    
     Toastr::success('Blog Post Updated Successfully');
     return redirect()->route('posts.index');
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
