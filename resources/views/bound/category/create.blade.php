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
                           <form class="form">
                               <div class="mb-3 row">
                                   <label for="inputPassword" class="col-sm-4 col-form-label text-end">Category:</label>
                                   <div class="col-sm-8">
                                       <input type="text" class="form-control" placeholder="Category">
                                   </div>
                               </div>
                               <div class="mb-3 row">
                                   <label for="inputPassword" class="col-sm-4 col-form-label text-end"></label>
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
