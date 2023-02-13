<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\SchoolSchedule;
use App\Models\Subject;
use App\Models\Transcript;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use function PHPUnit\Framework\isEmpty;

class AdminController extends Controller
{
    public function index()
    {
        $le=Subject::with('getUser')->orderBy('requirement', 'DESC')->get();
        foreach ($le as $le => $key){
            check6($key->getUser->id);
        }

        $level1 = Subject::whereHas('getUser', function ($q) {
            $q->where('hours', '>=', '120')->where('major', '=', Auth::user()->major);
        })->with('getUser')->orderBy('requirement', 'DESC')->get();

        $level2 = Subject::whereHas('getUser', function ($q) {
            $q->whereBetween('hours', ['100', '119'])->where('major', '=', Auth::user()->major);
        })->with('getUser')->orderBy('requirement', 'DESC')->get();

        $level3 = Subject::where('requirement', '>', '0')->whereHas('getUser', function ($q) {
            $q->whereBetween('hours', ['0', '36'])->where('major', '=', Auth::user()->major);
        })->with('getUser')->orderBy('requirement', 'DESC')->get();

        $level4 = Subject::where('requirement', '>', '0')->whereHas('getUser', function ($q) {
            $q->whereBetween('hours', ['37', '98'])->where('major', '=', Auth::user()->major);
        })->with('getUser')->orderBy('requirement', 'DESC')->get();

        $level5 = Subject::where('requirement', '=', '0')->whereHas('getUser', function ($q) {
            $q->whereBetween('hours', ['37', '98'])->where('major', '=', Auth::user()->major);
        })->with('getUser')->orderBy('requirement', 'DESC')->get();
        $level6 = Subject::where('requirement', '=', '0')->whereHas('getUser', function ($q) {
            $q->whereBetween('hours', ['-1', '36'])->where('major', '=', Auth::user()->major);
        })->with('getUser')->orderBy('requirement', 'DESC')->get();
        $level7 = Subject::whereHas('getUser', function ($q) {
            $q->where('major', '=', Auth::user()->major);
        })->with('getUser')->orderBy('requirement', 'DESC')->onlyTrashed()->get();

        return view('dashboard', compact('level1', 'level2', 'level3', 'level4', 'level5', 'level6', 'level7'));

    }

    public function ticket($id)
    {
        if ($id == 1){
            $level1 = Subject::whereHas('getUser', function ($q) {
                $q->where('hours', '>=', '120')->where('major', '=', Auth::user()->major);
            })->with('getUser')->orderBy('requirement', 'DESC')->get();
            return view('dashboard2', compact('level1', 'id'));

        } if ($id == 2){
        $level1 = Subject::whereHas('getUser', function ($q) {
            $q->whereBetween('hours', ['100', '119'])->where('major', '=', Auth::user()->major);
        })->with('getUser')->orderBy('requirement', 'DESC')->get();
        return view('dashboard2', compact('level1', 'id'));


    } if ($id == 3){
        $level1 = Subject::where('requirement', '>', '0')->whereHas('getUser', function ($q) {
            $q->whereBetween('hours', ['0', '36'])->where('major', '=', Auth::user()->major);
        })->with('getUser')->orderBy('requirement', 'DESC')->get();
        return view('dashboard2', compact('level1', 'id'));

            } if ($id == 4){
        $level1 = Subject::where('requirement', '>', '0')->whereHas('getUser', function ($q) {
            $q->whereBetween('hours', ['37', '98'])->where('major', '=', Auth::user()->major);
        })->with('getUser')->orderBy('requirement', 'DESC')->get();
        return view('dashboard2', compact('level1', 'id'));

        }  if ($id == 5){
        $level1 = Subject::where('requirement', '=', '0')->whereHas('getUser', function ($q) {
            $q->whereBetween('hours', ['37', '98'])->where('major', '=', Auth::user()->major);
        })->with('getUser')->orderBy('requirement', 'DESC')->get();
        return view('dashboard2', compact('level1', 'id'));

    }  if ($id == 6){
        $level1 = Subject::where('requirement', '=', '0')->whereHas('getUser', function ($q) {
            $q->whereBetween('hours', ['-1', '36'])->where('major', '=', Auth::user()->major);
        })->with('getUser')->orderBy('requirement', 'DESC')->get();
        return view('dashboard2', compact('level1', 'id'));

        } if ($id == 7){
        $level1 = Subject::whereHas('getUser', function ($q) {
            $q->where('major', '=', Auth::user()->major);
        })->with('getUser')->orderBy('requirement', 'DESC')->onlyTrashed()->get();
        return view('dashboard3', compact('level1', 'id'));
    }

    }

