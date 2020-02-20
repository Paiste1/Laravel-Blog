@extends('layouts.layout')

@section('content')
    @if(isset($_GET['search'])) <!-- если в адресной строке есть ключ search, то выводим... -->
        @if(count($posts) > 0)
            <h2>Результаты поиска по запросу <b>" <?=$_GET['search'];?> "</b></h2>
            <p class="lead">Всего найдено {{ count($posts) }} пост(ов)</p>
        @else
            <h2>По запросу <b>" <?=$_GET['search'];?> "</b> ничего не найдено...</h2>
            <a href="{{ route('post.index') }}" class="btn btn-outline-primary">Отобразить все посты</a>
        @endif
    @endif

    <div class="row">
        @foreach($posts as $post)
        <div class="col-6">
            <div class="card">
                <div class="card-header"><h2>{{ $post->short_title }}</h2></div>
                <div class="card-body">
                    <div class="card-img" style="background-image: url({{ $post->img ?? asset('img/default.jpg') }})"></div>
                    <div class="card-author">Автор: {{ $post->name }}</div>
                    <a href="{{ route('post.show', ['id' => $post->post_id]) }}" class="btn btn-primary">Подробнее...</a> <!--переходим по ид поста -->
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if(!isset($_GET['search'])) <!-- если в адресной строке нет ключа search, то выводим пагинацию -->
        {{ $posts->links() }}
    @endif
@endsection
