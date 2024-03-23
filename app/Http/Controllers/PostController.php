<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index', [
            //"posts" => Post::with('bodyUser')->orderBy('id', 'desc')->get()
            'posts' => Post::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function newTask(Request $request)
    {
        $validatedData = $request->validate([
            'body' => 'required|max:255',
            'category' => 'required',
            'deadline' => 'required'
        ]);

        // user_id pada tabel posts berisi id user yang digunakan 
        $validatedData['user_id'] = auth()->user()->id;


        Post::create($validatedData);

        return redirect('/posts')->with('success', 'New a task has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return redirect('/posts')->with('success', 'Post has been deleted.');
    }

    public function checkboxPost(Request $request, $id)
    {
        $request->validate(['checked' => 'required|boolean']);

        $checked = $request->input('checked');

        // Temukan post berdasarkan ID
        $post = Post::findOrFail($id);

        // Lakukan tindakan sesuai dengan data yang diterima
        $post->status = $checked ? 'completed' : $post->NULL;
        $post->save();

        // Kembalikan respons jika diperlukan
        return redirect('/posts')->with('checked');
    }
}
