@extends('back.layouts.master')
@section('title', $article->title . ' makalesini güncelle')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3"></div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </div>
            @endif
            <form method="POST" action="{{route('admin.articles.update', $article->id)}}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Article Image</label>
                    <input type="text" name="title" value="{{$article->title}}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Article Category</label>
                    <select class="form-control" name="category_id" required>
                        <option>Choose</option>
                        @foreach($categories as $category)
                            <option @if($article->category_id == $category->id) selected
                                    @endif value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Article Image</label><br>
                    <img src="{{asset($article->image)}}" width="300" class="img-thumbnail rounded">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label>Article Content</label>
                    <textarea rows="4" name="content" id="editor" class="form-control"
                              required>{!! $article->content !!}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Update Article</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#editor').summernote(
                {'height': 300}
            );
        });
    </script>
@endsection
