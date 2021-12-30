@extends('backendtemplate')

@section('title', 'Department')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Designations List</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home"></i></a></li>                            
                        <li class="breadcrumb-item">Employee</li>
                        <li class="breadcrumb-item active">Designations List</li>
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
                <div class="col-sm-6 mx-auto" style="margin-top: 150px; margin-bottom: 150px;">
                    <form action="{{route('designations.update',$designation->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputEmail1">Designation Name</label>
                            <div class="form-group {{ $errors->has('designation_name') ? 'has-error' : '' }}">                      
                                <input type="text" class="form-control" name="designation_name" placeholder="Designation Name" value="{{$designation->designation_name}}">
                                <span class="text-danger">{{ $errors->first('designation_name') }}</span>
                            </div>
                            <label for="exampleInputEmail1">Department Name</label>
                            <div class="form-group">                      
                                <select class="form-control form-control-md" id="inputCategory" name="department_name">
                                    <optgroup label="Choose Category">
                                        @foreach($departments as $department)
                                        <option value="{{$department->id}}" @if($designation->department_id == $department->id)
                                            {{'selected'}} 
                                         @endif>{{$department->department_name}}</option>
                                        @endforeach 
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
        
        
    </div>
</div>


@endsection