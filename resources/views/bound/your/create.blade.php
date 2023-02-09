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
                            <your-bound-create></your-bound-create>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        import YourBoundCreate from "../../../js/components/bound/yourBoundCreate";
        $(document).ready(function() {
            $('.select2-years').select2();
        });
        export default {
            components: {YourBoundCreate}
        }
    </script>
@endpush
