@extends('layouts.app')
@section('page_css')
    <link href="{{ asset('//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Employees</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">List of Employees</h3>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table id="myTable" class="display">
                                <thead>
                                    <tr>
                                        <th>Employee Id</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Department</th>
                                        <th>Total Access</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employees as $employee)
                                        <tr>
                                            <td>{{ $employee->id_emp }}</td>
                                            <td>{{ $employee->firstname }}</td>
                                            <td>{{ $employee->lastname }}</td>
                                            <td>{{ $employee->department->department }}</td>
                                            <td>{{ count($employee->access) }}</td>
                                            <td>
                                                <a href="/employee/{{$employee->id}}/edit" class="btn btn-primary">Update</a>

                                                {{ Form::open(array('route' => 'change_access', 'style' => 'display: inline-block;')) }}
                                                    {{ Form::hidden('_method', 'POST') }}
                                                    <input type="hidden" value="{{ $employee->id }}" name="id"/>
                                                    <button class="btn bg-info">@if($employee->allow_access == 1) <i class="fas fa-user-alt"></i> Enabled @else <i class="fas fa-user-alt-slash"></i> Disabled @endif</button>
                                                {{ Form::close() }}
                                                <a href="/history/{{$employee->id}}/emp" class="btn btn-warning">History</a>
                                                {{ Form::open(array('url' => 'employee/' . $employee->id, 'style' => 'display: inline-block;')) }}
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
@section('page_js')
    <script src="{{ asset('//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
@endsection
