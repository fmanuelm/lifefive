@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Authentication</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Room 911</h3>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            {!! Form::open(['route' => 'create_access']) !!}
                                @if(session()->has('status'))
                                    <p class='alert alert-success' role='alert'>
                                        {{ session('status') }}
                                    </p>
                                @endif
                                @if(session()->has('error'))
                                    <p class='alert alert-danger' role='alert'>
                                        {{ session('error') }}
                                    </p>
                                @endif
                                @error('id_emp')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                                <div class="mb-3">
                                    <label for="id_emp" class="form-label">ID</label>
                                    <input class="form-control" type="input" name="id_emp" id="id_emp">
                                </div>
                                <div class="mb-3 text-center">
                                    <input class="btn btn-primary" type="submit" name="submit" id="submit" value="Access">
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

