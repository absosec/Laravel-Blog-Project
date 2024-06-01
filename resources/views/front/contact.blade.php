<!-- Main Content-->
@extends('front.layouts.master')
@section('title', 'İletisim')
@section('bg', 'https://st2.depositphotos.com/3343907/7659/i/950/depositphotos_76595719-stock-photo-contact-me-text-concept.jpg')
@section('content')
    <div class="col-md-8">
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <p>You can contact us</p>
        <form method="POST" action="{{route('contact.post')}}">
            @csrf
            <div class="control-group">
                <div class="form-group  controls">
                    <label>Name & Surname</label>
                    <input type="text" class="form-control" value="{{old('name')}}" placeholder="Your name & surname" name="name" required >
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group  controls">
                    <label>E-mail address</label>
                    <input type="email" class="form-control" value="{{old('email')}}" placeholder="Your e-mail address" name="email" required >
                </div>
            </div>
            <div class="control-group">
                <div class="form-group col-xs-12  controls">
                    <label>Subject</label>
                    <select class="form-control" name="topic">
                        <option @if(old('topic') == "Info") selected @endif>Info</option>
                        <option @if(old('topic') == "Support") selected @endif>Support</option>
                        <option @if(old('topic') == "General") selected @endif>Genel</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group  controls">
                    <label>Your message</label>
                    <textarea rows="5" name="message" class="form-control" placeholder="Your message">{{old('message')}}</textarea>
                </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" id="sendMessageButton">Submit</button>
            </div>
        </form>
    </div>
@endsection
