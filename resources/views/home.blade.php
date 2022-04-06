@extends('layouts.index')

@section('content')
<div class="banner">
    <div class="banner-content">
        <div class="banner-content-text">
            <p class="banner-title">Learn Anytime, Anywhere</p>
            <div class="text-icon">
                <span class="text-icon-title">at HapoLearn</span>
                <img src="{{asset('images/group_6.png')}}" class="text-icon-owl" alt="icon-owl">
                <span class="text-icon-title">!</span>
            </div>
            <div class="text-description">
                <p class="description">interactive lessons, "on the go" <br /> practice, peer support</p>
            </div>
            <button class="btn btn-success btn-style">start learning now!</button>
        </div>
        <div></div>
    </div>
    <div class="banner-gradient"></div>
</div>

<div class="list-course">
    <div class="container list-course-container">
        <div class="card-deck">
            @foreach ($courses as $course)
            <div class="card text-center">
                <div class="card-header">
                    <div class="img">
                        <img class="card-img-top bg-html" src="{{}}" alt="Card image cap">
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-title font-size-title">{{ $course->title }}</p>
                    <p class="card-text font-size-text">{{ $course->description }}</p>
                    <a href="#" class="btn  btn-course">Take this course</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
