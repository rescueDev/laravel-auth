@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">


                <div class="card">
                    <div class="card-header">Upload Image!!</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="#">
                            <div class="form-group">
                                <input type="file" class="form-control border-0" name="" enctype="">
                                <input type="submit" class="btn btn-primary" value="Upload">
                                <input type="submit" class="btn btn-danger" value="Clear">
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
