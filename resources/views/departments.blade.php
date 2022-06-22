@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Departments</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">List of The Departments</h3>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($departments as $department)
                                        <tr>
                                            <th scope="row">{{ $department->id }}</th>
                                            <td>{{ $department->department }}</td>
                                            <td>
                                                <a href="/department/{{$department->id}}/edit" class="btn btn-primary">Edit</a>
                                                {{ Form::open(array('url' => 'department/' . $department->id, 'style' => 'display: inline-block;')) }}
                                                    {{ Form::hidden('_method', 'DELETE') }}
                                                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                                                {{ Form::close() }}
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
    </section>
@endsection

