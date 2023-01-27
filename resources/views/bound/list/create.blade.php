@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>Bound</div>
                            <div>
                                <a href="{{route('bound.list.index')}}" class="px-3 btn btn-primary btn-sm">
                                    List
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                       <div class="p-3">
                           <form class="form" method="post" action="{{route('bound.list.store')}}">
                               @csrf
                               <div class="mb-3 row">
                                   <label class="col-sm-4 col-form-label text-end">Category:</label>
                                   <div class="col-sm-8">
                                       <select name="category" class="form-control select2-years" placeholder="Category">
                                           @foreach($categories as $category)
                                               <option value="{{$category->id}}">{{$category->name}}</option>
                                           @endforeach
                                       </select>
                                       @error('category')
                                       <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                       @enderror
                                   </div>
                               </div>
                               <div class="mb-3 row">
                                   <label class="col-sm-4 col-form-label text-end">Year:</label>
                                   <div class="col-sm-8">
                                       <select name="year" class="form-control select2-years" placeholder="Category">
                                           @foreach($years as $year)
                                               <option value="{{$year->id}}">{{$year->name}}</option>
                                           @endforeach
                                       </select>
                                       @error('year')
                                       <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                       @enderror
                                   </div>
                               </div>
                               <div class="mb-3 row">
                                   <label class="col-sm-4 col-form-label text-end">Type:</label>
                                   <div class="col-sm-8">
                                       <select name="type" class="form-control" placeholder="Type">
                                           <option value="first">First</option>
                                           <option value="second">Second</option>
                                           <option value="third">Third</option>
                                       </select>
                                       @error('year')
                                       <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                       @enderror
                                   </div>
                               </div>
                               <div class="mb-3 row">
                                   <label for="inputPassword" class="col-sm-4 col-form-label text-end">Bound List:</label>
                                   <div class="col-sm-8">
                                       <textarea  name="list" class="form-control @error('list') is-invalid @enderror" rows="10" placeholder="Bound List">{{old('list')}}</textarea>
                                       @error('list')
                                       <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                       @enderror
                                   </div>
                               </div>
                               <div class="mb-3 row">
                                   <label class="col-sm-4 col-form-label text-end"></label>
                                   <div class="col-sm-8">
                                       <button type="submit" class="btn btn-sm btn-primary px-5">Save</button>
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
