@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Employee</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Update Employee</h3>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            {!! Form::open(['route' => array('employee.update',$employee->id), 'method' => 'PUT']) !!}
                                @if(session()->has('status'))
                                    <p class='alert alert-success' role='alert'>
                                        {{ session('status') }}
                                    </p>
                                @endif
                                @error('id_emp')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                                <div class="mb-3">
                                    <label for="id_emp" class="form-label">Id Employee</label>
                                    <input class="form-control" type="input" name="id_emp" id="id_emp" value="{{ $employee->id_emp }}">
                                </div>
                                @error('firstname')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                                <div class="mb-3">
                                    <label for="firstname" class="form-label">Firstname</label>
                                    <input class="form-control" type="input" name="firstname" id="firstname" value="{{ $employee->firstname }}">
                                </div>
                                @error('lastname')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                                <div class="mb-3">
                                    <label for="lastname" class="form-label">Lastname</label>
                                    <input class="form-control" type="input" name="lastname" id="lastname" value="{{ $employee->lastname }}">
                                </div>
                                @error('department_id')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                                <div class="mb-3">

                                    <label for="department_id" class="form-label">Department</label>
                                    <select class="form-control" id="department_id" name="department_id">
                                        @foreach ($departments as $department )
                                            <option value="{{ $department->id }}" @if($department->id == $employee->department_id) selected @endif>{{ $department->department }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="allow_access" id="access1" value="1" @if($employee->allow_access === 1) checked @endif>
                                        <label class="form-check-label" for="access1">
                                          Access Allow
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="allow_access" id="access2" value="0" @if($employee->allow_access === 0) checked @endif>
                                        <label class="form-check-label" for="access2">
                                            Access Deny
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <input class="btn btn-primary float-right" type="submit" name="submit" id="submit" value="Save">
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
