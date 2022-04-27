@extends('layouts.index')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item breadcrumb-item-custom"><a href="#">Home</a></li>
      <li class="breadcrumb-item"><a href="#">All Course</a></li>
      <li class="breadcrumb-item"><a href="#">Courses Detail</a></li>
      <li class="breadcrumb-item active" aria-current="page">Lessons Detail</li>
    </ol>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="course-detail-intro">
                <img src="{{ $courses->thumbnail }}" alt="" class="course-detail-img">
                @if (Auth::user()->getCourseUser($courses->id) > 0)
                    <div>
                        <label for="file">Progress:</label>
                        <progress id="file" value="{{ $lessons->learningProgress }}" max="100"></progress>
                        <label for="file">{{ $lessons->learning_progress }}%</label>
                    </div>
                @endif
                <div id="accordion" class="course-detail-intro-content">
                    <div class="pad-bor">
                        <div class="d-flex course-detail-intro-content-item">
                            <div class="course-detail-text" id="headingOne">
                                <a href="" class="" data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    Descriptions
                                </a>
                            </div>
                            <div class="course-detail-text mar-lf" id="headingThree">
                                <a href="" class=" collapsed" data-toggle="collapse" data-target="#collapseThree"
                                    aria-expanded="false" aria-controls="collapseThree">
                                    Program
                                </a>
                            </div>
                        </div>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <div class="des-lesson">
                                <p class="des-title">Descriptions lesson</p>
                                <p class="des-content">{{ $courses->description }}</p>
                            </div>
                            <div class="des-lesson">
                                <p class="des-title">Requirements</p>
                                <p class="des-content">{{ $courses->requirement }}</p>
                            </div>
                            <div class="course-des-content-item mt-3 d-flex">
                                <p class="tag-lesson">tags:</p>
                                @foreach ($courses->tags as $key => $tag)
                                <a href="{{ $tag }}" class="tag-link">{{ '#' . $key }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            <div class="program-lesson">Program</div>
                            <div class="course-content">
                                @foreach ($programs as $program)
                                <div class="course-content-item">
                                    <p class="course-content-item-text"><img src="{{ $program->img_path }}" alt="" class="program-img"></p>
                                    <p class="lesson-type">{{ $program->type }}</p>
                                    <p class="course-content-item-text">{{ $program->name }}</p>
                                    @if (Auth::user()->getCourseUser($courses->id) > 0)
                                    <form action="{{ route('user-lesson.update', $lessons->id) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" name="program_lesson" value="1">
                                        <input type="hidden" name="documnet_id" value="{{ $program->id }}">
                                        <button type="submit" class="btn btn-success" @if ($program->document_by_user_id)
                                                disabled
                                            @endif>
                                            @if ($program->document_by_user_id)
                                                Accomplished
                                            @else
                                            complete
                                            @endif
                                        </button>
                                    </form>
                                    @endif
                                    <a href="" class="preview d-flex justify-content-center align-items-center">Preview</a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="course-des">
                <div class="course-des-content lesson-content">
                    <div class="course-des-content-item mt-3">
                        <i class="fa-solid fa-tv"></i>
                        <p class="">Courses:</p>
                        <p class="ml-3 font-course">{{ $courses->title }}</p>
                    </div>
                    <div class="course-des-content-item mt-3">
                        <i class="fa-solid fa-users"></i>
                        <p class="">learners:</p>
                        <p class="ml-3">{{ $courses->learner }}</p>
                    </div>
                    <div class="course-des-content-item mt-3">
                        <i class="fa-solid fa-rectangle-list"></i>
                        <p class="">lessons:</p>
                        <p class="ml-4">{{ $courses->lesson }}</p>
                    </div>
                    <div class="course-des-content-item mt-3">
                        <i class="fa-solid fa-clock"></i>
                        <p class="">times:</p>
                        <p class="ml-5">{{ $courses->time . ('(hours)')}}</p>
                    </div>
                    <div class="course-des-content-item mt-3">
                        <i class="fa-solid fa-key"></i>
                        <p class="">tags:</p>
                        @foreach ($courses->tags as $key=>$tag)
                        <a href="{{ $tag }}" class="ml-4">{{ '#' . $key }}</a>
                        @endforeach
                    </div>
                    <div class="course-des-content-item mt-3">
                        <i class="fa-solid fa-money-bill-1"></i>
                        <p class="">price:</p>
                        <p class="ml-5">{{ $courses->course_price }}</p>
                    </div>
                    <form action="{{ route('user-course.update', $courses->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="d-flex justify-content-center">
                            <button class="btn-end" @if (session()->has('mess_end_course'))
                                disabled
                            @endif type="submit">
                            @if (session()->has('mess_end_course'))
                                {{ session()->get('mess_end_course') }}
                            @else
                                kết thúc khóa học
                            @endif </button>
                        </div>
                    </form>
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
