@extends('layouts.index')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item breadcrumb-item-custom"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('courses.index')}}">All Course</a></li>
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
                                    @if ($courses->getStatusCourseAttribute() == 1)
                                        <button class="btn btn-join" disabled type="submit">
                                            JOINED
                                        </button>
                                    @elseif ($courses->getStatusCourseAttribute() == 2)
                                        <button class="btn btn-join" disabled type="submit">
                                            FINISHED
                                        </button>
                                    @else
                                        <button type="button" class="btn ml-5 btn-join" data-toggle="modal" data-target="#exampleModal">
                                            Tham gia khóa học
                                        </button>
                                    @endif
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content bg-white">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapo Learn</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Do you want to register for the course?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submmit" class="btn btn-primary">Tham gia khóa học</button>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
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
                            <div class="program-lesson border-bottom"><label for="">{{ $reviewCounts }}</label> Reviews</div>
                            <div class="row mt-3 border-bottom pb-3">
                                <div class="col-md-4">
                                    <div class="d-flex flex-column justify-content-center align-items-center review-img">
                                        <div class="text-vote">{{ $reviewAvg }}</div>
                                        <div class="icon-star">
                                            @for ($i = 1; $i <= $reviewAvg; $i++)
                                            <i class="ratings_stars fa fa-star text-warning" data-rating="1"></i>
                                            @endfor
                                            @for ($i = 5; $i > $reviewAvg; $i--)
                                            <i class="fa-solid fa-star star-special"></i>
                                            @endfor
                                        </div>
                                        <div class="program-rating">{{ $reviewCounts }} Rattings</div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="progress-items p-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-3">5 Stars</div>
                                            <div class="col-md-7">
                                                <div class="progress ml-progress">
                                                    <div class="progress-bar" role="progressbar"  style="width: {{ $voteFive }}%" aria-valuenow="{{ $voteFive }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">{{ $voteCountFive }}</div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-md-3">4 Stars</div>
                                            <div class="col-md-7">
                                                <div class="progress ml-progress">
                                                    <div class="progress-bar" role="progressbar" style="width: {{ $voteFour }}%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">{{ $voteCountFour }}</div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-md-3">3 Stars</div>
                                            <div class="col-md-7">
                                                <div class="progress ml-progress">
                                                    <div class="progress-bar" role="progressbar" style="width: {{ $voteThree }}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">{{ $voteCountThree }}</div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-md-3">2 Stars</div>
                                            <div class="col-md-7">
                                                <div class="progress ml-progress">
                                                    <div class="progress-bar" role="progressbar" style="width: {{ $voteTwo }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">{{ $voteCountTwo }}</div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-md-3">1 Stars</div>
                                            <div class="col-md-7">
                                                <div class="progress ml-progress">
                                                    <div class="progress-bar" role="progressbar" style="width: {{ $voteOne }}%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">{{ $voteCountOne }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mt-3">
                                        <label class="title-review">Show All Reviews</label>
                                        <i class="fa-solid fa-caret-down"></i>
                                    </div>
                                    @foreach ($reviews as $review)
                                    <div class="border-bottom pb-3">
                                        <div class="d-flex align-items-center mt-3">
                                            <div class="d-flex"><img class="user-img rounded-circle" src="{{ $review->user->avatar }}" alt=""></div>
                                            <div class="ml-3 title-review">{{ $review->user->name}}</div>
                                            <div class="ml-3">
                                                @for ($i = 1; $i <= $review->votes; $i++)
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                    @endfor
                                                    @for ($i = 5; $i > $review->votes; $i--)
                                                        <i class="fa-solid fa-star text-light"></i>
                                                    @endfor
                                            </div>
                                            <div class="ml-3 time-review">{{ $review->user->created_at}}</div>
                                        </div>
                                        <div class="mt-3">
                                            {{ $review->comment }}
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="leave-review mt-4">
                                        <form action="{{ route('course_review.store') }}" method="POST">
                                            @csrf
                                            <div class="title-leave-review">Leave a review</div>
                                            <div class="mt-3">message</div>
                                            <input type="hidden" name="course_id" value="{{ $courses->id }}">
                                            <input type="text" class="w-100 h-input border" name="about" value="">
                                            <input type="hidden" id="rating" name="rating" value="0">
                                            <div class="rating d-flex align-items-center mt-4">
                                                <span>Vote</span>
                                                <div class="ml-4">
                                                    <i class="ratings_stars fa fa-star" data-rating="1"></i>
                                                    <i class="ratings_stars fa fa-star" data-rating="2"></i>
                                                    <i class="ratings_stars fa fa-star" data-rating="3"></i>
                                                    <i class="ratings_stars fa fa-star" data-rating="4"></i>
                                                    <i class="ratings_stars fa fa-star" data-rating="5"></i>
                                                </div>
                                                <span class="ml-4">(stars)</span>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn-send border border-white p-2">send</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
