@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Import</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Import List of Employees</h3>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            {!! Form::open(['route' => 'import_employees', 'files' => true]) !!}
                                @if(session()->has('status'))
                                    <p class='alert alert-success' role='alert'>
                                        {{ session('status') }}
                                    </p>
                                @endif
                                @error('uploaded_file')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                                <div class="mb-3">
                                    <label for="uploaded_file" class="form-label">Specific the CSV file</label>
                                    <input class="form-control" type="file" name="uploaded_file" id="uploaded_file">
                                </div>
                                <div class="mb-3">
                                    <input class="btn btn-primary" type="submit" name="submit" id="submit" value="Upload File">
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

