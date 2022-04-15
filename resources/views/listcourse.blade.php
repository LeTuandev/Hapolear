@extends('layouts.app')
@section('content')
    <div class="container course-header">
        <div class="list-course-header">
            <a href="#" type="button" class="filter"><i class="fa-solid fa-filter"></i>filter</a>
            <input type="text" placeholder="search..." class="search">
            <a href="#" type="button" class="btn-search">tìm kiếm</a>
        </div>
        <div class="list-course-content">
            <div class="row">
                @foreach ($courses as $course )
                <div class="col-md-6 pad-course">
                    <div class="bor-course">
                        <div class="course">
                            <div class="thumbnail">
                                <div class="thumbnail-img"><img src="{{ $course->thumbnail }}" alt=""></div>
                            </div>
                            <div class="detail">
                                <div class="name">{{ $course->title }}</div>
                                <div class="des">{{ $course->description }}</div>
                            </div>
                        </div>
                        <div class="btn-more">
                            <a href="#" type="button" class="more">more</a>
                        </div>
                        <div class="course-items">
                            <div class="learner">
                                <p class="learner-name">learners</p>
                                <p class="learner-number">{{ $course->learner }}</p>
                            </div>
                            <div class="lesson">
                                <p class="lesson-name">lessons</p>
                                <p class="lesson-number">{{ $course->lesson }}</p>
                            </div>
                            <div class="time">
                                <p class="time-name">times</p>
                                <p class="time-number">{{ $course->time. '(h)' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{ $courses->links('paginate.custompaginate') }}
        </div>
    </div>
@endsection
