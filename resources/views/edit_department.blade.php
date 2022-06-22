@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Department</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Update Department</h3>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            {!! Form::open(['route' => array('department.update',$department->id), 'method' => 'PUT']) !!}
                                @if(session()->has('status'))
                                    <p class='alert alert-success' role='alert'>
                                        {{ session('status') }}
                                    </p>
                                @endif
                                @error('department')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                                <div class="mb-3">
                                    <label for="department" class="form-label">Name of Department</label>
                                    <input class="form-control" type="input" name="department" id="department" value="{{ $department->department }}">
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

