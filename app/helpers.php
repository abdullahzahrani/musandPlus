<?php

use App\Models\Transcript;
use App\Models\Students;

function chech3($sub, $id)
{
    $chk = array('IT281', 'IT320', 'IT301', 'IT310', 'MATH113', 'CS104', 'CS141', 'CS242', 'IT360', 'IT300', 'IT340',
        'IT390', 'IT490', 'IT331', 'CS140', 'CS106', 'IT280', 'CS220', 'IT492', 'PHYS103', 'EN140', 'EN160',
        'AR104', 'IT420', 'IT412', 'IT321', 'IT341', 'IT342', 'IT413', 'QURAN101', 'QURAN151', 'QURAN201',
        'QURAN251', 'MATH114', 'MATH227', 'STAT111', 'EN208', 'AR201', 'ALM207', 'AQD133', 'QSD100', 'SNH116',
        'FGH200', 'THGF101', 'DAR100');
    if (!in_array($sub, $chk)) return "no result";

    $level0 = Transcript::where('user_id', '=', $id)->get()->toArray();
//
    switch ($sub) {
        case("CS141"):
            if (in_array_r('CS140', $level0)) return "yes"; else return "no";
        case("CS106"):
            if (in_array_r('CS104', $level0)) return "yes"; else return "no";
        case("CS242"):
            if (in_array_r('CS141', $level0) and in_array_r('CS104', $level0)) return "yes"; else return "no";
        case("CS220"):
            if (in_array_r('CS141', $level0) and in_array_r('CS106', $level0)) return "yes"; else return "no";
        case("IT281"):
            if (in_array_r('IT280', $level0)) return "yes"; else return "no";
        case("IT360"):
            if (in_array_r('CS242', $level0) and in_array_r('CS220', $level0)) return "yes"; else return "no";
        case("IT320"):
            if (in_array_r('CS242', $level0)) return "yes"; else return "no";
        case("IT300"):
            if (in_array_r('IT281', $level0)) return "yes"; else return "no";
        case("IT340"):
            if (in_array_r('IT360', $level0)) return "yes"; else return "no";
        case("IT301"):
            if (in_array_r('IT281', $level0)) return "yes"; else return "no";
        case("IT390"):
            if (in_array_r('IT281', $level0)) return "yes"; else return "no";
        case("IT310"):
            if (in_array_r('IT281', $level0) and in_array_r('IT340', $level0)) return "yes"; else return "no";
        case("IT420"):
            if (in_array_r('IT301', $level0)) return "yes"; else return "no";
        case("IT490"):
            if (in_array_r('IT281', $level0) and in_array_r('IT340', $level0) and in_array_r('IT320', $level0)) return "yes"; else return "no";
        case("IT321"):
            if (in_array_r('IT320', $level0)) return "yes"; else return "no";
        case("IT412"):
            if (in_array_r('IT310', $level0)) return "yes"; else return "no";
        case("IT331"):
            if (in_array_r('IT320', $level0) and in_array_r('IT390', $level0)) return "yes"; else return "no";
        case("IT492"):
            if (in_array_r('IT390', $level0) and in_array_r('IT301', $level0) and in_array_r('IT490', $level0)) return "yes"; else return "no";
        case("IT341"):
            if (in_array_r('IT310', $level0)) return "yes"; else return "no";
        case("IT342"):
            if (in_array_r('IT340', $level0)) return "yes"; else return "no";
        case("IT413"):
            if (in_array_r('IT331', $level0)) return "yes"; else return "no";
        case("IT493"):
            if (in_array_r('IT492', $level0)) return "yes"; else return "no";
        default:
            return "no requirement";
    }

}

function in_array_r($item, $array)
{
    return preg_match('/"' . preg_quote($item, '/') . '"/i', json_encode($array));
}

