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
            <a href="{{ route('courses.show', $course->id) }}" type="submit" class="more">more</a>
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
