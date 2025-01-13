<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('index');
    }
    public function index()
    {
        // $posts = DB::select("SELECT * FROM posts where id = ? ", [1]);
        //chaining method
        return view('blog.usersAllBlogs', [
            'posts' => Post::orderBy('created_at', 'desc')->get()
        ]);
    }
    public function adminIndex()
    {
        // $posts = DB::select("SELECT * FROM posts where id = ? ", [1]);
        //chaining method
        return view('admin.index', [
            'posts' => Post::orderBy('created_at', 'desc')->get()
        ]);
    }
    public function adminDashboard()

    {
        // $posts = DB::select("SELECT * FROM posts where id = ? ", [1]);
        //chaining method
        return view('admin.front');
    }
    public function login()
    {

        return view('components.login');
    }
    public function signup()
    {

        return view('components.signup');
    }

    public function createBlog()
    {
        // dd("hello world");
        return view('blog.create');
    }

    public function storeBlog(Request $request)
    {

        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'min_to_read' => 'required|integer|min:1|max:59',
            'body' => 'required|string',
            'image' => ['required', 'max:2048', 'mimes:jpg,png,jpeg'], // Image validation
            'is_published' => '', // Accepts 'on' if the checkbox is checked
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->excerpt = $request->excerpt;
        $post->min_to_read = $request->min_to_read;
        $post->body = $request->body;
        $post->image_url = $this->storeImage($request);
        $post->is_published = $request->is_published === 'on' ? 1 : 0;
        $post->save();

        return redirect()->route('blog.index')->with('success', 'Post created successfully!');
    }
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:500|unique:users,email', // Ensures the email is unique in the users table
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',         // Password confirmation
            ],
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // Hash the password before saving
        $user->save();

        return redirect()->route('login')->with('success', 'User created successfully!');
    }
    public function loginSuccess(Request $request)
    {
        // Validate the login credentials
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in the user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Regenerate the session to prevent session fixation
            $request->session()->regenerate();

            // Redirect based on user role
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.front')->with('success', 'Welcome, Admin!');
            } else if ($user->role === 'user') {
                return redirect()->route('home')->with('success', 'Welcome back!');
            }

            // Handle unexpected roles
            return redirect()->route('home')->with('error', 'Unknown role.');
        }

        // If authentication fails, redirect back with an error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }


    public function editBlog($id)
    {
        $post = Post::findOrFail($id);
        return view('blog.update', compact('post'));
    }
    public function showBlog($id)
    {
        $post = Post::findOrFail($id);
        $comments = Comment::where('post_id', $id)->with('user')->latest()->get();

        return view('blog.show', compact('post', 'comments'));
    }


    public function updateBlog(Request $request, $id)
    {

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->excerpt = $request->excerpt;
        $post->min_to_read = $request->min_to_read;
        $post->body = $request->body;
        $path = $this->storeNewImageandDeleteOldOne($request, $post);
        $post->image_url = $path;
        $post->is_published = $request->is_published === 'on' ? 1 : 0;

        $post->save();
        return redirect()->route('blog.index', $post->id)->with('success', 'Post updated successfully!');
    }
    function storeNewImageandDeleteOldOne($request, $post)
    {

        if ($request->hasFile('image_url')) {
            $oldImagePath = $post->image_url;

            // Generate a unique file name using uniqid and the image's original name
            $newImageName = uniqid() . '_' . $request->title . '.' . $request->image_url->extension();
            // dd($newImageName);

            // Move the image to the 'public/images' directory
            $request->image_url->move(public_path('images'), $newImageName);

            // Delete the old image if it exists
            if ($oldImagePath && file_exists(public_path($oldImagePath))) {
                unlink(public_path($oldImagePath)); // Delete the old image
            }

            // Return the relative path to save in the database
            return 'images/' . $newImageName;
        }

        // If no new image is uploaded, return the current image URL
        return $post->image_url;
    }

    public function storeComment(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:500',
        ]);

        // Check if the user has already commented on this post
        $existingComment = Comment::where('post_id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($existingComment) {
            return redirect()->back()->withErrors([
                'comment' => 'You have already commented on this post.',
            ]);
        }

        // Create the new comment
        Comment::create([
            'post_id' => $id,
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'content' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Your comment has been posted!');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function deleteBlog($id)
    {
        // dd($id);
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('admin.index')->with('success', 'Post deleted successfully!');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
        // return redirect()->route('login')->with('success', 'Logout successful!');
    }
    private function storeImage($request)
    {
        // Generate a unique file name using uniqid and the image's original name
        $newImageName = uniqid() . '_' . $request->title . '.' . $request->image->extension();

        // Move the image to the 'public/images' directory
        $request->image->move(public_path('images'), $newImageName);

        // Return only the relative path to save in the database
        return 'images/' . $newImageName;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