function check1($id)
{
    $arr7 = array('IT281', 'IT320');
    $arr5 = array('IT340');
    $arr4 = array('IT301');
    $arr3 = array('IT310', 'MATH113');
    $arr2 = array('CS104', 'CS141', 'CS242', 'IT360', 'IT300', 'IT390', 'IT490', 'IT331');
    $arr1 = array('CS140', 'CS106', 'IT280', 'CS220', 'IT492', 'PHYS103', 'EN140', 'EN160', 'AR104');
    $arr0 = array('IT420', 'IT412', 'IT321', 'IT341', 'IT342', 'IT413', 'QURAN101', 'QURAN151', 'QURAN201',
        'QURAN251', 'MATH114', 'MATH227', 'STAT111', 'EN208', 'AR201', 'ALM207', 'AQD133', 'QSD100', 'SNH116', 'FGH200', 'THGF101', 'DAR100');
    if (in_array($id, $arr7)) return 7;
    if (in_array($id, $arr5)) return 5;
    if (in_array($id, $arr4)) return 4;
    if (in_array($id, $arr3)) return 3;
    if (in_array($id, $arr2)) return 2;
    if (in_array($id, $arr1)) return 1;
    if (in_array($id, $arr0)) return 0;
    return -1;
}

function check2($id)
{
    $arr7 = array('لم استطع التسجيل', 'الشعبة مغلقة', 'طالب خريج',
        'تجاوز الحد الاعلي', 'تجاوز الحد الاعلي - طالب خريج', 'تجاوز متطلب - طالب خريج',
        'تجاوز متطلب - مشروع تخرج 1', 'عدم تجاوز الحد الادني للساعات', 'تعارض وقت المحاضرة',
        'تعارض وقت المحاضرة - طالب خريج', 'تعارض وقت الامتحان', 'تعارض وقت الامتحان - طالب خريج');
    if (in_array($id, $arr7)) return 7;
    return -1;
}

function check0($id)
{
    $p = str_replace(array('\'', '"',
        ',', ';', '<', '>', '@', '/'), ' ', $id);
    return $p;
}

function check4($sub, $id = null)
{
    if ($id != null) {
        $chk = array('IT281', 'IT320', 'IT301', 'IT310', 'MATH113', 'CS104', 'CS141', 'CS242', 'IT360', 'IT300', 'IT340',
            'IT390', 'IT490', 'IT331', 'CS140', 'CS106', 'IT280', 'CS220', 'IT492', 'PHYS103', 'EN140', 'EN160',
            'AR104', 'IT420', 'IT412', 'IT321', 'IT341', 'IT342', 'IT413', 'QURAN101', 'QURAN151', 'QURAN201',
            'QURAN251', 'MATH114', 'MATH227', 'STAT111', 'EN208', 'AR201', 'ALM207', 'AQD133', 'QSD100', 'SNH116',
            'FGH200', 'THGF101', 'DAR100');
        if (!in_array($sub, $chk)) return "";
    }
    $level0 = Transcript::where('user_id', '=', $id)->get()->toArray();
//
    switch ($sub) {
        case("CS141"):
            if (!in_array_r('CS140', $level0)) return "CS140"; else return '';
        case("CS106"):
            if (!in_array_r('CS104', $level0)) return "CS104"; else return '';
        case("CS242"):
            $x = '';
            if (!in_array_r('CS141', $level0)) {
                $x = 'CS141';
            }
            if (!in_array_r('CS104', $level0)) {
                $x = $x . " CS104";
            }
            return $x;
        case("CS220"):
            $x = '';
            if (!in_array_r('CS141', $level0)) {
                $x = 'CS141';
            }
            if (!in_array_r('CS106', $level0)) {
                $x = $x . ' CS106';
            }
            return $x;
        case("IT281"):
            if (!in_array_r('IT280', $level0)) return "IT280"; else return '';
        case("IT360"):
            $x = '';
            if (!in_array_r('CS242', $level0)) {
                $x = 'CS242';
            }
            if (!in_array_r('CS220', $level0)) {
                $x = $x . ' CS220';
            }
            return $x;
        case("IT320"):
            if (!in_array_r('CS242', $level0)) return "CS242"; else return '';
        case("IT300"):
            if (!in_array_r('IT281', $level0)) return "IT281"; else return '';
        case("IT340"):
            if (!in_array_r('IT360', $level0)) return "IT360"; else return '';
        case("IT301"):
            if (!in_array_r('IT281', $level0)) return "IT281"; else return '';
        case("IT390"):
            if (!in_array_r('IT281', $level0)) return "IT281"; else return '';
        case("IT310"):
            $x = '';
            if (!in_array_r('IT281', $level0)) {
                $x = 'IT281';
            }
            if (!in_array_r('IT340', $level0)) {
                $x = $x . ' IT340';
            }
            return $x;
        case("IT420"):
            if (!in_array_r('IT301', $level0)) return "IT301"; else return '';
        case("IT490"):
            $x = '';
            if (!in_array_r('IT281', $level0)) {
                $x = 'IT281';
            }
            if (!in_array_r('IT340', $level0)) {
                $x = $x . ' IT340';
            }
            if (!in_array_r('IT320', $level0)) {
                $x = $x . ' IT320';
            }
            return $x;
        case("IT321"):
            if (!in_array_r('IT320', $level0)) return "IT320"; else return '';
        case("IT412"):
            if (!in_array_r('IT310', $level0)) return "IT310"; else return '';
        case("IT331"):
            $x = '';
            if (!in_array_r('IT320', $level0)) {
                $x = 'IT320';
            }
            if (!in_array_r('IT390', $level0)) {
                $x = $x . ' IT390';
            }
            return $x;
        case("IT492"):
            $x = '';
            if (!in_array_r('IT390', $level0)) {
                $x = 'IT390';
            }
            if (!in_array_r('IT301', $level0)) {
                $x = $x . ' IT301';
            }
            if (!in_array_r('IT490', $level0)) {
                $x = $x . ' IT490';
            }
            return $x;
        case("IT341"):
            if (!in_array_r('IT310', $level0)) return "IT310"; else return '';
        case("IT342"):
            if (!in_array_r('IT340', $level0)) return "IT340"; else return '';
        case("IT413"):
            if (!in_array_r('IT331', $level0)) return "IT331"; else return '';
        case("IT493"):
            if (!in_array_r('IT492', $level0)) return "IT492"; else return '';
        default:
            return "no requirement";
    }

}

