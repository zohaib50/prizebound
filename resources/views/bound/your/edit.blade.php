@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>Your Bound</div>
                            <div>
                                <a href="{{route('bound.your.index')}}" class="px-3 btn btn-primary btn-sm">
                                    List
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="p-3">
                            <your-bound-edit :bound="{{$yourBound}}"></your-bound-edit>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
