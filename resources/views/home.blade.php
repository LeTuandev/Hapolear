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
                <div class="card-header-img">
                    <img class="card-img-top bg-img" src="{{ $course->thumbnail}}" alt="Card image cap">
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

<div class="other-course">
    <div class="other-course-title">
       <p>Other course</p>
    </div>
    <div class="container list-course-container">
        <div class="card-deck">
            @foreach ($courses as $course)
            <div class="card text-center">
                <div class="card-header-img">
                    <img class="card-img-top bg-img" src="{{$course->thumbnail}}" alt="Card image cap">
                </div>
                <div class="card-body">
                    <p class="card-title font-size-title">{{$course->title}}</p>
                    <p class="card-text font-size-text">{{$course->description}}</p>
                    <a href="#" class="btn  btn-course">Take this course</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="viewhapolearn"><a href="#">View All Our Course <i class="fa-solid fa-arrow-right"></i></a></div>
</div>

<div class="whyhapolearn">
    <div class="whyhapolearn-top-img">
        <img src="{{asset('images/mb_1.png')}}" class="img-mb">
    </div>
    <div class="whyhapolearn-top-text">Why HapoLearn?</div>
    <div class="whyhapolearn-bottom">
        <div class="whyhapolearn-bottom-text">
            <p class="whyhapolearn-bottom-text-list font-hapolearn"> Why HapoLearn?</p>
            <p class="whyhapolearn-bottom-text-list"> <i class="fa-solid fa-circle-check"></i> interactive lessons,
                "on the go" practice, peer support</p>
            <p class="whyhapolearn-bottom-text-list"> <i class="fa-solid fa-circle-check"></i> interactive lessons,
                "on the go" practice, peer support</p>
            <p class="whyhapolearn-bottom-text-list"> <i class="fa-solid fa-circle-check"></i> interactive lessons,
                "on the go" practice, peer support</p>
            <p class="whyhapolearn-bottom-text-list"> <i class="fa-solid fa-circle-check"></i> interactive lessons,
                "on the go" practice, peer support</p>
        </div>
        <div class="whyhapolearn-bottom-img">
            <img src="{{asset('images/transparent.png')}}" alt="macbook" class="img-mb-bot">
        </div>
    </div>
</div>

<div class="hapo-feedback">
    <div class="container">
        <div class="hapo-feedback-header">
            <a class="feed-back-header-title">Feedback</a>
            <p class="feed-back-header-content">What other students turned professionals have to say about
                us
                <br> after learning with us and reaching their goals
            </p>
        </div>
        <div class="hapo-feed-back-body">
            <div class="row slick">
                @foreach ($reviews as $review)
                {{dd($review->user->name)}}
                <div class="col-6 col-12">
                    <div class="feed-back-up">
                        <p class="feed-back-border"></p>
                        <p class="feed-back-up-content">
                            “A wonderful course on how to start. Eddie beautifully conveys all essentials of
                            a
                            becoming a good Angular developer. Very glad to have taken this course. Thank
                            you
                            Eddie Bryan.”
                        </p>
                    </div>
                    <div class="feed-back-down">
                        <div class="feed-back-img">
                            <img src="./images/ellipse_1.png" alt="Hapo Avatar">
                        </div>
                        <div class="feed-back-down-content">
                            <p class="feed-back-name">Tuan Tran Hoang</p>
                            <p class="feed-back-span">PHP</p>
                            <p class="feed-back-star">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star star-special"></i>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