function check5($id)
{
    $i1 = array('IT490', 'QURAN101', 'QURAN151', 'QURAN201', 'QURAN251');
    $i2 = array('IT492', 'AR104', 'ALM207', 'AQD133', 'QSD100', 'SNH116', 'FGH200', 'THGF101');
    $i3 = array('IT281', 'IT320', 'IT310', 'CS104', 'IT300', 'IT390', 'IT331', 'CS106', 'IT280',
        'IT420', 'IT412', 'IT321', 'IT341', 'IT342', 'IT413', 'PHYS103', 'EN140', 'EN160', 'STAT111', 'EN208', 'DAR100');
    $i4=array('IT340','IT301','CS141','CS242','IT360','CS140','CS220','IT493','MATH113','MATH114', 'MATH227');
    if (!in_array($id, $i1)) return 1;
    if (!in_array($id, $i2)) return 2;
    if (!in_array($id, $i3)) return 3;
    if (!in_array($id, $i4)) return 4;
}
function check6($id)
{
    $x= Transcript::where('user_id','=',$id)->get(['sub1Hours','sub2Hours','sub3Hours','sub4Hours','sub5Hours','sub6Hours'])->toArray();

    $u= sum_array($x);
    $x1= Students::find($id);
    if($x1->hours != $u){
        $x1->hours = $u;
        $x1->save();
    }

    return $u;
}
function check7($id)
{
    $x= \App\Models\SchoolSchedule::where('user_id','=',$id)->get(['sub1Hours','sub2Hours','sub3Hours','sub4Hours','sub5Hours','sub6Hours'])->toArray();

    $u= sum_array($x);
    return $u;
}

function sum_array($array)
{
    $sum = 0;
    foreach ($array as $value) {
        // if the value itself is an array
        // recurse further: call the function again
        if (is_array($value)) {
            $sum = $sum + sum_array($value);
        }
        // if the value is not an array,
        // simply add it to $sum
        else {
            $sum = $sum + $value;
        }
    }
    return $sum;
}

?>
