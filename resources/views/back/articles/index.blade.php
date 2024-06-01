@extends('back.layouts.master')
@section('title', 'All Articles')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('admin.article.deleted')}}" class="btn btn-warning btn-sm  float-right"><i
                    class="fa fa-trash"> Deleted Articles</i></a>
            <h6 class="m-0 font-weight-bold text-primary"><strong>{{$articles->count()}} articles found</strong></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Article Image</th>
                        <th>Category</th>
                        <th>Hit</th>
                        <th>Creation Date</th>
                        <th>Status</th>
                        <th>Operation</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td><img src="{{asset($article->image)}}" width="200"></td>
                            <td>{{$article->title}}</td>
                            <td>{{$article->getCategory->name}}</td>
                            <td>{{$article->hit}}</td>
                            <td>{{$article->created_at->diffForHumans()}}</td>
                            <td>
                                <input class="switch" article-id="{{$article->id}}" type="checkbox"
                                       data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                       @if($article->status==1) checked @endif data-on="Active" data-off="Passive">
                            </td>
                            <td>
                                <a target="_blank"
                                   href="{{route('single', [$article->getCategory->slug, $article->slug])}}"
                                   title="View" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                <a href="{{route('admin.articles.edit', $article->id)}}" title="View"
                                   class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                <form method="post" action="{{route('admin.articles.destroy', $article->id)}}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" href="#" title="Delete" class="btn btn-sm btn-danger"><i
                                            class="fa fa-times"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection

@section('js')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
        $(function () {
            $('.switch').change(function () {
                id = $(this)[0].getAttribute('article-id');
                statu = $(this).prop('checked')
                $.get("{{route('admin.article.switch')}}", {id: id, statu: statu}, function (data, status) {
                });
            })
        })
    </script>
@endsection
