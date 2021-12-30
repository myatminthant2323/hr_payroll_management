<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Designation;
use App\Employee;
use App\Payroll;
use App\Salary;
use App\Overtime;
use App\Leave;
use App\User;
use PDF;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendPaySlip;
class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->roles()->pluck('name')[0] !== "staff"){
            $employees = Employee::all();
            $designations = Designation::all();
            $salaries = Salary::all();
            $payrolls = Payroll::all()->sortByDesc('payment_month');
        // $users = User::all();
            $admin = User::find(1);
            return view('backend.payrolls.index',compact('employees','salaries','payrolls','designations', 'admin'));
        }else{
            $employee = Employee::where('user_id',Auth::user()->id)->firstOrFail();
            // dd($employee->id);
            $employees = Employee::all();
            // dd($employees);
            $designations = Designation::all();
            $salaries = Salary::all()->where('employee_id',$employee->id);
            $payrolls = Payroll::all()->where('employee_id',$employee->id)->sortByDesc('payment_month');
            $admin = User::find(1);
            return view('backend.payrolls.index',compact('employees','salaries','payrolls','designations', 'admin'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();
        // $designations = Designation::all();
        // $salaries = Salary::all();
        // $payrolls = Payroll::all();
        return view('backend.payrolls.create',compact('employees'));
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
            'payment_month' => 'required',
            // 'payment_date' => 'required',
        ]);


        $attendance_bonus =  empty($request->attendance_bonus) ? 0 : $request->attendance_bonus;
        $overtime_bonus =  empty($request->overtime_bonus) ? 0 : $request->overtime_bonus;
        $other_bonus =  empty($request->other_bonus) ? 0 : $request->other_bonus;
        $attendance_deduction =  empty($request->attendance_deduction) ? 0 : $request->attendance_deduction;
        $other_deduction =  empty($request->other_deduction) ? 0 : $request->other_deduction;
        $leave_deduction = empty($request->leave_deduction) ? 0 : $request->leave_deduction;



        $payroll = new Payroll;

        $total_bonus = $request->overtime_bonus + $request->attendance_bonus + $request->other_bonus;
        $total_deduction = $request->attendance_deduction + $request->other_deduction + $request->leave_deduction;
        $net_pay = $request->net_salary + $total_bonus - $total_deduction;
        // dd($request->net_salary+"+"+$total_bonus+"-"+$total_deduction+"="+$net_pay);
        
        $payroll->user_id = Auth::user()->id;
        $payroll->employee_id = $request->staff;
        $payroll->payment_month = $request->payment_month;
        if($request->payment_date == null ){
            $payroll->payment_date = \Carbon\Carbon::today();
        }else{
            $payroll->payment_date = $request->payment_date;
        }
        
        $payroll->overtime_bonus = $overtime_bonus;
        $payroll->leave_deduction = $request->leave_deduction;
        $payroll->attendance_bonus = $attendance_bonus  ;
        $payroll->other_bonus = $other_bonus;
        $payroll->attendance_deduction = $attendance_deduction;
        $payroll->other_deduction = $other_deduction;
        $payroll->total_bonus = $total_bonus;
        $payroll->total_deduction = $total_deduction;
        $payroll->comment = $request->comment;
        $payroll->net_pay = ceil($net_pay);

        

        $payroll->save();

        // Alert::success('Success!', 'New Item Inserted Successfully.');

        return redirect()->route('payrolls.index')->with('status',1);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $payroll = Payroll::findOrFail($id);
        // $salary_array = Salary::where('employee_id', $payroll->employee_id)->get();
        // $employee_array = Employee::where('id', $payroll->employee_id)->get();
        // $employee = $employee_array[0];
        // $designation_array = Designation::where('id', $employee->designation_id)->get();
        // $salary = $salary_array[0];
        // $designation =  $designation_array[0];


        $payroll = Payroll::findOrFail($id);
        $date = explode("-", $payroll->payment_month);
        $month = $date[1];
        $year = $date[0];



        $employee = Employee::find($payroll->employee_id);
        $employee_join_date = $employee->join_date;

        $employee_date = explode("-", $employee_join_date);
        $employee_month = $employee_date[1];
        $employee_year = $employee_date[0];

        $designation = Designation::find($employee->designation_id);
        // dd($designation);
        if($employee_month == $month && $employee_year == $year){
            $employee_salary = Salary::where('employee_id', $payroll->employee_id)->get();
            $salary = $employee_salary[0];

            $join_date_carbon = new \Carbon\Carbon($employee_join_date);
            $pay_month_carbon = new \Carbon\Carbon($payroll->payment_month);
            // dd($pay_month_carbon);
            $no_of_days = $pay_month_carbon->daysInMonth;
            // dd($no_of_days);
            // dd($salary[0]["basic_salary"]);
            $one_day_paid = $salary->basic_salary / $no_of_days;
            $total_days_to_deduct = $pay_month_carbon->diffInDays(\Carbon\Carbon::parse($employee_join_date));
            // dd($total_days_to_deduct);
            $first_paid_deduction = $one_day_paid * $total_days_to_deduct;
            // dd(round($first_paid_deduction));
            $employee_basic_salary = $salary->basic_salary - round($first_paid_deduction);
            // dd($employee_basic_salary);



            $epf_percent =  empty($salary->epf) ? 0 : $salary->epf;
            $esi_percent =  empty($salary->esi) ? 0 : $salary->esi;
            $med_allowance =  empty($salary->medical_allowance) ? 0 : $salary->medical_allowance;
            $trans_allowance =  empty($salary->transport_allowance) ? 0 : $salary->transport_allowance;
            $acco_allowance =  empty($salary->accomodation_allowance) ? 0 : $salary->accomodation_allowance;
            $other_allowance =  empty($salary->other_allowance) ? 0 : $salary->other_allowance;
        // $oKubus->save();

         // dd("Hi");


            $allowances = $med_allowance + $trans_allowance + $acco_allowance + $other_allowance;

            $gross_salary = $employee_basic_salary + $allowances;
        // end gross salary


        // deductions
            $epf = ceil($gross_salary * (($epf_percent)/100));
            $esi = ceil($gross_salary * (($esi_percent)/100));
            $other_insurance =  empty($salary->other_insurance) ? 0 : $salary->other_insurance;
            $other_deduction =  empty($salary->other_deduction) ? 0 : $salary->other_deduction;

            $deductions = $epf + $esi + $other_insurance + $other_deduction ;

            $net_salary = $gross_salary - $deductions;

            $earning = $employee_basic_salary +  $med_allowance + $trans_allowance + $acco_allowance + $other_allowance + $payroll->overtime_bonus + $payroll->attendance_bonus + $payroll->other_bonus ;
            $deduction = ceil($epf) +  ceil($esi) + $other_insurance + $other_deduction + $payroll->attendance_deduction + $payroll->other_deduction + $payroll->leave_deduction;

            $total_days_to_pay = ($pay_month_carbon->endOfMonth()->diffInDays(\Carbon\Carbon::parse($employee_join_date)))+1;
            // dd($pay_month_carbon->endOfMonth());
            // dd($total_days_to_pay);

            $basic_salary = $salary->basic_salary;

            $employee_basic_salary = $employee_basic_salary;

            $first_month_deduction = round($first_paid_deduction);

            $employees = Employee::all(); 

            $user = User::find(1);
            return view('backend.payrolls.show',compact('payroll','salary','employee','designation','epf','esi', 'earning', 'deduction','basic_salary','employee_basic_salary','total_days_to_pay','first_month_deduction','employees','user'));

        }else{

            $payroll = Payroll::findOrFail($id);
            $salary_array = Salary::where('employee_id', $payroll->employee_id)->get();
            $employee_array = Employee::where('id', $payroll->employee_id)->get();
            $employee = $employee_array[0];
            $designation_array = Designation::where('id', $employee->designation_id)->get();
            $salary = $salary_array[0];
            $designation =  $designation_array[0];

            $epf = $salary->gross_salary * (($salary->epf)/100);
            $esi = $salary->gross_salary * (($salary->esi)/100);
        // dd($payroll->overtime_bonus);
            $earning = $salary->basic_salary +  $salary->medical_allowance + $salary->transport_allowance + $salary->accomodation_allowance + $salary->other_allowance + $payroll->overtime_bonus + $payroll->attendance_bonus + $payroll->other_bonus ;
            $deduction = ceil($epf) +  ceil($esi) + $salary->other_insurance + $salary->other_deduction + $payroll->attendance_deduction + $payroll->other_deduction + $payroll->leave_deduction;
            $basic_salary = $salary->basic_salary;
            $total_days_to_pay = 0;
            $employees = Employee::all(); 
            $user = User::find(1);
            return view('backend.payrolls.show',compact('payroll','salary','employee','designation','epf','esi', 'earning', 'deduction','basic_salary','total_days_to_pay','employees','user'));

        }     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payroll = Payroll::find($id);
        $salary = Salary::where('employee_id', $payroll->employee_id)->get();
        // $employee = Employee::where('id', $payroll->employee_id)->get();
        $employee = Employee::find($payroll->employee_id);
        // $designations = Designation::all();
        
        // $salaries = Salary::all();
        
        return view('backend.payrolls.edit',compact('payroll','salary','employee'));
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
            'payment_month' => 'required',
            'payment_date' => 'required',
        ]);

        $attendance_bonus =  empty($request->attendance_bonus) ? 0 : $request->attendance_bonus;
        $overtime_bonus =  empty($request->overtime_bonus) ? 0 : $request->overtime_bonus;
        $other_bonus =  empty($request->other_bonus) ? 0 : $request->other_bonus;
        $attendance_deduction =  empty($request->attendance_deduction) ? 0 : $request->attendance_deduction;
        $other_deduction =  empty($request->other_deduction) ? 0 : $request->other_deduction;




        $payroll = Payroll::find($id);

        $total_bonus = $request->overtime_bonus + $request->attendance_bonus + $request->other_bonus;
        $total_deduction = $request->attendance_deduction + $request->other_deduction;
        $net_pay = $request->net_salary + $total_bonus - $total_deduction;
        // dd($net_pay);
        // dd($request->net_salary+"+"+$total_bonus+"-"+$total_deduction+"="+$net_pay);
        
        $payroll->user_id = Auth::user()->id;
        $payroll->employee_id = $request->staff_id;
        $payroll->payment_month = $request->payment_month;
        $payroll->payment_date = $request->payment_date;
        $payroll->overtime_bonus = $overtime_bonus;
        $payroll->leave_deduction = $request->leave_deduction;
        $payroll->attendance_bonus = $attendance_bonus  ;
        $payroll->other_bonus = $other_bonus;
        $payroll->attendance_deduction = $attendance_deduction;
        $payroll->other_deduction = $other_deduction;
        $payroll->total_bonus = $total_bonus;
        $payroll->total_deduction = $total_deduction;
        $payroll->net_pay = $net_pay;

        

        $payroll->save();

        // Alert::success('Success!', 'New Item Inserted Successfully.');

        return redirect()->route('payrolls.index')->with('status',2);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payroll = Payroll::find($id);

        $payroll->delete();

        $status = 3;
        return redirect()->route('payrolls.index')->with('status',$status);
    }


    public function sendmail(Request $request, $id){

        $payroll = Payroll::findOrFail($id);
        $date = explode("-", $payroll->payment_month);
        $month = $date[1];
        $year = $date[0];



        $employee = Employee::find($payroll->employee_id);
        $employee_join_date = $employee->join_date;

        $employee_date = explode("-", $employee_join_date);
        $employee_month = $employee_date[1];
        $employee_year = $employee_date[0];

        $designation = Designation::find($employee->designation_id);
        // dd($designation);
        if($employee_month == $month && $employee_year == $year){
            $employee_salary = Salary::where('employee_id', $payroll->employee_id)->get();
            $salary = $employee_salary[0];

            $join_date_carbon = new \Carbon\Carbon($employee_join_date);
            $pay_month_carbon = new \Carbon\Carbon($payroll->payment_month);
            // dd($pay_month_carbon);
            $no_of_days = $pay_month_carbon->daysInMonth;
            // dd($no_of_days);
            // dd($salary[0]["basic_salary"]);
            $one_day_paid = $salary->basic_salary / $no_of_days;
            $total_days_to_deduct = $pay_month_carbon->diffInDays(\Carbon\Carbon::parse($employee_join_date));
            // dd($total_days_to_deduct);
            $first_paid_deduction = $one_day_paid * $total_days_to_deduct;
            // dd(round($first_paid_deduction));
            $employee_basic_salary = $salary->basic_salary - round($first_paid_deduction);
            // dd($employee_basic_salary);



            $epf_percent =  empty($salary->epf) ? 0 : $salary->epf;
            $esi_percent =  empty($salary->esi) ? 0 : $salary->esi;
            $med_allowance =  empty($salary->medical_allowance) ? 0 : $salary->medical_allowance;
            $trans_allowance =  empty($salary->transport_allowance) ? 0 : $salary->transport_allowance;
            $acco_allowance =  empty($salary->accomodation_allowance) ? 0 : $salary->accomodation_allowance;
            $other_allowance =  empty($salary->other_allowance) ? 0 : $salary->other_allowance;
        // $oKubus->save();

         // dd("Hi");


            $allowances = $med_allowance + $trans_allowance + $acco_allowance + $other_allowance;

            $gross_salary = $employee_basic_salary + $allowances;
        // end gross salary


        // deductions
            $epf = ceil($gross_salary * (($epf_percent)/100));
            $esi = ceil($gross_salary * (($esi_percent)/100));
            $other_insurance =  empty($salary->other_insurance) ? 0 : $salary->other_insurance;
            $other_deduction =  empty($salary->other_deduction) ? 0 : $salary->other_deduction;

            $deductions = $epf + $esi + $other_insurance + $other_deduction ;

            $net_salary = $gross_salary - $deductions;

            $earning = $employee_basic_salary +  $med_allowance + $trans_allowance + $acco_allowance + $other_allowance + $payroll->overtime_bonus + $payroll->attendance_bonus + $payroll->other_bonus ;
            $deduction = ceil($epf) +  ceil($esi) + $other_insurance + $other_deduction + $payroll->attendance_deduction + $payroll->other_deduction + $payroll->leave_deduction;

            $total_days_to_pay = ($pay_month_carbon->endOfMonth()->diffInDays(\Carbon\Carbon::parse($employee_join_date)))+1;
            // dd($pay_month_carbon->endOfMonth());
            // dd($total_days_to_pay);

            $basic_salary = $salary->basic_salary;

            $employee_basic_salary = $employee_basic_salary;

            $first_month_deduction = round($first_paid_deduction);

            $employees = Employee::all(); 

            $user = User::find($id);
            // return view('backend.payrolls.payslip', compact('payroll','salary','employee','designation','epf','esi', 'earning', 'deduction','basic_salary','employee_basic_salary','total_days_to_pay','first_month_deduction','employees','user'));

            $pdf = PDF::loadView('backend.payrolls.payslip', compact('payroll','salary','employee','designation','epf','esi', 'earning', 'deduction','basic_salary','employee_basic_salary','total_days_to_pay','first_month_deduction','employees','user'))->save(public_path('backendtemplate/pdf/'.$payroll->id.'.pdf'));
            
            $payslip = [
            'pdf' => 'backendtemplate/pdf/'.$payroll->id.'.pdf',
            'month' => $payroll->payment_month,
            'employee_name' => $employee->username,
            ];

            // if(){
                
            // }

            // $receiver = 
            Mail::to($employee->email, $employee->username)->send(new SendPaySlip($payslip));

            $payroll = Payroll::find($id);

            $payroll->status = 1;

            $payroll->save();

            return redirect()->route('payrolls.index')->with('status',4);

            // return view('backend.payrolls.show',compact('payroll','salary','employee','designation','epf','esi', 'earning', 'deduction','basic_salary','employee_basic_salary','total_days_to_pay','first_month_deduction','employees','user'));

        }else{

            $payroll = Payroll::findOrFail($id);
            $salary_array = Salary::where('employee_id', $payroll->employee_id)->get();
            $employee_array = Employee::where('id', $payroll->employee_id)->get();
            $employee = $employee_array[0];
            $designation_array = Designation::where('id', $employee->designation_id)->get();
            $salary = $salary_array[0];
            $designation =  $designation_array[0];

            $epf = $salary->gross_salary * (($salary->epf)/100);
            $esi = $salary->gross_salary * (($salary->esi)/100);
        // dd($payroll->overtime_bonus);
            $earning = $salary->basic_salary +  $salary->medical_allowance + $salary->transport_allowance + $salary->accomodation_allowance + $salary->other_allowance + $payroll->overtime_bonus + $payroll->attendance_bonus + $payroll->other_bonus ;
            $deduction = ceil($epf) +  ceil($esi) + $salary->other_insurance + $salary->other_deduction + $payroll->attendance_deduction + $payroll->other_deduction + $payroll->leave_deduction;
            $basic_salary = $salary->basic_salary;
            $total_days_to_pay = 0;
            $employees = Employee::all(); 
            $user = User::find(1);
            // return view('backend.payrolls.payslip',compact('payroll','salary','employee','designation','epf','esi', 'earning', 'deduction','basic_salary','total_days_to_pay','employees','user'));
            $pdf = PDF::loadView('backend.payrolls.payslip', compact('payroll','salary','employee','designation','epf','esi', 'earning', 'deduction','basic_salary','total_days_to_pay','employees','user'))->save(public_path('backendtemplate/pdf/'.$payroll->id.'.pdf'));

            $payslip = [
            'pdf' => 'backendtemplate/pdf/'.$payroll->id.'.pdf',
            'month' => $payroll->payment_month,
            'employee_name' => $employee->username,
            ];

            // if(){
                
            // }

            // $receiver = 
            Mail::to($employee->email)->send(new SendPaySlip($payslip));

            $payroll = Payroll::find($id);

            $payroll->status = 1;

            $payroll->save();

            return redirect()->route('payrolls.index')->with('status',4);


            // return view('backend.payrolls.show',compact('payroll','salary','employee','designation','epf','esi', 'earning', 'deduction','basic_salary','total_days_to_pay','employees','user'));

        }     





        // $pdf = PDF::loadView('backend.payrolls.payslip', $booking)->save(public_path('backend/pdf/'.$booking->bookingid.'.pdf'));

        // $pdf = PDF::loadView('backend.test.test', $data);
        // return $pdf->download('invoice.pdf');

     //    try{
     //        Mail::send('backend.test.test', $data, function($message)use($data,$pdf) {
     //            $message->to($data["email"], $data["client_name"])
     //            ->subject($data["subject"])
     //            ->attachData($pdf->output(), "invoice.pdf");
     //        });
     //    }catch(JWTException $exception){
     //        $this->serverstatuscode = "0";
     //        $this->serverstatusdes = $exception->getMessage();
     //    }
     //    if (Mail::failures()) {
     //       $this->statusdesc  =   "Error sending mail";
     //       $this->statuscode  =   "0";

     //   }else{

     //     $this->statusdesc  =   "Message sent Succesfully";
     //     $this->statuscode  =   "1";
     // }
     // return response()->json(compact('this'));
 }


    public function changePaid($id)
    {
        $payroll = Payroll::find($id);

        $payroll->status = 1;

        $payroll->save();

        // $status = ;
        // return redirect()->route('payrolls.index')->with('status',$status);
    }



    public function getEmployeeForPayroll(Request $request)
    {
        // $date = explode("-", $request->date);

        $paid_emps = Payroll::select('employee_id')
        ->where('payment_month', [$request->date])->get();

        $paid_emp_id_array = array();
        foreach ($paid_emps as $key => $paid_emp) {
            if (!in_array($paid_emp["employee_id"], $paid_emp_id_array)) {
                array_push($paid_emp_id_array, $paid_emp["employee_id"] );
            }
        }

        // dd($paid_emp_id_array);


        $emps = Employee::all();

        $emp_id_array = array();
        foreach ($emps as $key => $emp) {
            if (!in_array($emp["id"], $emp_id_array)) {  
                array_push($emp_id_array, $emp["id"] );
            }
        }

        $unpaid_emp_id_array = array_diff($emp_id_array, $paid_emp_id_array);

        // dd($unpaid_emp_id_array );





        $employees = Employee::all();

        $return_emp_id_array = array();
        foreach ($unpaid_emp_id_array as $key => $unpaid_emp_id) {

            if ($unpaid_emp_id != null) {
                // dd($unpaid_emp_id);
                foreach ($employees as $key => $employee) {
                    if($employee->id == $unpaid_emp_id){
                        $return_emp_id_array[$unpaid_emp_id] = $employee->username;
                    }
                }
                
             // array_push($emp_id_array, $emp["employee_id"] );
         }
     }

        // dd($return_emp_id_array["9"]);

        // $unpaid_emps = json_encode($return_emp_id_array);
        
        // dd($unpaid_emps);
        return response()->json(array(
                'emps' => $return_emp_id_array,
                
            ));


    }



    public function getSalary(Request $request,$id)
    {
        $date = explode("-", $request->date);
        $month = $date[1];
        $year = $date[0];

        $employee = Employee::find($id);
        $employee_join_date = $employee->join_date;

        $employee_date = explode("-", $employee_join_date);
        $employee_month = $employee_date[1];
        $employee_year = $employee_date[0];
        // dd('join_month=>'.$employee_month.'payment_month=>'.$month);
        if($employee_month == $month && $employee_year == $year){
            $employee_salary = Salary::where('employee_id', $id)->get();
            $salary = $employee_salary[0];

            $join_date_carbon = new \Carbon\Carbon($employee_join_date);
            $pay_month_carbon = new \Carbon\Carbon($request->date);
            // dd($pay_month_carbon);
            $no_of_days = $pay_month_carbon->daysInMonth;
            // dd($no_of_days);
            // dd($salary[0]["basic_salary"]);
            $one_day_paid = $salary->basic_salary / $no_of_days;
            $total_days_to_deduct = $pay_month_carbon->diffInDays(\Carbon\Carbon::parse($employee_join_date));
            // dd($total_days_to_deduct);
            $first_paid_deduction = $one_day_paid * $total_days_to_deduct;
            // dd(round($first_paid_deduction));
            $employee_basic_salary = $salary->basic_salary - round($first_paid_deduction);
            // dd($employee_basic_salary);



            $epf_percent =  empty($salary->epf) ? 0 : $salary->epf;
            $esi_percent =  empty($salary->esi) ? 0 : $salary->esi;
            $med_allowance =  empty($salary->medical_allowance) ? 0 : $salary->medical_allowance;
            $trans_allowance =  empty($salary->transport_allowance) ? 0 : $salary->transport_allowance;
            $acco_allowance =  empty($salary->accomodation_allowance) ? 0 : $salary->accomodation_allowance;
            $other_allowance =  empty($salary->other_allowance) ? 0 : $salary->other_allowance;
        // $oKubus->save();

         // dd("Hi");


            $allowances = $med_allowance + $trans_allowance + $acco_allowance + $other_allowance;

            $gross_salary = $employee_basic_salary + $allowances;
        // end gross salary


        // deductions
            $epf = ceil($gross_salary * (($epf_percent)/100));
            $esi = ceil($gross_salary * (($esi_percent)/100));
            $other_insurance =  empty($salary->other_insurance) ? 0 : $salary->other_insurance;
            $other_deduction =  empty($salary->other_deduction) ? 0 : $salary->other_deduction;

            $deductions = $epf + $esi + $other_insurance + $other_deduction ;

            $net_salary = $gross_salary - $deductions;

            // dd($gross_salary.', '.$deductions.', '.$net_salary );

            return response()->json(array(
                'gross_salary' => $gross_salary,
                'deductions' => $deductions,
                'net_salary' => $net_salary,
            ));
        }else{
            $salary_array = Salary::where('employee_id', $id)->get();
            $salary = $salary_array[0];
            return response()->json(array(
                'gross_salary' => $salary["gross_salary"],
                'deductions' => $salary["total_deduction"],
                'net_salary' => $salary["net_salary"],
            ));
        }
        // return view('backend.salaries.edit',compact('salary'));
    }

    public function getOvertime(Request $request,$id)
    {
        $date = explode("-", $request->date);
        $month = $date[1];
        $year = $date[0];
        // return response()->json(array(
        //     'id' => $request->id,
        //     'date' => $request->date,
        // ));
        $basic_salary = Salary::select('basic_salary')
        ->where('employee_id', $id)->get();
        $overtime = Overtime::select('overtime_hour', 'overtime_rate')
        ->where('employee_id', $request->id)
        ->whereMonth('overtime_date', '=', $month)
        ->whereYear('overtime_date', '=', $year)
        ->get();
        // $overtime_rate = Overtime::select('overtime_rate')
        //                             ->where('employee_id', $request->id)
        //                             ->whereMonth('overtime_date', '<', '10')
        //                             ->whereYear('overtime_date', '=', '2019')
        //                             ->get();
        // $overtime = Overtime::find($salary->employee_id);
        return response()->json(array(
            'overtime' => $overtime,
            'basic_salary' => $basic_salary,
        ));
    }

    public function getLeave(Request $request,$id)
    {
        $total_leave_in_current_year = 0;
        $date = explode("-", $request->date);
        $month = $date[1];
        $year = $date[0];
        $date_carbon = new \Carbon\Carbon($year.'-'.$month.'-01');
        $toDate = $date_carbon->endOfMonth()->toDateString();

        $toDateArray = explode("-", $toDate);
        $to_day = $toDateArray[2];
        $to_month = $toDateArray[1];
            // $last_month = $date[1];
            // $last_year = $date[0];

        $employee_join_date_array = Employee::select('join_date')
        ->where('id', $id)->get();

        $employee_join_date = $employee_join_date_array[0]['join_date'];

        $join_date = explode("-", $employee_join_date);
        $from_day = $join_date[2];
        $from_month = $join_date[1];
        $from_year = $join_date[0];
        $total_leave_to_deduct = 0;




        $from_carbon = new \Carbon\Carbon($employee_join_date);
        $from_next_month_carbon = $from_carbon->addMonthsNoOverflow(1);
        // dd($from_next_month_carbon);
        $from_next_month_carbon_array = explode("-", $from_next_month_carbon);
        $from_next_day_carbon = $from_next_month_carbon_array[2];
        $from_next_month_carbon = $from_next_month_carbon_array[1];
        $from_next_year_carbon = $from_next_month_carbon_array[0];

        $from_prev_month_carbon = $from_carbon->subMonthsNoOverflow(2);
        // dd($from_next_month_carbon);
        $from_prev_month_carbon_array = explode("-", $from_prev_month_carbon);
        $from_prev_day_carbon = $from_prev_month_carbon_array[2];
        $from_prev_month_carbon = $from_prev_month_carbon_array[1];
        $from_prev_year_carbon = $from_prev_month_carbon_array[0];






        $join_date_with_payment_carbon = new \Carbon\Carbon(($year-1).'-'.$from_month.'-01');
        $join_next_date_with_payment_carbon = $join_date_with_payment_carbon->addMonthsNoOverflow(1);
        // dd($from_next_month_carbon);
        $join_next_date_with_payment_carbon_array = explode("-", $join_next_date_with_payment_carbon);
        $join_next_day_with_payment_carbon = $join_next_date_with_payment_carbon_array[2];
        $join_next_month_with_payment_carbon = $join_next_date_with_payment_carbon_array[1];
        $join_next_year_with_payment_carbon = $join_next_date_with_payment_carbon_array[0];

        $join_prev_date_with_payment_carbon = $join_date_with_payment_carbon->subMonthsNoOverflow(2);
        // dd($from_next_month_carbon);
        $join_prev_date_with_payment_carbon_array = explode("-", $join_prev_date_with_payment_carbon);
        $join_prev_day_with_payment_carbon = $join_prev_date_with_payment_carbon_array[2];
        $join_prev_month_with_payment_carbon = $join_prev_date_with_payment_carbon_array[1];
        $join_prev_year_with_payment_carbon = $join_prev_date_with_payment_carbon_array[0];







        $month_carbon = new \Carbon\Carbon($request->date);
        $next_month_carbon = $month_carbon->addMonthsNoOverflow(1);
        // dd($from_next_month_carbon);
        $next_month_carbon_array = explode("-", $next_month_carbon);
        $next_day_carbon = $next_month_carbon_array[2];
        $next_month = $next_month_carbon_array[1];
        $next_year_carbon = $next_month_carbon_array[0];

        $prev_month_carbon = $month_carbon->subMonthsNoOverflow(2);
        // dd($from_next_month_carbon);
        $prev_month_carbon_array = explode("-", $prev_month_carbon);
        $prev_day_carbon = $prev_month_carbon_array[2];
        $prev_month = $prev_month_carbon_array[1];
        $prev_year_carbon = $prev_month_carbon_array[0];

        // dd($prev_month.','.$prev_year_carbon);

        // dd($from_month.','.$to_month);

        // dd($from_month_carbon);

        // dd($from_month_carbon);
            // dd("frommonth- "."0".($from_month-1).' and month-'.$month);
        if($from_month > $to_month ){
                // dd("Hi");

            $fromDate = new \Carbon\Carbon(($year-1).'-'.$from_month.'-'.'01');


            $from = $fromDate;
            $to = $toDate;

            // dd($from.','.$to);

            $leave_count = Leave::where('employee_id', $request->id)
            ->whereBetween('leave_date', [$from, $to])
            ->where('status',1)
            ->get()->sum('total_leave_day');

            $total_leave_count = $leave_count + $total_leave_in_current_year;

                // dd($total_leave_count);
                // dd(($from_month-1).' , '.($year-1));

            $leaves = Leave::select('leave_date','total_leave_day')
            ->where('employee_id', $id)
            ->whereMonth('leave_date', '=', ($from_prev_month_carbon))
            ->whereYear('leave_date', '=', ($year-1))
            ->where('status',1)
            ->get();

                // dd($leaves);

            if(sizeof($leaves) !== 0){
                    // dd("HIi");
                foreach ($leaves as $key => $leave) {

                $leave_from = $leave['leave_date'];
                $total_leave_day = $leave['total_leave_day'];
                $leave_from_carbon = new \Carbon\Carbon($leave_from);
                $leave_to = $leave_from_carbon->addDays($total_leave_day-1)->toDateString();
                // dd($leave_to);
                $leave_from_array = explode("-", $leave_from);
                $leave_from_month = $leave_from_array[1];

                $leave_to_array = explode("-", $leave_to);
                $leave_to_month = $leave_to_array[1];

                $leave_to_carbon = \Carbon\Carbon::parse($leave_to);

                // dd($leave_from_month.','.$from_prev_month_carbon.','.$leave_to_month.','.$from_month);

                if($leave_from_month == ($from_prev_month_carbon) && $leave_to_month == $from_month){

                    // if($month == $from_month){
                        // dd("Hi");
                    //     // $total_leave_in_current_year += 
                    // dd($leave_to_carbon->startOfMonth()->diffInDays(\Carbon\Carbon::parse($leave_to)));
                    // }elseif($month == ($from_prev_month_carbon)){

                        $total_leave_count = $total_leave_count + (($leave_to_carbon->startOfMonth()->diffInDays(\Carbon\Carbon::parse($leave_to)))+1);
                    // }

                

                }
                // dd($total_leave_count);
            } 
        }

            $leaves = Leave::select('leave_date','total_leave_day')
            ->where('employee_id', $id)
            ->whereMonth('leave_date', '=', ($month))
            ->whereYear('leave_date', '=', ($year))
            ->where('status',1)
            ->get();

                // dd($leaves);

            if(sizeof($leaves) !== 0){
                    // dd("HIi");
                foreach ($leaves as $key => $leave) {

                $leave_from = $leave['leave_date'];
                $total_leave_day = $leave['total_leave_day'];
                $leave_from_carbon = new \Carbon\Carbon($leave_from);
                $leave_to = $leave_from_carbon->addDays($total_leave_day-1)->toDateString();
                // dd($leave_to);
                $leave_from_array = explode("-", $leave_from);
                $leave_from_month = $leave_from_array[1];

                $leave_to_array = explode("-", $leave_to);
                $leave_to_month = $leave_to_array[1];

                $leave_to_carbon = \Carbon\Carbon::parse($leave_to);

                // dd($leave_from_month.','.$month.','.$leave_to_month.','.$next_month);

                if($leave_from_month == ($month) && $leave_to_month == $next_month){

                    // if($month == $from_month){
                        // dd("Hi");
                    //     // $total_leave_in_current_year += 
                    // dd(($leave_to_carbon->startOfMonth()->diffInDays(\Carbon\Carbon::parse($leave_to)))+1);
                    // }elseif($month == ($from_prev_month_carbon)){

                        $total_leave_count = $total_leave_count - (($leave_to_carbon->startOfMonth()->diffInDays(\Carbon\Carbon::parse($leave_to)))+1);
                    // }

                

                }
                // dd($total_leave_count);
            } 
        }




        }elseif($from_month < $to_month){

            $fromDate = new \Carbon\Carbon($year.'-'.$from_month.'-'.'01');

            $from = $fromDate;
            $to = $toDate;

                // dd('From-'.$from.' -> To-'.$to); 

            $leave_count = Leave::where('employee_id', $request->id)
            ->whereBetween('leave_date', [$from, $to])
            ->where('status',1)
            ->get()->sum('total_leave_day');

            $total_leave_count = $leave_count + $total_leave_in_current_year;

                // dd($total_leave_count);

                // $leave = Leave::select('leave_date','total_leave_day')
                // ->where('employee_id', $id)
                // ->whereMonth('leave_date', '=', ($from_month-1))
                // ->whereYear('leave_date', '=', ($year-1))
                // ->get();

                // // dd($leave);

                // if(sizeof($leave) !== 0){
                //     // dd("HIi");

                //     $leave_from = $leave[0]['leave_date'];
                //     $total_leave_day = $leave[0]['total_leave_day'];
                //     $leave_from_carbon = new \Carbon\Carbon($leave_from);
                //     $leave_to = $leave_from_carbon->addDays($total_leave_day)->toDateString();

                //     $leave_from_array = explode("-", $leave_from);
                //     $leave_from_month = $leave_from_array[1];

                //     $leave_to_array = explode("-", $leave_to);
                //     $leave_to_month = $leave_to_array[1];

                //     $leave_to_carbon = \Carbon\Carbon::parse($leave_to);

                //     if($leave_from_month == ($from_month-1) && $leave_to_month == $from_month){

                //         if($month == $from_month){
                //         // $total_leave_in_current_year += ($leave_to_carbon->startOfMonth()->diffInDays(\Carbon\Carbon::parse($leave_to)));
                //         }elseif($month == ($from_month-1)){

                //             $total_leave_count = $total_leave_count + ($leave_to_carbon->startOfMonth()->diffInDays(\Carbon\Carbon::parse($leave_to)));
                //         }

                //     // dd($total_leave_in_current_year);

                //     }
                // }

                // dd(($from_month-1).' , '.($year));

            $leaves = Leave::select('leave_date','total_leave_day')
            ->where('employee_id', $id)
            ->whereMonth('leave_date', '=', ($from_prev_month_carbon))
            ->whereYear('leave_date', '=', ($year))
            ->where('status',1)
            ->get();

                // dd($leaves);

            if(sizeof($leaves) !== 0){

                foreach ($leaves as $key => $leave) {

                    $leave_from = $leave['leave_date'];
                    $total_leave_day = $leave['total_leave_day'];
                    $leave_from_carbon = new \Carbon\Carbon($leave_from);
                    $leave_to = $leave_from_carbon->addDays($total_leave_day-1)->toDateString();
                // dd($leave_to);
                    $leave_from_array = explode("-", $leave_from);
                    $leave_from_month = $leave_from_array[1];

                    $leave_to_array = explode("-", $leave_to);
                    $leave_to_month = $leave_to_array[1];

                    $leave_to_carbon = \Carbon\Carbon::parse($leave_to);

                    // dd('leave = '.$leave_to_carbon.' leave-start-date = '.$leave_to_carbon->startOfMonth());


                    if($leave_from_month == ($from_prev_month_carbon) && $leave_to_month == $from_month){

                        if($month == $from_month){
                            dd("Hi");
                        // $total_leave_in_current_year += ($leave_to_carbon->startOfMonth()->diffInDays(\Carbon\Carbon::parse($leave_to)));
                        }elseif($month > ($from_prev_month_carbon)){
                            // dd(($leave_to_carbon->startOfMonth()->diffInDays(\Carbon\Carbon::parse($leave_to))));
                            $total_leave_count = $total_leave_count + (($leave_to_carbon->startOfMonth()->diffInDays(\Carbon\Carbon::parse($leave_to)))+1);
                        }

                    // dd($total_leave_in_current_year);

                    }
                }
            }

            // dd($total_leave_count);

            $leaves = Leave::select('leave_date','total_leave_day')
            ->where('employee_id', $id)
            ->whereMonth('leave_date', '=', ($month))
            ->whereYear('leave_date', '=', ($year))
            ->where('status',1)
            ->get();

                // dd($leaves);

            if(sizeof($leaves) !== 0){
                    // dd("HIi");
                foreach ($leaves as $key => $leave) {

                    $leave_from = $leave['leave_date'];
                    $total_leave_day = $leave['total_leave_day'];
                    $leave_from_carbon = new \Carbon\Carbon($leave_from);
                    $leave_to = $leave_from_carbon->addDays($total_leave_day-1)->toDateString();
                // dd($leave_to);
                    $leave_from_array = explode("-", $leave_from);
                    $leave_from_month = $leave_from_array[1];

                    $leave_to_array = explode("-", $leave_to);
                    $leave_to_month = $leave_to_array[1];

                    $leave_to_carbon = \Carbon\Carbon::parse($leave_to);

                // dd($leave_from_month.','.$month.','.$leave_to_month.','.$next_month);

                    if($leave_from_month == ($month) && $leave_to_month == $next_month){

                    // if($month == $from_month){
                        // dd("Hi");
                    //     // $total_leave_in_current_year += 
                    // dd(($leave_to_carbon->startOfMonth()->diffInDays(\Carbon\Carbon::parse($leave_to)))+1);
                    // }elseif($month == ($from_prev_month_carbon)){

                        $total_leave_count = $total_leave_count - ($leave_to_carbon->startOfMonth()->diffInDays(\Carbon\Carbon::parse($leave_to)));
                    // }



                    }
                // dd($total_leave_count);
                } 
            }




        }else{

            $fromDate = new \Carbon\Carbon($year.'-'.$from_month.'-'.'01');

            $from = $fromDate;
            $to = $toDate;

                // dd("from- ".$from.' and to-'.$to);

            $leave_count = Leave::where('employee_id', $request->id)
            ->whereBetween('leave_date', [$from, $to])
            ->where('status',1)
            ->get()->sum('total_leave_day');

            $total_leave_count = $leave_count + $total_leave_in_current_year;


            // dd($leave_count);

            $leaves = Leave::select('leave_date','total_leave_day')
            ->where('employee_id', $id)
            ->whereMonth('leave_date', '=', ($from_prev_month_carbon))
            ->whereYear('leave_date', '=', ($year)) 
            ->where('status',1)
            ->get();

            if(sizeof($leaves) !== 0){

                foreach ($leaves as $key => $leave) {

                    $leave_from = $leave['leave_date'];
                    $total_leave_day = $leave['total_leave_day'];
                    $leave_from_carbon = new \Carbon\Carbon($leave_from);
                    $leave_to = $leave_from_carbon->addDays($total_leave_day-1)->toDateString();
                // dd($leave_to);
                    $leave_from_array = explode("-", $leave_from);
                    $leave_from_month = $leave_from_array[1];

                    $leave_to_array = explode("-", $leave_to);
                    $leave_to_month = $leave_to_array[1];

                    $leave_to_carbon = \Carbon\Carbon::parse($leave_to);

                // dd('Leave: From-'.$leave_from_month.' -> To-'.$leave_to_month.'   AND Join: Original-'.$from_month.' -> Minus-'.($from_month-1) ); 

                // dd('leave = '.$leave_to_carbon.' leave-start-date = '.$leave_to_carbon->startOfMonth());

                // dd($leave_to_carbon->startOfMonth()->diffInDays(\Carbon\Carbon::parse($leave_to)));

                
                if($leave_from_month == ($from_prev_month_carbon) && $leave_to_month == $from_month){
                    // dd("Entered");
                    if($month == $from_month){
                        // dd($month.','.$from_month);
                        // dd($leave_to_carbon->startOfMonth()->diffInDays(\Carbon\Carbon::parse($leave_to)));
                        $total_leave_count = $total_leave_count + ($leave_to_carbon->startOfMonth()->diffInDays(\Carbon\Carbon::parse($leave_to))+1);

                        // $total_leave_to_deduct = ($leave_to_carbon->startOfMonth()->diffInDays(\Carbon\Carbon::parse($leave_to)));

                        // dd($total_leave_in_current_year);
                    }
                    
                    // dd($total_leave_to_deduct);

                }

            }
            
        }

        // dd($total_leave_count);

        $leaves = Leave::select('leave_date','total_leave_day')
            ->where('employee_id', $id)
            ->whereMonth('leave_date', '=', ($month))
            ->whereYear('leave_date', '=', ($year))
            ->where('status',1)
            ->get();

                // dd($leaves);

            if(sizeof($leaves) !== 0){
                    // dd("HIi");
                foreach ($leaves as $key => $leave) {

                    $leave_from = $leave['leave_date'];
                    $total_leave_day = $leave['total_leave_day'];
                    $leave_from_carbon = new \Carbon\Carbon($leave_from);
                    $leave_to = $leave_from_carbon->addDays($total_leave_day-1)->toDateString();
                // dd($leave_to);
                    $leave_from_array = explode("-", $leave_from);
                    $leave_from_month = $leave_from_array[1];

                    $leave_to_array = explode("-", $leave_to);
                    $leave_to_month = $leave_to_array[1];

                    $leave_to_carbon = \Carbon\Carbon::parse($leave_to);

                // dd($leave_from_month.','.$month.','.$leave_to_month.','.$next_month);

                    if($leave_from_month == ($month) && $leave_to_month == $next_month){

                    // if($month == $from_month){
                        // dd("Hi");
                    //     // $total_leave_in_current_year += 
                    // dd(($leave_to_carbon->startOfMonth()->diffInDays(\Carbon\Carbon::parse($leave_to)))+1);
                    // }elseif($month == ($from_prev_month_carbon)){
                        // dd($total_leave_count);
                        // dd($total_leave_day);
                        // dd(($leave_to_carbon->startOfMonth()->diffInDays(\Carbon\Carbon::parse($leave_to)))+1);

                        $total_leave_count = $total_leave_count - (($leave_to_carbon->startOfMonth()->diffInDays(\Carbon\Carbon::parse($leave_to)))+1);
                    // }



                    }
                // dd($total_leave_count);
                } 
            }
    }


            // $from = $fromDate;
            // $to = $toDate;



        $leave_allowance_array = Salary::select('leave_allowance')
        ->where('employee_id', $id)->get();
        $leave_allowance = $leave_allowance_array[0]['leave_allowance'];


        $month_carbon = new \Carbon\Carbon($request->date);
        $next_month_carbon = $month_carbon->addMonthsNoOverflow(1);
        // dd($from_next_month_carbon);
        $next_month_carbon_array = explode("-", $next_month_carbon);
        $next_day_carbon = $next_month_carbon_array[2];
        $next_month = $next_month_carbon_array[1];
        $next_year_carbon = $next_month_carbon_array[0];

        $prev_month_carbon = $month_carbon->subMonthsNoOverflow(2);
        // dd($from_next_month_carbon);
        $prev_month_carbon_array = explode("-", $prev_month_carbon);
        $prev_day_carbon = $prev_month_carbon_array[2];
        $prev_month = $prev_month_carbon_array[1];
        $prev_year_carbon = $prev_month_carbon_array[0];



        

        // dd($next_month_leave);



        // if($total_leave_to_deduct == 0) {


            $leaves = Leave::select('leave_date','total_leave_day')
            ->where('employee_id', $id)
            ->whereMonth('leave_date', '=', ($month))
            ->whereYear('leave_date', '=', ($year)) 
            ->where('status',1)
            ->get();

            // dd($leaves.','.$total_leave_to_deduct);

            if(sizeof($leaves) !== 0){
                foreach ($leaves as $key => $leave) {
                    $leave_from = $leave['leave_date'];
                    $total_leave_day = $leave['total_leave_day'];

                    // $total_leave_to_deduct += $total_leave_day;

                    $leave_from_carbon = new \Carbon\Carbon($leave_from);

                    

                    // dd($total_leave_day);
                    

                    $leave_to = $leave_from_carbon->addDays($total_leave_day)->toDateString();

                    // dd($leave_to);

                    $leave_from_array = explode("-", $leave_from);
                    $leave_from_month = $leave_from_array[1];

                    $leave_to_array = explode("-", $leave_to);
                    $leave_to_month = $leave_to_array[1];

                    $leave_to_carbon = \Carbon\Carbon::parse($leave_to);

                // dd('Leave: From-'.$leave_from_month.' -> To-'.$leave_to_month.'   AND Join: Original-'.$month.' -> Minus-'.($next_month) ); 



                // dd('leave = '.$leave_to_carbon.' leave-start-date = '.$leave_to_carbon->startOfMonth());

                // dd($leave_to_carbon->startOfMonth()->diffInDays(\Carbon\Carbon::parse($leave_to)));


                    if($leave_from_month == ($month) && $leave_to_month == $next_month){
                        $next_leave_from_carbon = $leave_from_carbon->addMonthsNoOverflow(1);
                        $next_leave_from_carbon_array = explode("-", $next_leave_from_carbon);
                        $next_day_leave = $next_leave_from_carbon_array[2];
                        $next_month_leave = $next_leave_from_carbon_array[1];
                        $next_year_leave = $next_leave_from_carbon_array[0];

                        // dd($leave_to_carbon->startOfMonth()->diffInDays(\Carbon\Carbon::parse($leave_to)));
                    // dd("Entered");
                        // if($month == ($leave_from_month)){
                                
                        //     dd($leave_from_month);
                        //     $total_leave_to_deduct = ($leave_to_carbon->startOfMonth()->diffInDays(\Carbon\Carbon::parse($leave_to)));

                                
                        // }elseif($month == ($next_month_leave)){
                            $total_leave_to_deduct = $total_leave_to_deduct + ($total_leave_day - ($leave_to_carbon->startOfMonth()->diffInDays(\Carbon\Carbon::parse($leave_to))));


                        // dd($total_leave_day - ($leave_to_carbon->startOfMonth()->diffInDays(\Carbon\Carbon::parse($leave_to))));
                        // }

                    // dd($total_leave_to_deduct);

                    }else{
                        $total_leave_to_deduct += $total_leave_day;
                    }
                }
                

            }
            // dd($total_leave_to_deduct);


            $leaves = Leave::select('leave_date','total_leave_day')
            ->where('employee_id', $id)
            ->whereMonth('leave_date', '=', ($prev_month))
            ->whereYear('leave_date', '=', ($prev_year_carbon)) 
            ->where('status',1)
            ->get();

            // dd($leaves);

            if(sizeof($leaves) !== 0){
                foreach ($leaves as $key => $leave) {
                    $leave_from = $leave['leave_date'];
                    $total_leave_day = $leave['total_leave_day'];

                    $leave_from_carbon = new \Carbon\Carbon($leave_from);



                    $leave_to = $leave_from_carbon->addDays($total_leave_day)->toDateString();

                    $leave_from_array = explode("-", $leave_from);
                    $leave_from_month = $leave_from_array[1];

                    $leave_to_array = explode("-", $leave_to);
                    $leave_to_month = $leave_to_array[1];

                    $leave_to_carbon = \Carbon\Carbon::parse($leave_to);

                // dd('Leave: From-'.$leave_from_month.' -> To-'.$leave_to_month.'   AND Join: Original-'.($prev_month).' -> Minus-'.($month) ); 

                // dd('leave = '.$leave_to_carbon.' leave-start-date = '.$leave_to_carbon->startOfMonth());

                // dd($leave_to_carbon->startOfMonth()->diffInDays(\Carbon\Carbon::parse($leave_to)));


                    if($leave_from_month == ($prev_month) && $leave_to_month == $month){
                        $next_leave_from_carbon = $leave_from_carbon->addMonthsNoOverflow(1);
                        $next_leave_from_carbon_array = explode("-", $next_leave_from_carbon);
                        $next_day_leave = $next_leave_from_carbon_array[2];
                        $next_month_leave = $next_leave_from_carbon_array[1];
                        $next_year_leave = $next_leave_from_carbon_array[0];

                        // dd(($leave_to_carbon->startOfMonth()->diffInDays(\Carbon\Carbon::parse($leave_to))));
                    
                        $total_leave_to_deduct = $total_leave_to_deduct +  ($leave_to_carbon->startOfMonth()->diffInDays(\Carbon\Carbon::parse($leave_to)));

                    // dd($total_leave_to_deduct);

                    }
                }
                 

            }

            // dd($total_leave_deduction);


            // dd($leave_from.','.$total_leave_to_deduct);

            if($total_leave_count > $leave_allowance){
                // dd($leave_count.",".$leave_allowance);
                $total_leave_in_current_month = $total_leave_to_deduct;


                $employee_salary = Salary::where('employee_id', $id)->get();
                $salary = $employee_salary[0];
                $pay_month_carbon = new \Carbon\Carbon($request->date);
                $no_of_days = $pay_month_carbon->daysInMonth;
                $one_day_paid = $salary->basic_salary / $no_of_days;
                $total_leave_deduction = round($one_day_paid * $total_leave_in_current_month);

                // dd($no_of_days.', '.$salary->basic_salary. ', '.$one_day_paid);

            }else{
                $total_leave_in_current_month = 0;
                $total_leave_deduction = 0;
            }

            // dd($total_leave_deduction);



        // }

            // dd($total_leave_to_deduct);


        return response()->json(array(
            'total_leave_deduction' => $total_leave_deduction,
            'total_leave_in_current_month' => $total_leave_in_current_month,
            'leave_count' => $total_leave_count,
            'leave_allowance' => $leave_allowance,
        ));
    }
}
