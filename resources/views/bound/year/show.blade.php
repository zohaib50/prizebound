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
                                <a href="{{route('bound.year.index')}}" class="px-3 btn btn-primary btn-sm">List</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="p-3">
                            <div>
                                <h3>Year: {{$year->name}}</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped w-100">
                                    <thead>
                                        <tr class="bg-dark text-white">
                                            <th class="p-2 rounded-start">#</th>
                                            <th class="p-2">Category</th>
                                            <th class="p-2 text-end rounded-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($year->Categories as $key => $category)
                                        <tr >
                                        <td class="p-2">{{$key+1}}</td>
                                        <td class="p-2">{{$category->name}}</td>
                                        <td class="p-2 text-end">
                                            <a href="{{route('bound.category.show', $category->id)}}" class="me-2 btn btn-sm btn-outline-success">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="bi bi-eye-fill">
                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"></path>
                                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"></path>
                                                </svg>
                                            </a>
                                            <a href="{{route('bound.category.edit', $category->id)}}" class="me-2 btn btn-sm btn-outline-primary">
                                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                                    <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-between">
                                    <div>

                                    </div>
                                    <div>
                                        <!--                <Pagination :data="laravelData" @pagination-change-page="getData" />-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
