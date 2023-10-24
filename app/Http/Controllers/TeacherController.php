<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        // dd($teachers);


        // dd($teachers);
        // return view('teacher.teacher', ['teacherList' => $teachers]);
        return view('teacher.teacher', [
            'teacherList' => $teachers
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            "nama" => "required",
            "image" => "required",
        ]);


        $filename = "";
        if ($request->file('image')) {
            $extension = $request->file('image')->extension();
            $filename = date('Y-m-d-H-i-s') . "." . $extension;
            $request->file('image')->storeAs(
                'public/images',
                $filename
            );
        }




        $teacher = Teacher::create([
            "nama"=> $request->nama,
            "image" => $filename
        ]);

        return redirect('/teacher');
    }

    public function edit($id)
    {
        $teacher = Teacher::find($id);
        return view('teacher.teacher-edit', [
            'teacher' => $teacher
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "nama" => "required",
            "image" => "required"
        ]);

        // delete old image
        $teacher = Teacher::find($id);

        if ($teacher->image && file_exists(storage_path('app/public/images/' . $teacher->image))) {
            Storage::delete('public/images/' . $teacher->image);
        }

        // upload new image

        $filename = "";
        if ($request->file('image')) {
            $extension = $request->file('image')->extension();
            $filename = date('Y-m-d-H-i-s') . "." . $extension;
            $request->file('image')->storeAs(
                'public/images',
                $filename
            );
        }

        $teacher->update([
            "nama" => $request->nama,
            "image" => $filename
        ]);

        return redirect('/teacher');
    }

    public function delete($id)
    {
        $teacher = Teacher::find($id);

        return view('teacher.teacher-delete', [
            'teacher' => $teacher
        ]);
    }

    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();

        return redirect('/teacher');
    }
}
