<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
    public function create() // создаем пост
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // записываем пост в бд, реквестом принимаем данные из формы
    {
        $post = new Post(); // создаем новый объект класса пост
        $post->title = $request->title;
        $post->short_title = Str::length($request->title)>30 ? Str::substr($request->title, 0, 30) . '...' : $request->title; // берем титле, если больше 30 символов, то обрезаем и берем с 0 по 30 символ, если меньше 30, то берем весь
        $post->descr = $request->descr;
        $post->author_id = rand(1,4); // пока нет рагистрации, то ставим автора рандомно от 1 до 4

        if($request->file('img')){
            $path = Storage::putFile('public', $request->file('img')); // соединяем путь и имя файла
            $url = Storage::url($path); // создаем урл
            $post->img = $url; //сохраняем в базу путь
        }

        $post->save(); // сохраняем данные в базу

        return redirect()->route('post.index')->with('success', 'Запись успешно создана!'); // после сохранения перекидываем на главную, если сохранчяем без ошибок, сохраняем ключ success и редиректимся
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id); // делаем запрос по модели в таблицу пост по ид который получаем из вьюшки индекс
        return view('posts.show', compact('post')); // переходим на вьюшку пост
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
