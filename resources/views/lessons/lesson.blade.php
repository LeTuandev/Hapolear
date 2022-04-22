<div class="lessons-list">
    <div class="course-content">
        @foreach ($lessons as $key => $lesson)
        <div class="course-content-item">
            @if (isset($request['page']))
            <p class="course-content-item-text">{{ ($request['page'] - 1) * config('filter.item_lesson') + $key + 1 }}</p>
            @else
            <p class="course-content-item-text">{{ $key + 1 }}</p>
            @endif
            <p class="course-content-item-text">{{ $lesson->name }}</p>
            <a href="{{ route('courses.lessons.show', [$courses->id, $lesson->id]) }}" class="learn d-flex justify-content-center align-items-center">learn</a>
        </div>
        @endforeach
        {{ $lessons->links('paginate.custom_paginate') }}
    </div>
</div>
