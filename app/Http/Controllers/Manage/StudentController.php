<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Student\StoreStudentRequest;
use App\Http\Requests\Student\UpdateStudentRequest;
use App\Models\Student;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StudentController extends BaseController
{
    /**
     * Access the index page for the students to see all students
     * @return Application|Factory|View
     */
    public function index(){
        $this->setPageTitle('Students', 'All Students');
        $students = Student::all();
        return view('Manage.pages.Students.index', compact('students'));
    }

    /**
     * @param Student $student
     * @return Application|Factory|View
     */
    public function show(Student $student){
        $this->setPageTitle($student->name, 'Show student');
        $student->load('attendances');
        return view('Manage.pages.Students.show', compact('student'));
    }

    /**
     * @param StoreStudentRequest $request
     * @return RedirectResponse
     */
    public function store(StoreStudentRequest $request): RedirectResponse
    {
        try {
            $existsStudent = Student::where('index_number', $request->input('index_number'))->first();
            if ($existsStudent) {
                alert('Sorry', 'Index Number already taken', 'info');
                return redirect()->back();
            }
            
            Student::create($request->validated());

            alert('Success', 'Student Created Successfully', 'success');
            return redirect()->back(); 
        } catch (\Exception $exception) {
            alert('Oops', 'Please try again', 'error');
            return redirect()->back();
        }
    }


    /**
     * @param UpdateStudentRequest $request
     * @param Student $student
     * @return RedirectResponse
     */
    public function update(UpdateStudentRequest $request, Student $student, $id): RedirectResponse
    {
        
        
        try {
            $student = Student::findOrFail($id);
            
            // Check if the new index number is already used by another student
            $existingStudent = Student::where('index_number', $request->input('index_number'))
                                      ->where('id', '!=', $student->id)
                                      ->first();
            
            
            if ($existingStudent) {
                // Emit an alert if the index number is already used
                alert('Oops', 'Index number already used', 'error');
                return redirect()->back();
            }
            
            // Update the student's data
            $student->update($request->validated());
    
            // Show Sweet Alert Notification
            alert('Good Job', 'Student Updated Successfully', 'success');
        } 
        catch (\Exception $exception) {
            alert('Oops', 'Please try again', 'error');
        }
        
        // Redirect Back
        return redirect()->back();
    }

    /**
     * @param Student $student
     * @return RedirectResponse
     */
    public function destroy(Student $student): RedirectResponse
    {
        try {
            $student->delete();
        }
        catch (\Exception $exception){
            alert('Oops', 'Please try again', 'error');
        }
        // Show Sweet Alert Notification
        alert('Good Job', 'Student removed Successfully', 'success');
        // Redirect Back
        return redirect()->back();
    }
}
