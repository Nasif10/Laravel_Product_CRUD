@extends('master')

@section('body')
    <div class="container">
        <div class="row py-5">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <p class="text-primary text-center">{{Session::get('msg')}}</p>
                        <form action="{{route('create-category')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Category Name</label>
                                <input type="text" name="name" class="form-control" placeholder="category_name">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>     
@endsection