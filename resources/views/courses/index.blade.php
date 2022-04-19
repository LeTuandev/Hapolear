@extends('layouts.index')
@section('content')
    <div class="container course-header">
        <form class="form" method="GET" action="{{ route('courses.index')}}">
            <div class="list-course-header">
                    <button class="btn filter" type="button"><i class="fa-solid fa-sliders"></i>filter</button>
                    <div class="list-course-search"><input type="text" placeholder="search..." class="search" name="key" value="{{ $request->key }}"><i class="fa-solid fa-magnifying-glass search-icon"></i></div>
                    <button class="btn btn-search" type="submit">tìm kiếm</button>
            </div>
            <div class="show-filter">
                <p class="text-filter">Lọc theo</p>
                <div>
                <input type="radio" name="created_time" id="new" value="desc" @if ($request->created_time == config('filter.sort.desc') || is_null($request->created_time))
                    checked
                @endif>
                <label for="new">Mới nhất</label>
                <input type="radio" name="created_time" id="old" value="asc" @if ($request->created_time == config('filter.sort.asc'))
                    checked
                @endif>
                <label for="old">cũ nhất</label>
                <select class="teacher" name="teacher">
                    <option value="{{ $request->teacher }} ">teacher</option>
                    @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}" @if ($request->teacher == $teacher->id)
                        selected
                    @endif>{{ $teacher->name }}</option>
                    @endforeach
                </select>
                <select class="learners" name="learner">
                    <option value="{{ $request->learner }}">số người học</option>
                    <option value="{{ config('filter.sort.asc') }}" @if ($request->learner == config('filter.sort.asc'))
                        selected
                    @endif>tăng dần</option>
                    <option value="{{ config('filter.sort.desc') }}" @if ($request->learner == config('filter.sort.desc'))
                        selected
                    @endif>giảm dần</option>
                </select>
                <select class="times" name="learn_time">
                    <option value="{{ $request->learn_time}}">thời gian học</option>
                    <option value="{{ config('filter.sort.asc') }}" @if ($request->learn_time == config('filter.sort.asc'))
                        selected
                    @endif>tăng dần</option>
                    <option value="{{ config('filter.sort.desc') }}" @if ($request->learn_time == config('filter.sort.desc'))
                        selected
                    @endif>giảm dần</option>
                </select>
                <select class="lessons" name="lesson">
                    <option value="{{ $request->lesson}}">số bài học</option>
                    <option value="{{ config('filter.sort.asc') }}" @if ($request->lesson == config('filter.sort.asc'))
                        selected
                    @endif>tăng dần</option>
                    <option value="{{ config('filter.sort.desc') }}" @if ($request->lesson == config('filter.sort.desc'))
                        selected
                    @endif>giảm dần</option>
                </select>
                <select class="tags" name="tag">
                    <option value="{{ $request->tag }}">tags</option>
                    @foreach ($teachers as $tag)
                    <option value="{{ $tag->id }}" @if ($request->tag == $tag->id)
                        selected
                    @endif>{{ $tag->name }}</option>
                    @endforeach
                </select>
                </div>
            </div>
        </form>
        <div class="list-course-content">
            <div class="row">
                @foreach ($courses as $course )
                    @include('courses.list_course')
                @endforeach
            </div>
            {{ $courses->links('paginate.custompaginate') }}
            @if (count($courses->items()) == 0)
                <div>NOT COURSE FOUND</div>
            @endif
        </div>
    </div>
@endsection
