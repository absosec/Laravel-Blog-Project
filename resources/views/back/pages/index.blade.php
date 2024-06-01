@extends('back.layouts.master')
@section('title', 'All Pages')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('admin.article.deleted')}}" class="btn btn-warning btn-sm  float-right"><i class="fa fa-trash"> Deleted Articles</i></a>
            <h6 class="m-0 font-weight-bold text-primary"><strong>{{$pages->count()}} pages found</strong></h6>
        </div>
        <div class="card-body">
            <div style="display: none" class="alert alert-success" id="ordersSuccess">
                Sorting updated successfully
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Arrangement</th>
                        <th>Image</th>
                        <th>Page Image</th>
                        <th>Status</th>
                        <th>Operation</th>
                    </tr>
                    </thead>
                    <tbody id="orders">
                    @foreach($pages as $page)
                        <tr id="page_{{$page->id}}">
                            <td class="text-center" style="width:5px"><i class="fa fa-arrows-alt-v handle fa-3x" style="cursor:move"></i></td>
                            <td><img src="{{asset($page->image)}}" width="200"></td>
                            <td>{{$page->title}}</td>
                            <td>
                                <input class="switch" page-id="{{$page->id}}" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" @if($page->status==1) checked @endif data-on="Active" data-off="Passive">
                            </td>
                            <td>
                                <a target="_blank" href="{{route('page', $page->slug)}}" title="View" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                <a href="{{route('admin.page.edit', $page->id)}}" title="Update" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                <form method="post" action="{{route('admin.page.delete', $page->id)}}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" href="#" title="Delete" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>
    <script>
        $('#orders').sortable({
            handle:'.handle',
            update:function (){
                var order = $('#orders').sortable('serialize');
                $.get("{{route('admin.page.order')}}?"+order, function (data, status){});
                $("#ordersSuccess").show();
                setTimeout(function() { $("#ordersSuccess").hide(); }, 1000);
            }
        });
    </script>
    <script>
        $(function() {
            $('.switch').change(function() {
                id = $(this)[0].getAttribute('page-id');
                statu = $(this).prop('checked')
                $.get("{{route('admin.page.switch')}}", {id:id, statu:statu}, function(data, status){});
            })
        })
    </script>
@endsection
