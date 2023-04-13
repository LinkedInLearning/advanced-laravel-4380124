<?php

namespace App\Http\Controllers;

use App\Events\ClassCanceled;
use App\Models\ClassType;
use Illuminate\Http\Request;
use App\Models\ScheduledClass;

class ScheduledClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scheduledClasses = auth()->user()->scheduledClasses()->upcoming()->oldest('date_time')->get();
        return view('instructor.upcoming')->with('scheduledClasses', $scheduledClasses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classTypes = ClassType::all();
        return view('instructor.schedule')->with('classTypes', $classTypes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $date_time = $request->input('date') . " " . $request->input('time');
        $request->merge([
            'date_time' => $date_time,
            'instructor_id' => auth()->user()->id
        ]);

        $validated = $request->validate([
            'class_type_id' => 'required',
            'instructor_id' => 'required',
            'date_time' => 'required|unique:scheduled_classes,date_time|after:now'
        ]);

        ScheduledClass::create($validated);

        return redirect()->route('schedule.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ScheduledClass $schedule)
    {

        if(auth()->user()->cannot('delete', $schedule)) {
            abort(403);
        }

        ClassCanceled::dispatch($schedule);

        $schedule->members()->detach();
        $schedule->delete();

        return redirect()->route('schedule.index');
    }
}
