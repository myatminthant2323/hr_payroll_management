@extends('backendtemplate')

@section('title', 'Payment')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left btn-theme-link"></i></a> Employee Payment</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home btn-theme-link"></i></a></li>                            
                        <li class="breadcrumb-item">Payroll</li>
                        <li class="breadcrumb-item active">Employee Payment</li>
                    </ul>
                </div>            
                <!-- <div class="col-lg-6 col-md-4 col-sm-12 text-right">
                    <div class="bh_chart hidden-xs">
                        <div class="float-left m-r-15">
                            <small>Visitors</small>
                            <h6 class="mb-0 mt-1"><i class="icon-user btn-theme-link"></i> 1,784</h6>
                        </div>
                        <span class="bh_visitors float-right">2,5,1,8,3,6,7,5</span>
                    </div>
                    <div class="bh_chart hidden-sm">
                        <div class="float-left m-r-15">
                            <small>Visits</small>
                            <h6 class="mb-0 mt-1"><i class="icon-globe btn-theme-link"></i> 325</h6>
                        </div>
                        <span class="bh_visits float-right">10,8,9,3,5,8,5</span>
                    </div>
                    <div class="bh_chart hidden-sm">
                        <div class="float-left m-r-15">
                            <small>Chats</small>
                            <h6 class="mb-0 mt-1"><i class="icon-bubbles btn-theme-link"></i> 13</h6>
                        </div>
                        <span class="bh_chats float-right">1,8,5,6,2,4,3,2</span>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="container-fluid shadow-lg">
            <div class="row clearfix">
                <!-- <h3 class="text-center">Add Employees</h3> -->
                <div class="col-sm-10 mx-auto" style="margin-top: 10px; margin-bottom: 50px; ">
                    <form action="{{route('payrolls.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-sm-12 my-4">
                                <h3 class="d-inline">Add Payment <span class="text-danger"> (Monthly)</span></h3>
                                <span class="float-right"><a href="{{route('payrolls.index')}}" class="btn"><i class="icon-arrow-left btn-theme-link"></i></a></span>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group {{ $errors->has('payment_month') ? 'has-error' : '' }}">
                                    <label class="col-form-label">Payment Month <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-calendar"></i></span>
                                        </div>
                                        <input data-provide="datepicker" data-date-autoclose="true" class="form-control payment_month" name="payment_month" id="payment_month">
                                        <span class="text-danger">{{ $errors->first('payment_month') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group {{ $errors->has('payment_date') ? 'has-error' : '' }}">
                                    <label class="col-form-label">Payment Date <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-calendar"></i></span>
                                        </div>
                                        <input data-provide="datepicker" data-date-autoclose="true" class="form-control payment_date" data-date-format="yyyy-mm-dd" name="payment_date">
                                        <span class="text-danger">{{ $errors->first('payment_date') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Staff <span class="text-danger">*</span></label>
                                    <select class="select form-control emp_name" name="staff">
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label currency_format">Gross Salary</label>
                                    <input class="form-control" type="text" name="gross_salary" id="gross_salary" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label currency_format">Total Deduction</label>
                                    <input class="form-control" type="number" name="total_deduction" id="total_deduction" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label currency_format">Net Salary</label>
                                    <input class="form-control" type="number" name="net_salary" id="net_salary" readonly="readonly">
                                </div>
                            </div>
                            <!-- <div class="col-sm-6">
                                <div class="form-group {{ $errors->has('attendance_bonus') ? 'has-error' : '' }}">
                                    <label class="col-form-label">Attendance Bonus</label>
                                    <input class="form-control" type="number" name="attendance_bonus"  min="0">
                                    <span class="text-danger">{{ $errors->first('attendance_bonus') }}</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group {{ $errors->has('basic_salary') ? 'has-error' : '' }}">
                                    <label class="col-form-label">Other Bonus</label>
                                    <input class="form-control" type="number" name="other_bonus" min="0">
                                    <span class="text-danger">{{ $errors->first('other_bonus') }}</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group {{ $errors->has('basic_salary') ? 'has-error' : '' }}">
                                    <label class="col-form-label">Attendance Deduction</label>
                                    <input class="form-control" type="number" name="attendance_deduction"  min="0">
                                    <span class="text-danger">{{ $errors->first('attendance_deduction') }}</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group {{ $errors->has('other_deduction') ? 'has-error' : '' }}">
                                    <label class="col-form-label">Other Deduction</label>
                                    <input class="form-control" type="number" name="other_deduction"  min="0">
                                    <span class="text-danger">{{ $errors->first('other_deduction') }}</span>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group {{ $errors->has('basic_salary') ? 'has-error' : '' }}">
                                    <label class="col-form-label">Leave Allowance per year(Days) <span class="text-danger">*</span></label>
                                    <input class="form-control" type="number" name="leave_allowance">
                                    <span class="text-danger">{{ $errors->first('basic_salary') }}</span>
                                </div>
                            </div> -->

                            <div class="col-sm-12 mt-4">
                                <div class="form-row">
                                    <div class="col mr-2">
                                      <h4 style="color: green">Earnings</h4>
                                  </div>
                                  <div class="col ml-2">
                                      <h4 style="color: red">Deductions</h4>
                                  </div>
                              </div>
                          </div>
                            <!-- <div class="col-sm-6 mb-4 mt-4">
                                <h4 style="color: red">Deductions</h4>
                            </div> -->

                            <div class="col-sm-12">
                                <div class="form-row my-3">
                                    <div class="col mr-2">
                                        <label class="col-form-label">Attendance Bonus</label>
                                        <input class="form-control" type="number" name="attendance_bonus"  min="0">
                                    </div>
                                    <div class="col ml-2">
                                        <label class="col-form-label">Attendance Deduction</label>
                                        <input class="form-control" type="number" name="attendance_deduction"  min="0">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-row my-3">
                                    <div class="col mr-2">
                                       <label class="col-form-label">Other Bonus</label>
                                       <input class="form-control" type="number" name="other_bonus" min="0">
                                   </div>
                                   <div class="col ml-2">
                                    <label class="col-form-label">Other Deduction</label>
                                    <input class="form-control" type="number" name="other_deduction"  min="0">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-row my-3">
                                <div class="col-sm-12 mr-2">
                                    <label class="col-form-label">Overtime Bonus</label>
                                    <input class="form-control total_overtime_amount" type="number" name="overtime_bonus" readonly="readonly">
                                </div>
                                <!-- <div class="col ml-2">

                                </div> -->
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-row my-3">
                                <div class="col-sm-12 mr-2">
                                    <label class="col-form-label">Leave Deduction</label>
                                    <input class="form-control leave_deduction" type="number" name="leave_deduction" readonly="readonly" id="leave_deduction">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-form-label">Note</label>
                                <textarea rows="6" class="form-control no-resize" name="comment" id="leave_note"></textarea>
                            </div>
                        </div>


                    </div>
                    <input type="submit" class="btn btn-theme" name="btnAddPayment" value="Add">

                </form>
            </div>
        </div>
    </div>


</div>
</div>


@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function () {

        $("#payment_month").datepicker( {
            format: "yyyy-mm",
            startView: "months", 
            minViewMode: "months"
        });

        $("select.emp_name").attr("disabled","disabled");
        $(".payment_month").unbind('change');

        $(".payment_month").on('change',function(){
            var selectedDate = $(this).val();
            getEmployees(selectedDate);
            $("select.emp_name").removeAttr("disabled");
            $("#total_overtime_amount").val(0);
            $('#leave_note').text("");
            $("#gross_salary").val(0);
            $("#total_deduction").val(0);
            $("#net_salary").val(0);
            $("#leave_deduction").val(0);
            
           //  $.each(selectValues, function(key, value) {
           //     $('#mySelect')
           //     .append($('<option>', { value : key })
           //        .text(value));
           // });
            // var selectedEmployeeID = $(this).children("option:selected").val();
            // getSalary(selectedEmployeeID);

            $("select.emp_name").unbind('change');
            $("select.emp_name").on('change',function(){
                var selectedEmployeeID = $("select.emp_name option:selected").val();
                $("#gross_salary").val(0);
                $("#total_deduction").val(0);
                $("#net_salary").val(0);
                $('#leave_note').text("");
                $("#leave_deduction").val(0);
                // alert(selectedEmployeeID);
                if(selectedEmployeeID.includes("Select")){

                }else{
                    getSalary(selectedEmployeeID, selectedDate);
                    console.log("overtime before ajax ",selectedEmployeeID)
                    getOvertime(selectedEmployeeID , selectedDate);
                    getLeave(selectedEmployeeID , selectedDate);
                    selectedEmployeeID = "";
                }
            });


            // getOvertime(selectedEmployeeID);
        });
        $(".currency_format").digits();
    })

    function getEmployees(date) {
        console.log("employee ",date)
        $.ajax({
         type:'POST',
         url:'/getemployeeforpayroll',
         data:{
                "_token": "{{ csrf_token() }}",
                "date" : date,
                },
         success:function(response) {
            $('select.emp_name').empty();
            // alert(response["emps"]["9"]);
            if(response["emps"] != null){
                $('select.emp_name')
                 .append($("<option selected='selected'></option>")
                    .attr("value", 'default')
                    .text("Select Staff..."));
                $.each( response["emps"], function( emp_id, emp_name ) {
                    console.log(emp_id);
                 $('select.emp_name')
                 .append($("<option></option>")
                    .attr("value", emp_id)
                    .text(emp_name)); 
                    })
            }else{
                $("#gross_salary").val(0);
                $("#total_deduction").val(0);
                $("#net_salary").val(0);
            }
            // $(".payment_month").val("");
            // $("#total_overtime_amount").val(0);
        }
    });
    }

    function getLeave(id , date) {
        console.log("leave ",id)
        if(id !== "" && date !== ""){
            $.ajax({
               type:'POST',
               url:'/getleave' + '/' + id,
               data:{
                "_token": "{{ csrf_token() }}",
                "id" : id,
                "date" : date,
            },
            success:function(response) {
                console.log(response);
                var leave_count = response["leave_count"];
                var leave_allowance = response["leave_allowance"];
                var total_leave_deduction = response["total_leave_deduction"];
                var total_leave_in_current_month = response["total_leave_in_current_month"];
                if(leave_count !== null && leave_allowance !== null){
                    if(leave_count > leave_allowance){
                    // alert("hi");
                    var leave_exceeds = leave_count-leave_allowance;
                    $('#leave_note').text("* Your annual leave balance now exceeds "+leave_exceeds+" days *");
                    $("#leave_deduction").val(total_leave_deduction);
                }else if(leave_count == leave_allowance){
                    $('#leave_note').text("* All of your annual leave "+leave_allowance+"-days have been used *");
                    $("#leave_deduction").val(total_leave_deduction);
                }else{
                    $('#leave_note').text("Total leave - "+leave_count+" days.");
                    $("#leave_deduction").val(total_leave_deduction);
                }

                if(total_leave_in_current_month !== 0){
                    var old_note = $('#leave_note').text();
                    $('#leave_note').html(old_note+" &#13;&#10; Total Leave day (deduction) in Current Month - "+total_leave_in_current_month+" days");
                }else{
                    var old_note = $('#leave_note').text();
                    $('#leave_note').html(old_note+" &#13;&#10; *You have no leave day (deduction) in current Month*");
                }
            }
        }
    });
        }
    }

    

    function getSalary(id , date) {
        var selectedSalary;
        console.log("salary ",id)
        $.ajax({
         type:'POST',
         url:'/getsalary' + '/' + id,
         data:{
                "_token": "{{ csrf_token() }}",
                "id" : id,
                "date" : date,
                },
         success:function(response) {
            if(response["gross_salary"] != null){
                console.log(response);
                var gross_salary = response["gross_salary"];
                var total_deduction = response["deductions"];
                var net_salary = response["net_salary"];
                $("#gross_salary").val(gross_salary);
                $("#total_deduction").val(total_deduction);
                $("#net_salary").val(net_salary);
            }else{
                $("#gross_salary").val(0);
                $("#total_deduction").val(0);
                $("#net_salary").val(0);
            }
            // $(".payment_month").val("");
            // $("#total_overtime_amount").val(0);
        }
    });
    }

    function getOvertime(id , date) {
        var selectedOvertime;
        console.log("overtime ",id)
        if(id !== "" && date !== ""){
            $.ajax({
               type:'POST',
               url:'/getovertime' + '/' + id,
               data:{
                "_token": "{{ csrf_token() }}",
                "id" : id,
                "date" : date,
            },
            success:function(response) {
                console.log(response);
                if((response != null) && (response["overtime"][0] != null)){
                    var total_overtime_hour = 0;
                    var basic_salary = response["basic_salary"][0].basic_salary;
                    var overtime_rate = response["overtime"][0].overtime_rate;
                    $.each( response["overtime"], function( key, value ) {
                        total_overtime_hour = total_overtime_hour + response["overtime"][key].overtime_hour;
                    })
                    var hourly_basic_pay_rate = (12 * basic_salary) / (52 * 44);
                    var overtime_pay = hourly_basic_pay_rate * overtime_rate * total_overtime_hour;
                    console.log(Math.ceil(overtime_pay));
                    $(".total_overtime_amount").val(Math.ceil(overtime_pay));
                }else{
                    $(".total_overtime_amount").val(0);
                }

            }
        });
        }
    }



    $.fn.digits = function(){ 
        return this.each(function(){ 
            $(this).val( $(this).val().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
        });
    }

</script>
@endsection