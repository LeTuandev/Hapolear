@extends('layouts.index')
@section('content')
<form action="{{ route('user-profile.update', Auth::user()->id) }}" method="POST"  enctype="multipart/form-data">
    @csrf
@method('PUT')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="position-relative">
                <img src="{{ Auth::user()->avatar }}" alt="" id="image" class="rounded-circle user-imgs">
                <div class="element position-absolute user-icon">
                    <label for="fileInput"><i class="fa fa-camera"></i></label>
                    <input type="file" name="file" id="fileInput" class="ip-none">
                </div>
            </div>
            <div class="mt-3 border-bottom pb-2">
                <div class="user-name">{{ Auth::user()->fullname }}</div>
                <div class="ml-5 user-email mt-2">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-4">
                <div class="border-bottom pb-3">
                    <i class="fa-solid fa-cake-candles text-danger"></i>
                    <span class="ml-4 text-hapo">{{ Auth::user()->birth }}</span>
                </div>
                <div class="border-bottom pb-3 mt-3">
                    <i class="fa-solid fa-phone text-success"></i>
                    <span class="ml-4 text-hapo">{{ Auth::user()->phone }}</span>
                </div>
                <div class="border-bottom pb-3 mt-3">
                    <i class="fa-solid fa-house-chimney text-second"></i>
                    <span class="ml-4 text-hapo">{{ Auth::user()->address }}</span>
                </div>
                <div>{{ Auth::user()->about }}</div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="my-course">
                <span class="title">My Course</span>
            </div>
            <div class="my-course mt-2"></div>
            <div class="d-flex justify-content-center mt-4 flex-wrap">
                @foreach ($courses as $course )
                <a href="" class="ml-4 text-decoration-none">
                    <img src="{{ $course->thumbnail }}" alt="" class="user-course-img rounded-circle" >
                    <p class="text-center mt-2 user-course-name">{{ $course->title }}</p>
                </a>
                @endforeach
                <a href="{{ route('courses.index') }}" class="ml-4 text-decoration-none d-flex align-items-center justify-content-center rounded-circle plush">
                    <i class="fa-solid fa-plus icon"></i>
                </a>
            </div>
            <div class="my-course mt-5">
                <span class="title">Edit Profile</span>
            </div>
            <div class="my-course mt-2"></div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="mt-4">
                            <p>Name:</p>
                            <input type="text" class="w-100 @error('name')
                            in-valid
                        @enderror" placeholder="name" name="name" >
                            @if ($errors->has('name'))
                            <p class="mess-danger">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                        <div class="mt-4">
                            <p>Date of birthday:</p>
                            <input type="date" class="w-100 @error('date')
                            in-valid
                        @enderror" placeholder="mm/dd/yyyy" name="date">
                            @if ($errors->has('date'))
                            <p class="mess-danger">{{ $errors->first('date') }}</p>
                            @endif
                        </div>
                        <div class="mt-4">
                            <p>Address:</p>
                            <input type="text" class="w-100 @error('address')
                            in-valid
                        @enderror" placeholder="address" name="address">
                            @if ($errors->has('address'))
                            <p class="mess-danger">{{ $errors->first('address') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mt-4">
                            <p>Email:</p>
                            <input type="email" class="w-100 @error('email_update')
                            in-valid
                        @enderror" placeholder="email" name="email_update">
                            @if ($errors->has('email_update'))
                            <p>{{ $errors->first('email_update') }}</p>
                            @endif
                        </div>
                        <div class="mt-4">
                            <p>Phone:</p>
                            <input type="text" class="w-100 @error('phone')
                            in-valid
                        @enderror" placeholder="phone" name="phone">
                            @if ($errors->has('phone'))
                            <p class="mess-danger">{{ $errors->first('phone') }}</p>
                            @endif
                        </div>
                        <div class="mt-4">
                            <p>About me:</p>
                            <input type="text" class="w-100 h-about @error('about')
                            in-valid
                        @enderror" placeholder="about me" name="about">
                            @if ($errors->has('about'))
                            <p class="mess-danger">{{ $errors->first('about') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="mt-5 d-flex justify-content-end"><button type="submit" class="reset-btn">update</button></div>
            </div>
    </div>
</div>
</form>
@endsection
