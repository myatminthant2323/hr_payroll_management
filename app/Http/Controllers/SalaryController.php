<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Designation;
use App\Employee;
use App\Salary;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        $designations = Designation::all();
        $salaries = Salary::all();
        return view('backend.salaries.index',compact('salaries','employees','designations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salaried_emps = Salary::select('employee_id')->get();

        // dd($salaried_emps);

        $salaried_emp_id_array = array();
        foreach ($salaried_emps as $key => $salaried_emp) {
            if (!in_array($salaried_emp["employee_id"], $salaried_emp_id_array)) {
                array_push($salaried_emp_id_array, $salaried_emp["employee_id"] );
            }
        }

        $employees = Employee::whereNotIn('id',$salaried_emp_id_array)->get();

        // dd($employees);

        // $employees = Employee::all();
        // $salaries = Salary::all();
        return view('backend.salaries.create',compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'basic_salary' => 'required',
            'basic_working_time' => 'required',
            'leave_allowance' => 'required',
        ]);

        $epf_percent =  empty($request->epf) ? 0 : $request->epf;
        $esi_percent =  empty($request->esi) ? 0 : $request->esi;
        $med_allowance =  empty($request->medical_allowance) ? 0 : $request->medical_allowance;
        $trans_allowance =  empty($request->transport_allowance) ? 0 : $request->transport_allowance;
        $acco_allowance =  empty($request->accomodation_allowance) ? 0 : $request->accomodation_allowance;
        $other_allowance =  empty($request->other_allowance) ? 0 : $request->other_allowance;
        // $oKubus->save();

         // dd("Hi");
        

        $allowances = $med_allowance + $trans_allowance + $acco_allowance + $other_allowance;

        $gross_salary = $request->basic_salary + $allowances;
        // end gross salary


        // deductions
        $epf = ceil($gross_salary * (($epf_percent)/100));
        $esi = ceil($gross_salary * (($esi_percent)/100));
        $other_insurance =  empty($request->other_insurance) ? 0 : $request->other_insurance;
        $other_deduction =  empty($request->other_deduction) ? 0 : $request->other_deduction;

        $deductions = $epf + $esi + $other_insurance + $other_deduction ;
        // end deductions

        // net salary
        $net_salary = $gross_salary - $deductions;

        // end net salary


        $salary = new Salary;
        $salary->user_id = 1;
        $salary->employee_id = $request->staff;
        $salary->basic_salary = $request->basic_salary;
        $salary->basic_working_time_per_day = $request->basic_working_time;
        $salary->leave_allowance = $request->leave_allowance;
        $salary->medical_allowance = $med_allowance;
        $salary->transport_allowance = $trans_allowance;
        $salary->accomodation_allowance = $acco_allowance;
        $salary->other_allowance = $other_allowance;
        $salary->epf = $epf_percent;
        $salary->esi = $esi_percent;
        $salary->other_insurance = $other_insurance;
        $salary->other_deduction = $other_deduction;
        $salary->gross_salary = ceil($gross_salary);
        $salary->total_deduction = ceil($deductions);
        $salary->net_salary = ceil($net_salary);

        

        $salary->save();

        // Alert::success('Success!', 'New Item Inserted Successfully.');

        return redirect()->route('salaries.index')->with('status',1);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $salary = Salary::find($id);
        $employees = Employee::all();
        // $employee = Employee::find($salary->employee_id);
        return view('backend.salaries.edit',compact('employees','salary'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'basic_salary' => 'required',
            'basic_working_time' => 'required',
            'leave_allowance' => 'required',
        ]);

         // dd("Hi");

        $epf_percent =  empty($request->epf) ? 0 : $request->epf;
        $esi_percent =  empty($request->esi) ? 0 : $request->esi;
        $med_allowance =  empty($request->medical_allowance) ? 0 : $request->medical_allowance;
        $trans_allowance =  empty($request->transport_allowance) ? 0 : $request->transport_allowance;
        $acco_allowance =  empty($request->accomodation_allowance) ? 0 : $request->accomodation_allowance;
        $other_allowance =  empty($request->other_allowance) ? 0 : $request->other_allowance;
        // $oKubus->save();

         // dd("Hi");
        

        $allowances = $med_allowance + $trans_allowance + $acco_allowance + $other_allowance;

        $gross_salary = $request->basic_salary + $allowances;
        // end gross salary


        // deductions
        $epf = ceil($gross_salary * (($epf_percent)/100));
        $esi = ceil($gross_salary * (($esi_percent)/100));
        $other_insurance =  empty($request->other_insurance) ? 0 : $request->other_insurance;
        $other_deduction =  empty($request->other_deduction) ? 0 : $request->other_deduction;

        $deductions = $epf + $esi + $other_insurance + $other_deduction ;
        // end deductions

        // net salary
        $net_salary = $gross_salary - $deductions;
        
        // end net salary


        $salary = Salary::find($id);
        $salary->user_id = 1;
        $salary->employee_id = $request->staff;
        $salary->basic_salary = $request->basic_salary;
        $salary->basic_working_time_per_day = $request->basic_working_time;
        $salary->leave_allowance = $request->leave_allowance;
        $salary->medical_allowance = $med_allowance;
        $salary->transport_allowance = $trans_allowance;
        $salary->accomodation_allowance = $acco_allowance;
        $salary->other_allowance = $other_allowance;
        $salary->epf = $epf_percent;
        $salary->esi = $esi_percent;
        $salary->other_insurance = $other_insurance;
        $salary->other_deduction = $other_deduction;
        $salary->gross_salary = ceil($gross_salary);
        $salary->total_deduction = ceil($deductions);
        $salary->net_salary = ceil($net_salary);

        // $salary = Salary::find($id);
        // $salary->user_id = 1;
        // $salary->employee_id = $request->staff;
        // $salary->basic_salary = $request->basic_salary;
        // $salary->basic_working_time_per_day = $request->basic_working_time;
        // $salary->overtime_rate = $request->overtime_rate;
        // $salary->leave_allowance = $request->leave_allowance;
        // $salary->medical_allowance = $request->medical_allowance;
        // $salary->transport_allowance = $request->transport_allowance;
        // $salary->accomodation_allowance = $request->accomodation_allowance;
        // $salary->other_allowance = $request->other_allowance;
        // $salary->epf = $request->epf;
        // $salary->esi = $request->esi;
        // $salary->other_insurance = $request->other_insurance;
        // $salary->other_deduction = $request->other_deduction;
        

        $salary->save();
        return redirect()->route('salaries.index')->with('status',2);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $salary = Salary::find($id);

        $salary->delete();

        $status = 3;
        return redirect()->route('salaries.index')->with('status',$status);
    }

    
}
