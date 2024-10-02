<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use PHPUnit\TextUI\Configuration\Php;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::all();
        $posts = Post::all();
        $comments = Comment::all();


        return view('team.index', [
            'users' => $users,
            'posts' => $posts,
            'comments' => $comments,
        ]);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'author' => 'required|string|max:30',
            'comment' => 'required|string|max:255',
            'user_id' => 'required|integer',
        ]);
    
        $post = new Post();
        $post->author_name = $validatedData['author'];
        $post->body = $validatedData['comment'];
        $post->user_id = $validatedData['user_id'];
    
        $post->save();
    
        return redirect()->back()->with('success', 'Komentarz został dodany');
    }
    
}

