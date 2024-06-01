@extends('front.layouts.master')
@section('title', $category->name . ' Category')
@section('content')
    @include('front.widgets.articleList')
    @include('front.widgets.categoryWidget')
@endsection
