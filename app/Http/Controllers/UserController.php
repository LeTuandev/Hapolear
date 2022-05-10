<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cloudinary;
use App\Http\Requests\UpdateRequest;

class UserController extends Controller
{
    public function show($id)
    {
        $courses = Auth::user()->courses()->inRandomOrder()->get();
        return view('layouts.profile', compact('courses'));
    }

    public function update(UpdateRequest $request, $id)
    {
        if ($request->file('file')) {
            $uploadedFileUrl = cloudinary()->upload($request->file('file')->getRealPath())->getSecurePath();
            }
        else {
            $uploadedFileUrl = Auth::user()->avatar;
        }
        $data = [
            'avatar' => $uploadedFileUrl,
            'fullname' => $request['name'],
            'email' => $request['email_update'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'about' => $request['about'],
            'birth' => $request['date']
        ];
        Auth::user()->update($data);
        return redirect(url()->previous());
    }
}
