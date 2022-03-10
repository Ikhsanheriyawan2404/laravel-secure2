<?php

namespace App\Http\Controllers;

use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function store()
    {
        request()->validate([
            'name' => 'required|max:255|string',
            'nim' => 'required|numeric',
            'date_of_birth' => 'required|date',
            'image' => 'required|image|max:2058',
        ]);

        Student::create([
            'name' => request('name'),
            'nim' => request('nim'),
            'date_of_birth' => request('date_of_birth'),
            'image' => request('image') ? request()->file('image')->store('img/students') : null,
        ]);

        return redirect()->back()->with('success', 'Data Mahasiswa Berhasil Ditambahkan!');
    }
}
