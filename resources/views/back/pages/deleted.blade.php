@extends('back.layouts.master')
@section('title', 'Deleted Articles')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('admin.articles.index')}}" class="btn btn-primary btn-sm  float-right"><i class="fa fa-trash"> Undeleted Articles</i></a>
            <h6 class="m-0 font-weight-bold text-primary"><strong>{{$articles->count()}} pages found</strong></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Page Image</th>
                        <th>Category</th>
                        <th>Hit</th>
                        <th>Creation Date</th>
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
                                <a href="{{route('admin.article.recover', $article->id)}}" title="Silmekten Kurtar" class="btn btn-sm btn-primary"><i class="fa fa-recycle"></i></a>
                                <form method="post" action="{{route('admin.article.hard.delete', $article->id)}}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" href="#" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
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
