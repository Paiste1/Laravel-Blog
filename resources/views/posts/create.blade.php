@extends('layouts.layout')

@section('content')
    <form action=" {{ route('post.store') }}" method="POST" enctype="multipart/form-data">
        @csrf <!-- защита от атак -->
        <h3>Создать пост</h3>
        <div class="form-group">
            <input name="title" type="text" class="form-control" required>
        </div>
        <div class="form-group">
            <textarea name="descr"rows="10" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <input type="file" name="img">
        </div>

        <input type="submit" value="Создать" class="btn btn-outline-success">
    </form>
@endsection
