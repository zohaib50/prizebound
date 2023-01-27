@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>Category</div>
                            <div>
                                <a href="{{route('bound.category.index')}}" class="px-3 btn btn-primary btn-sm">
                                    List
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="p-3">
                            <form class="form" method="post" action="{{route('bound.category.update', $category->id)}}">
                                @csrf
                                @method('put')
                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-4 col-form-label text-end">Category:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="name" value="{{$category->name}}" class="form-control @error('name') is-invalid @enderror" placeholder="Category">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-4 col-form-label text-end">Year:</label>
                                    <div class="col-sm-8">
                                        <select name="years[]" class="form-control select2-years" multiple="multiple" placeholder="Category">
                                            @foreach($years as $year)
                                                <option value="{{$year->id}}"  {{ in_array($year->id, $category->years->pluck('id')->toArray())?'selected':''}}>{{$year->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-4 col-form-label text-end"></label>
                                    <div class="col-sm-8">
                                        <button type="submit" class="btn btn-sm btn-primary px-5">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('.select2-years').select2();
        });
    </script>
@endpush
