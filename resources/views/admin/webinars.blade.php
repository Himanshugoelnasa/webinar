@extends('layouts.app')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Webinars
                    <a href="{{route('admin.webinar.add')}}" class="btn btn-primary float-right">Add New Webinar</a>
                </div>
  
                <div class="card-body">
                    @component('components.alert')
                    
                    @endcomponent
                    <div class="container table-responsive ">
                                 
                        <table id="datatable" class="table table-stripped" width="100%">
                            <thead>
                              <tr>
                                <th>Title</th>
                                <th>Place</th>
                                <th>Schedule Date</th>
                                <th>Status</th>
                                <th>No. of Students</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($webinars as $key=>$webinar)
                              <tr>
                                <td>{{$webinar->title}}</td>
                                <td>{{$webinar->place}}</td>
                                <td>{{date("F j, Y", strtotime($webinar->schedule_date))}} </td>
                                <td>@if($webinar->status==1)
                                    <span class="badge badge-success">Active</span>
                                    @else
                                    <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('admin.students')}}?id={{$webinar->id}}" class="btn btn-info"><i class="fa fa-users"></i>&nbsp;View Students ({{$webinar->students->count()}})</a>
                                </td>
                                <td>
                                    <div class="button-group">
                                    <a href="{{route('admin.webinar.edit', $webinar->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                                    @if($webinar->status==1)
                                    <a href="{{route('admin.webinars.toggle_status', $webinar->id)}}" class="btn btn-danger btn-confirm"><i class="fa fa-ban"></i>&nbsp;Disable</a>
                                    @else
                                    <a href="{{route('admin.webinars.toggle_status', $webinar->id)}}" class="btn btn-success btn-confirm"><i class="fa fa-check"></i>&nbsp;Enable</a>
                                    @endif
                                    <a href="javascript::void(0)" onClick="return generate_link({{$webinar->id}})" class="btn btn-success "><i class="fa fa-link"></i>&nbsp;Link</a>
                                </div>
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
