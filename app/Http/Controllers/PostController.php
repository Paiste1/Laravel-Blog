<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) // добавлем для поиска
    {
        if($request->search){
            $posts =Post::join('users', 'author_id', '=', 'users.id')  // так же объединяем таблицы
                ->where('title', 'like', '%'.$request->search.'%') // поиск по титлу
                ->orWhere('descr', 'like', '%'.$request->search.'%') // по описанию
                ->orWhere('name', 'like', '%'.$request->search.'%') // и по имени автора
                ->orderBy('posts.created_at', 'desc')  // сортировка в обратном порядке
                ->get();
            return view('posts.index', compact('posts'));
        }

        $posts =Post::join('users', 'author_id', '=', 'users.id')  // джоиним таблицу юзерс и полем автор_ид к юзерс.ид
            ->orderBy('posts.created_at', 'desc')  // сортировка в обратном порядке
            ->paginate(4); // пагинация по 4 поста на страницу после в шаблоне вывести пагинацию {{ $posts->links() }}
        return view('posts.index', compact('posts'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
