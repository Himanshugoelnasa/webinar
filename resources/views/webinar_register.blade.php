@extends('layouts.noauth')
@section('content')
@php
    $id = Request()->segment(2);
@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registration</div>
                <div class="card-body">
                     <form action="{{route('register_user')}}" method="POST">
                        @csrf
                        <input type="hidden" name="webinar_id" value="{{$id}}" required>

                        <div class="form-group">
                            <label for="pwd">Type:</label>
                            <select class="form-control @error('type') is-invalid @enderror" id="type" name="type" required>
                                <option value="">Select User Type</option>
                                <option value="Student">Student</option>
                                <option value="Faculty/Staff">Faculty/Staff</option>
                                <option value="Academia/Industry">Academia/Industry</option>
                                <option value="Research Scholar">Research Scholar</option>
                            </select>
                            @error('type')
                            <em id="type-error" class="error invalid-feedback">{{ $message }}</em>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="uname">Name:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Full Name" name="name" value="{{old('name')}}" required>
                            @error('name')
                            <em id="name-error" class="error invalid-feedback">{{ $message }}</em>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="uname">Email:</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter Email Address" name="email" value="{{old('email')}}" required>
                            @error('email')
                            <em id="email-error" class="error invalid-feedback">{{ $message }}</em>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="uname">Mobile Number:</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Enter Mobile Number" name="phone" value="{{old('phone')}}" required>
                            @error('phone')
                            <em id="phone-error" class="error invalid-feedback">{{ $message }}</em>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="uname">Qualification:</label>
                            <input type="text" class="form-control @error('qualification') is-invalid @enderror" id="qualification" placeholder="Enter Qualification" name="qualification" value="{{old('qualification')}}" required>
                            @error('qualification')
                            <em id="qualification-error" class="error invalid-feedback">{{ $message }}</em>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="uname">Organization:</label>
                            <input type="text" class="form-control @error('organization') is-invalid @enderror" id="organization" placeholder="Enter Organization" name="organization" value="{{old('organization')}}" required>
                            @error('organization')
                            <em id="organization-error" class="error invalid-feedback">{{ $message }}</em>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="uname">Department Name:</label>
                            <input type="text" class="form-control @error('department') is-invalid @enderror" id="department" placeholder="Enter Department Name" name="department" value="{{old('department')}}" required>
                            @error('department')
                            <em id="department-error" class="error invalid-feedback">{{ $message }}</em>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="uname">Faculty Designation (Only for Faculty):</label>
                            <input type="text" class="form-control @error('f_desig') is-invalid @enderror" id="f_desig" placeholder="Enter Faculty Designation" value="{{old('f_desig')}}" name="f_desig">
                            @error('title')
                            <em id="f_desig-error" class="error invalid-feedback">{{ $message }}</em>
                            @enderror
                        </div>

                        

                        <div class="form-group">
                            <label for="pwd">Address:</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Enter Address" value="{{old('address')}}" name="address" required>{{old('address')}}</textarea>
                            @error('place')
                            <em id="address-error" class="error invalid-feedback">{{ $message }}</em>
                            @enderror
                        </div>

                        <button type="submit" class="float-right btn btn-lg btn-primary">Register</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
