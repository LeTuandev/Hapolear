@extends('layouts.app')
@section('content')
<div class="banner">
    <div class="banner-content">
        <div class="banner-content-text">
            <p class="banner-title">Learn Anytime, Anywhere</p>
            <div class="text-icon">
                <span class="text-icon-title">at HapoLearn</span>
                <img src="{{ asset('images/group_6.png') }}" class="text-icon-owl" alt="icon-owl">
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
                    <img class="card-img-top bg-img" src="{{ $course->thumbnail }}" alt="Card image cap">
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
                    <img class="card-img-top bg-img" src="{{ $course->thumbnail }}" alt="Card image cap">
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
    <div class="viewhapolearn"><a href="#">View All Our Course <i class="fa-solid fa-arrow-right"></i></a></div>
</div>

<div class="whyhapolearn">
    <div class="whyhapolearn-top-img">
        <img src="{{ asset('images/mb_1.png') }}" class="img-mb">
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
            <img src="{{ asset('images/transparent.png') }}" alt="macbook" class="img-mb-bot">
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
                <div class="col-6 col-12">
                    <div class="feed-back-up">
                        <div class="feed-back-sort-down"></div>
                        <p class="feed-back-border"></p>
                        <p class="feed-back-up-content">
                           {{ $review->comment }}
                        </p>
                    </div>
                    <div class="feed-back-down">
                        <div class="feed-back-avatar">
                            <div class="feed-back-img">
                                <img class="feed-back-img-avt" src="{{ $review->user->avatar }}" alt="Hapo Avatar">
                            </div>
                        </div>
                        <div class="feed-back-down-content">
                            <p class="feed-back-name">{{ $review->user->name }}</p>
                            <p class="feed-back-span">{{ $review->user->job }}</p>
                            <p class="feed-back-star">
                                @for ($i = 1; $i <= $review->votes; $i++)
                                    <i class="fa-solid fa-star"></i>
                                @endfor
                                @for ($i = 5; $i > $review->votes; $i--)
                                    <i class="fa-solid fa-star star-special"></i>
                                @endfor
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="banner-bottom">
    <div class="banner-bottom-text">Becoming a member of our growing community!</div>
    <button class="btn btn-success btn-style">start learning now!</button>
</div>

<div class="statistic">
    <div class="statistic-title other-course">
        <div class="statistic-title-text other-course-title">
            <p>Statistic</p>
        </div>
    </div>
    <div class="statistic-content">
        <div class="statistic-content-item">
            <div class="statistic-content-item-lesson">Courses</div>
            <div class="statistic-content-item-coin">{{ $countCourses }}</div>
        </div>
        <div class="statistic-content-item">
            <div class="statistic-content-item-lesson">Lessons</div>
            <div class="statistic-content-item-coin">{{ $countLessons }}</div>
        </div>
        <div class="statistic-content-item">
            <div class="statistic-content-item-lesson">Learners</div>
            <div class="statistic-content-item-coin">{{ $countLearners }}</div>
        </div>
    </div>
</div>
@endsection
