<?php


namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function showLoginForm()
    {
        return view('student.login'); // Assuming you have a view file 'student/login.blade.php'
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        $student = Student::where('username', $credentials['username'])->first();

        if ($student && Hash::check($credentials['password'], $student->password)) {
            Auth::guard('student')->login($student); // Log in the student
            return redirect()->intended('results'); // Redirect to intended page after login
        }

        return redirect('login')->withErrors('Login details are not valid');
    }

    public function logout(Request $request)
    {
        Auth::guard('student')->logout(); // Logout the student
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate CSRF token

        return redirect('/login'); // Redirect to home or login page after logout
    }


    public function results()
    {
        // Handle displaying results, assuming student is authenticated
        // Example logic:
        $student = Auth::guard('student')->user(); // Retrieve authenticated student
        $results = $student->results; // Assuming results is a relationship in Student model

        return view('student.results', compact('results'));
    }}
