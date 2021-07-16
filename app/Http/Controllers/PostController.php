<?php
namespace App\Http\Controllers;
use App\Http\Requests\post\CreatePostRequest;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Comment;
use Symfony\Component\Console\Input\Input;
use App\Http\Requests\CreatePostsRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Artisan;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Auth::user()->role
        // $post = Post::whereId(1)->first()->comments()->create([
        //     'content' => 'comment 1'
        // ]);
        Artisan::call('home:cache');
        $categories = Category::get();
        $posts = cache('homePosts');
        $user= Auth::user();
        return view('posts.list')->with('posts',$posts)->with('categories',$categories)->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostsRequest $request)
    {
        //
        $post = new Post;
        $post->fill($request->all());
        $post->fill(['created_by' => Auth::user()->username]);
        $post->save();
        Artisan::call('home:cache');
        return redirect('posts/')->with('success',true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function commentProcess($id){
        $user= Auth::user();
        $post = Post::whereId($id)->with('comments')->first();
        return view('posts.detail')->with('post',$post)->with('users',$user);
    }
    public function comment(Request $request,$id){
        Post::whereId($id)->first()->comments()->create([
            'content' => $request->input('content'),
        ]);
        $post = Post::whereId($id)->with('comments')->first();
        return redirect()->route('posts.show',['post' => $post]);
    }
    public function show(Request $request,$id)
    {
        //
        $user= Auth::user();
        $post = Post::whereId($id)->with('comments')->first();
        return view('posts.detail')->with('post',$post)->with('users',$user);
    }

    public function showCategoryPosts($id){
        $category = Category::find($id);
        $user= Auth::user();
        return view('posts.category')->with('category',$category)->with('user',$user);
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
        $post = Post::find($id);
        $user = Auth::user();
        if ($post['created_by'] == $user['username'] || $user['role'] == 'admin'){
            return view('posts.edit')->with('post',$post);
        }
        else {
            return redirect('posts/');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreatePostsRequest $request, $id)
    {
        //
        $post = Post::find($id);
        $post->fill($request->all());
        $post->save();
        return redirect('posts/')->with('success',true);
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
        $post = Post::where('id', $id)->firstorfail()->delete();
        return redirect()->route('posts.index');
    }
}
