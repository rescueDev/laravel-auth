@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">


                <div class="card">
                    <div class="card-header">Upload an Image</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('upload-img') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <input type="file" class="form-control border-0 mb-2" name="icon">
                                <input type="submit" class="btn btn-primary" value="Upload">
                                <a href="{{ route('clear-img') }}" class="btn btn-danger">Clear</a>
                            </div>
                        </form>


                    </div>
                </div>

                @if (Auth::user()->icon)

                    <div class="card mt-3">
                        <div class="card-header">Your Image:</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <img src="{{ asset('storage/icon/' . Auth::user()->icon) }}" alt="" height="300px"
                                width="300px">



                        </div>
                    </div>



                @else




                    <div class="card mt-3">
                        <div class="card-header">Your Image:</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <img src="{{ asset('storage/img/noimg.jpeg') }}" alt="" height="300px" width="300px">



                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
