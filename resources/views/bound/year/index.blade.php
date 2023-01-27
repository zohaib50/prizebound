@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>Year</div>
                            <div>
                                <a href="{{route('bound.year.create')}}" class="px-3 btn btn-primary btn-sm">
                                    Add
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <bound-year-list></bound-year-list>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
