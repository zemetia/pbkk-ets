<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::all();

        return view('classroom.classroom', ['classrooms' => $classrooms]);
    }

    public function create() {
        $teachers = Teacher::all();

        return view('classroom.classroom-add', ['teachers' => $teachers]);
    }

    public function detail($id)
    {
        $classroom = Classroom::with(['teacher'])->findOrFail($id);

        return view('classroom.classroom-detail', ['classroom' => $classroom]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        Classroom::create($request->all());

        return redirect('/classroom');
    }

    public function edit($id)
    {
        $classroom = Classroom::findOrFail($id);
        $teachers = Teacher::all();

        return view('classroom.classroom-edit', [
            'classroom' => $classroom,
            'teachers' => $teachers
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'teacher_id' => 'required'
        ]);

        $classroom = Classroom::findOrFail($id);
        $classroom->update($request->all());

        return redirect('/classroom');
    }

    public function delete($id)
    {
        $classroom = Classroom::findOrFail($id);

        return view('classroom.classroom-delete', [
            'classroom' => $classroom
        ]);
    }

    public function destroy($id)
    {
        $classroom = Classroom::findOrFail($id);
        $classroom->delete();

        return redirect('/classroom');
    }
}
