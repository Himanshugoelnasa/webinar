@extends('layouts.app')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Webinars</div>
  
                <div class="card-body">
                    @component('components.alert')
                    @endcomponent
                    <div class="container table-responsive ">
                                 
                        <table id="datatable" class="table table-stripped" width="100%">
                            <thead>
                              <tr>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Qualification</th>
                                <th>Department Name</th>
                                <th>Webinar</th>
                                <th>Status</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $key=>$student)
                              <tr>
                                <td>{{$student->name}}</td>
                                <td>{{$student->type}}</td>
                                <td>{{$student->email}}</td>
                                <td>{{$student->phone}}</td>
                                <td>{{$student->qualification}}</td>
                                <td>{{$student->department_name}}</td>
                                <td>{{$student->webinar->title}}</td>
                                <td>@if($student->status==1)
                                    <span class="badge badge-success">Active</span>
                                    @else
                                    <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    @if($student->status==1)
                                    <a href="{{route('admin.student_toggle_status', $student->id)}}" class="btn btn-danger btn-sm btn-confirm"><i class="fa fa-ban"></i>&nbsp;Disable</a>
                                    @else
                                    <a href="{{route('admin.student_toggle_status', $student->id)}}" class="btn btn-success btn-sm btn-confirm"><i class="fa fa-check"></i>&nbsp;Enable</a>
                                    @endif
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
