@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">History</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">{{ $emp->firstname }} {{ $emp->lastname }}</h3>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Result</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($history as $hist)
                                        <tr>
                                            <th scope="row">{{ $hist->id }}</th>
                                            <td>{{ $hist->created_at->diffForHumans() }}</td>
                                            <td>@if($hist->result == 1) <i class="fas fa-check"></i> Could In @else <i class="fas fa-window-close"></i> Couldn't In @endif</td>
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

