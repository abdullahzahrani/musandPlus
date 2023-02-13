<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Subject;
use Illuminate\Http\Request;
use Auth;

class StudentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'subject'=>'required',
            'reasonTicket' => 'required|max:30',
            'noteTicket' => 'required|max:255',
            'sure'=>'required'
        ]);
        $result = $_POST['subject'];
        $request->subject = explode('|', $result);

     $m=Material::findOrFail($request->subject[2]);

        if (check1($request->subject[0]) != -1 and check2($request->reasonTicket) != -1 and $request->subject[0] == $m->subject
            and $request->subject[1] == $m->hours ) {

            $subject = new Subject();
            $subject->subject =  $m->subject;
            $subject->reasonTicket = check0($request->reasonTicket);
            $subject->requirement = check1($m->subject);
            $subject->noteTicket = check0($request->noteTicket);
            $subject->classNumber = $m->classNumber;
            $subject->status = "تحت المراجعة";
            $subject->mat = $m->id;
            $subject->user_id = Auth::guard('student')->user()->id;

            $subject->save();
            $mts=Material::all();
            return redirect()->route('student.ticket')->with('success','ticket has been created successfully.');
        }
        return  abort(403);dd();
    }
    public function index()
    {
        $le=Subject::with('getUser')->get();
        foreach ($le as $le => $key){
            check6($key->getUser->id);
        }
//        $subs = Subject::where('user_id','=',Auth::user()->id)->withTrashed()->get();
//        return view('student.dashboard', compact('subs'));
        return view('student.dashboard');
    }
    public function ticket()
    {
        $subs = Subject::where('user_id','=',Auth::user()->id)->withTrashed()->get();
        return view('student.ticket', compact('subs'));
    }
    public function destroy($id)
    {
        $stock = Subject::withTrashed()->findOrFail($id)->forceDelete();
//        $stock->delete(); // Easy right?

        return redirect('student/ticket')->with('success', 'Subject removed.');  // -> resources/views/stocks/index.blade.php
    }
    public function create()
    {
        $sub = Subject::where('user_id','=',Auth::user()->id)->withTrashed()->get('mat')->toArray();
        $mts=Material::whereNotIn('id', $sub)->where('hours','<=',Auth::user()->hours)->get();

        return view('student.dashboard2',compact('mts'));

    }

}
