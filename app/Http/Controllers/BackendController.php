<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Department;
use App\Salary;

class BackendController extends Controller
{
    public function dashboard($value='')
    {
        $total_gender_row = Employee::all()->count();

        if($total_gender_row !== 0){

            $male = Employee:: select('gender')
            ->where('gender', "male")->get()->count();

            $male_percent = round(100 * ($male / $total_gender_row) , 0);

            $female_percent = 100 - $male_percent;




            $emp_count = Employee:: all()->count();
            $dep_count = Department::all()->count();
            $salary_emp_count = Salary::all()->count();
            $tot_salary = Salary::get()->sum('net_salary');
            $total_salary = $this->currency_format(Salary::get()->sum('net_salary'));
            if($tot_salary !== null && $salary_emp_count !== 0){
                $average_salary = $this->currency_format($tot_salary / $salary_emp_count);
            }else{
                $average_salary = 0;
            }

        }else{
            $male_percent = 0;
            $female_percent = 0;
            $emp_count = 0;
            $dep_count = Department::all()->count();
            $salary_emp_count = 0;
            $tot_salary = 0;
            $total_salary = 0;
            if($tot_salary !== null && $salary_emp_count !== 0){
                $average_salary = 0;
            }else{
                $average_salary = 0;
            }
        }



        // dd(round($male_percent, 0));
        return view('backend.dashboard',compact('male_percent','female_percent','emp_count','dep_count','total_salary','average_salary'));
    }

    public function holiday($value='')
    {
    	return view('backend.holidays.index');
    }

    public function event($value='')
    {
    	return view('backend.events.index');
    }

    public function social($value='')
    {
        return view('backend.social.index');
    }

    public function worldwide($value='')
    {
        return view('backend.worldwide.index');
    }

    public function setSession($value)
    {

        \Session::put('class', $value );
        return response()->json(array(
            'session_data' => $value,
        ));
    }

    public function getEmployeePhoto($id)
    {

        $employee = Employee:: where('user_id',$id)->firstOrFail();
        $employee_photo = $employee->photo;
        \Session::put('employee_photo', "$employee_photo" );
        return response()->json(array(
            'employee_photo' => $employee_photo,
        ));
    }

    public function getInfo()
    {
        $emp_count = Employee:: all()->count();
        $dep_count = Department::all()->count();
        $tot_sal = Salary::get()->sum('net_salary');
        // dd("Hi");
        return response()->json(array(
            'emp_count' => $emp_count,
            'dep_count' => $dep_count,
            'tot_sal' => $tot_sal,
        ));
    }



    public function currency_format($n) {
        // first strip any formatting;
        $n = (0+str_replace(",", "", $n));

        // is this a number?
        if (!is_numeric($n)) return false;

        // now filter it;
        if ($n > 1000000000000) return round(($n/1000000000000), 1).'T';
        elseif ($n > 1000000000) return round(($n/1000000000), 1).'B';
        elseif ($n > 1000000) return round(($n/1000000), 1).'M';
        elseif ($n > 1000) return round(($n/1000), 1).'k';

        return number_format($n);
    }
}


