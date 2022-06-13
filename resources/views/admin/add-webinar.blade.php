@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Webinar</div>
                <div class="card-body">
                     <form action="{{route('admin.webinar.store')}}" method="POST">
                        @csrf
                      <div class="form-group">
                        <label for="uname">Title:</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter Title" name="title" required>
                        @error('title')
                        <em id="title-error" class="error invalid-feedback">{{ $message }}</em>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="pwd">Schedule Date:</label>
                        <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" placeholder="Enter Date" name="date" required>
                        @error('date')
                        <em id="date-error" class="error invalid-feedback">{{ $message }}</em>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="pwd">Place:</label>
                        <input type="text" class="form-control @error('place') is-invalid @enderror" id="place" placeholder="Enter PLace" name="place" required>
                        @error('place')
                        <em id="place-error" class="error invalid-feedback">{{ $message }}</em>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="pwd">Status:</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        @error('place')
                        <em id="place-error" class="error invalid-feedback">{{ $message }}</em>
                        @enderror
                      </div>

                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