    public function student($id, $sub = null)
    {
        $student = Transcript::where('user_id', '=', $id)->whereHas('getUser', function ($q) {
            $q->where('major', '=', Auth::user()->major);
        })->with('getUser')->get();


        if ($student->isNotEmpty()) {

            return view('student.trs', compact('student', 'sub', 'id'));
        }
        return redirect()->route('admin.dashboard')->with('success', 'student dont have any transcript');
    }

    public function stud($id, $sub = null)
    {
        if ($sub==null)  return redirect()->route('admin.dashboard')->with('success', 'some error from us');
        $student = SchoolSchedule::where('user_id', '=', $id)->where('sub1', '=', $sub)->whereHas('getUser', function ($q) {
            $q->where('major', '=', Auth::user()->major);
        })->with('getUser')->get(['sub1 as sub', 'sub1Instructor as instructor', 'sub1Hours as hours']);
        $student2 = SchoolSchedule::where('user_id', '=', $id)->where('sub2', '=', $sub)->whereHas('getUser', function ($q) {
            $q->where('major', '=', Auth::user()->major);
        })->with('getUser')->get(['sub2 as sub', 'sub2Instructor as instructor', 'sub2Hours as hours']);
        $student3 = SchoolSchedule::where('user_id', '=', $id)->where('sub3', '=', $sub)->whereHas('getUser', function ($q) {
            $q->where('major', '=', Auth::user()->major);
        })->with('getUser')->get(['sub3 as sub', 'sub3Instructor as instructor', 'sub3Hours as hours']);
        $student4 = SchoolSchedule::where('user_id', '=', $id)->where('sub4', '=', $sub)->whereHas('getUser', function ($q) {
            $q->where('major', '=', Auth::user()->major);
        })->with('getUser')->get(['sub4 as sub', 'sub4Instructor as instructor', 'sub4Hours as hours']);
        $student5 = SchoolSchedule::where('user_id', '=', $id)->where('sub5', '=', $sub)->whereHas('getUser', function ($q) {
            $q->where('major', '=', Auth::user()->major);
        })->with('getUser')->get(['sub5 as sub', 'sub5Instructor as instructor', 'sub5Hours as hours']);
        $student6 = SchoolSchedule::where('user_id', '=', $id)->where('sub6', '=', $sub)->whereHas('getUser', function ($q) {
            $q->where('major', '=', Auth::user()->major);
        })->with('getUser')->get(['sub6 as sub', 'sub6Instructor as instructor', 'sub6Hours as hours']);

        if (!$student->isEmpty()) {
            return view('student.st', compact('student'));
        }
        if (!$student2->isEmpty()) {
            $student= $student2;
            return view('student.st', compact('student'));
        }
        if (!$student3->isEmpty()) {
            $student= $student3;
            return view('student.st', compact('student'));
        }
        if (!$student4->isEmpty()) {
            $student= $student4;
            return view('student.st', compact('student'));
        }
        if (!$student5->isEmpty()) {
            $student= $student5;
            return view('student.st', compact('student'));
        }
        if (!$student6->isEmpty()) {
            $student= $student6;
            return view('student.st', compact('student'));
        }
        return redirect()->route('admin.dashboard')->with('success', 'some error from us');

    }

    public function hours($id)
    {
        $student = SchoolSchedule::where('user_id', '=', $id)->whereHas('getUser', function ($q) {
            $q->where('major', '=', Auth::user()->major);
        })->with('getUser')->get();


        if ($student->isNotEmpty()) {

            return view('hours', compact('student'));
        }
        return redirect()->route('admin.dashboard')->with('success', 'student dont have any transcript');
    }

    public function stub()
    {
        $level1 = Material::all();
        return view('dashboard4', compact('level1'));
        dd();
    }

    public function destroy($id)
    {
//        Subject::findOrFail($id)->delete();
        $x = Subject::findOrFail($id);
        $x->status = 'rejected';
        $x->save();
        $x->delete();
        return redirect()->back();
        dd();
    }

    public function accept($id)
    {
//        Subject::findOrFail($id)->delete();
        $x = Subject::findOrFail($id);
        $x->status = 'accepted';
        $x->save();
        $x->delete();
        return redirect()->back();
        dd();
    }

    public function delete($id)
    {
        Subject::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->back();
        dd();
    }

    public function restore($id)
    {
      Subject::withTrashed()->findOrFail($id)->restore();
        $r= Subject::withTrashed()->findOrFail($id);
        $r->status="تحت المراجعة";
        $r->save();
        return redirect()->back();
        dd();
    }
}
