<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Pobranie wszystkich użytkowników, postów i komentarzy
        $users = User::all();
        $posts = Post::all();
        $comments = Comment::all();

        // Przekazanie danych do widoku
        return view('team.index', [
            'users' => $users,
            'posts' => $posts,
            'comments' => $comments,
        ]);
    }
}

