@extends('layouts.index')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item breadcrumb-item-custom"><a href="#">Home</a></li>
      <li class="breadcrumb-item"><a href="#">All Course</a></li>
      <li class="breadcrumb-item active" aria-current="page">Courses Detail</li>
    </ol>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="course-detail-intro">
                <img src="{{ $courses->thumbnail }}" alt="" class="course-detail-img">
                <div id="accordion" class="course-detail-intro-content">
                    <div class="pad-bor">
                        <div class="d-flex course-detail-intro-content-item">
                            <div class="course-detail-text" id="headingOne">
                                <a href="" class="" data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    Lessons
                                </a>
                            </div>
                            <div class="course-detail-text mar-lf" id="headingThree">
                                <a href="" class="" data-toggle="collapse" data-target="#collapseThree"
                                    aria-expanded="true" aria-controls="collapseThree">
                                    teachears
                                </a>
                            </div>
                            <div class="course-detail-text mar-lf" id="headingTwo">
                                <a href="" class=" collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo">
                                    Reviews
                                </a>
                            </div>
                        </div>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <div class="d-flex  course-bot">
                                <form action="{{ route('courses.show', $courses->id) }}" method="GET">
                                    <div class="course-header course-padd">
                                        <div class="list-course-header">
                                            <div class="list-course-search"><input type="text" placeholder="search..." class="search" name="key" value=""><i class="fa-solid fa-magnifying-glass search-icon"></i></div>
                                            <button class="btn btn-search btn-mar" type="submit">tìm kiếm</button>
                                        </div>
                                    </div>
                                </form>
                                <form action="{{ route('user-course.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="course_id" value="{{ $courses->id }}">
                                    <button class="btn btn-join" @if (session()->has('mess_course'))
                                        disabled
                                    @endif type="submit">
                                    @if (session()->has('mess_course'))
                                        {{ session()->get('mess_course') }}
                                    @else
                                    tham gia khóa học
                                    @endif
                                   </button>
                                </form>
                            </div>
                            @include('lessons.lesson')
                        </div>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            <div class="teacher-title">Main Teachers</div>
                            <div>
                                @foreach ($teachers as $teacher)
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="d-flex teacher-img mt-4"><img src="{{ $teacher->avatar }}" alt="" class="w-100 rounded-circle"></div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="mt-5">
                                            <div>{{ $teacher->name }}</div>
                                            <div>
                                                <a href=""><i class="fa-brands fa-google-plus"></i></a>
                                                <a href=""><i class="fa-brands fa-facebook"></i></a>
                                                <a href=""><i class="fa-brands fa-slack"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">{{ $teacher->about }}</div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            other course
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="course-des">
                <div class="course-des-text">
                    <div class="course-des-text-title">Descriptions Course</div>
                    <div class="course-des-text-content">{{ $courses->description }}</div>
                </div>
                <div class="course-des-content">
                    <div class="course-des-content-item mt-3">
                        <i class="fa-solid fa-users"></i>
                        <p class="m-lf">learners:</p>
                        <p>{{ $courses->learner }}</p>
                    </div>
                    <div class="course-des-content-item mt-3">
                        <i class="fa-solid fa-rectangle-list"></i>
                        <p class="m-lf">lessons:</p>
                        <p>{{ $courses->lesson }}</p>
                    </div>
                    <div class="course-des-content-item mt-3">
                        <i class="fa-solid fa-clock"></i>
                        <p class="m-lf">times:</p>
                        <p>{{ $courses->time . ('(hours)') }}</p>
                    </div>
                    <div class="course-des-content-item mt-3">
                        <i class="fa-solid fa-key"></i>
                        <p class="m-lf">tags:</p>
                        @foreach ($courses->tags as $key => $tag)
                        <a href="{{ $tag }}">{{ '#' . $key }}</a>
                        @endforeach
                    </div>
                    <div class="course-des-content-item mt-3">
                        <i class="fa-solid fa-money-bill-1"></i>
                        <p class="m-lf">price:</p>
                        <p>{{ $courses->course_price }}</p>
                    </div>
                </div>
                <div class="course-des-other-course">
                    <div class="title">other course</div>
                    <div class="content">
                        <div class="content-item">
                            @foreach ($otherCourses as $key => $otherCourse)
                            <div class="d-flex pad-bot">
                                <p>{{ $key + 1 }}</p>
                                <p class="des">{{ $otherCourse->title }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn-view" type="button">view all ours course</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
