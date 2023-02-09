@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>Your Bound List</div>
                            <div>
                                <a href="{{route('bound.your.create')}}" class="px-3 btn btn-primary btn-sm">
                                    Create
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <your-bound-list></your-bound-list>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
