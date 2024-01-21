<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('checkAdminRole:administrator')->only('update');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::orderBy('id', 'desc')->get();
        return view('admin.post.index',[
            'post' => $post
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        if ($request->createNewBlog()) {
            Alert::success('success', 'Blog created successfully');
            return redirect(route('admin.Post.index'));
        }   else {
            Alert::error('error', 'Blog creation failed');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        try{
            $post = Post::findOrFail($id);
            return view('admin.post.edit',[
               'post'=>$post,
            ]);
            Alert::success('success', 'Edited Success');
        }catch(\Exception $exception){
            Log::info($exception->getMessage());
            Alert::error('error', 'Something went worry');
        }
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
        try{
            $post = Post::findOrFail($id);
            $post->update([
              'title'=>$request->input('title'),
              'author'=>$request->input('author'),
              'body'=>$request->input('body'),
              'slug'=>Str::slug($request->input('title')),
              'publish'=>$request->input('publish') ? 1 : 0,
              'image'=>update_image('blogger',$post->image , 'image'),
            ]);
            Alert::success('success', 'Updated Successful');
            return redirect(route('admin.Post.index'));
          }catch(\Exception $exception){
              Log::error($exception->getMessage());
              Alert::error('error', 'Oops something went wrong');
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $post = Post::findOrFail($id);
            $post->delete();
            Alert::success('success', 'Delete Successfully');
            return redirect()->route('admin.Post.index');
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            Alert::error('error', 'Something Went Worry');
            return back();
        }
    }
}
