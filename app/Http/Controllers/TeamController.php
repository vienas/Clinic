<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;


class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::paginate(8);
        $posts = Post::paginate(5);

        return view('team.index', [
            'users' => $users,
            'posts' => $posts,
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
    
        return redirect()->route('team.edit', ['id' => $validatedData['user_id']])->with('message', 'Twój komentarz został dodany!');
    }

    public function edit(int $id)
    {  
        $users = User::findOrFail($id);
        return view('team.edit', ['users' => $users]);
        
    }
    
}

