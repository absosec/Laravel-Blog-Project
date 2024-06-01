<!-- Main Content-->
@extends('front.layouts.master')
@section('title', 'Homepage')
@section('content')
    @include('front.widgets.articleList')
    @include('front.widgets.categoryWidget')
@endsection
