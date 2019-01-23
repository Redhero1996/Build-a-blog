<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Purifier;
use Session;
use App\Post;
use App\Tag;
use App\Category;
use Image;
use Storage;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create', ['categories' => $categories, 'tags' => $tags ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        // store in the database
        $post = Post::create([
            'title' => $request->title,
            'slug' => str_slug($request->slug),
            'category_id' => $request->category_id,
            'body' => Purifier::clean($request->body),
        ]);

        // save our image
        if($request->hasFile('featured_image')){
            $image = $request->file('featured_image');

            // getClientOriginalExtension(): Truy xuất phần mở rộng của một tệp tải lên
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);

            Image::make($image)->resize(800, 400)->save($location);

            $post->image = $filename;
        }

        $post->save();

        //update toàn bộ pivot table: sync()
        $post->tags()->sync($request->tags, false);

        $request->session()->flash('success', 'The blog was successfully save!');
        // redirect to another page
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        $categories = Category::all();        
        $cats = [];
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $tags2 = [];
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }

        return view('posts.edit', [ 'post' => $post, 'categories' => $cats, 'tags' => $tags2]);
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
        $post = Post::find($id);

        // if($request->slug == $post->slug){
        //     $request->validate([
        //         'title'       => 'required|max:255',
        //         'body'        => 'required',
        //         'category_id' => 'required|integer',
        //     ]);
        // }else{            
            // validate the data
            $request->validate([
                'title'       => 'required|max:255',
                'slug'        => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
                'category_id' => 'required|integer',
                'body'        => 'required'
            ]);
        // }
        // Save the data to the database
        
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = Purifier::clean($request->body);

        if($request->file('featured_image')){
            $image = $request->file('featured_image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(800,400)->save($location);
            // get the old photo
            $oldImage = $post->image;
            // update the database
            $post->image = $filename;
            // delete the old photo
            Storage::delete($oldImage);
        }

        $post->save();

        // Kiem tra xem co the tag ben trong k
        if(isset($request->tags)){           
            $post->tags()->sync($request->tags);
        }else{
            // da xoa het or k co
            $post->tags()->sync([]);
        }

        // set flash data with success message
        Session::flash('success', 'The blog was successfully updated!');
        // redirect with flash data to posts.show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        
        Storage::delete($post->image);
        $post->delete();
        
        Session::flash('success', 'The blog was successfully deteled');
        return redirect()->route('posts.index');
    }
}
