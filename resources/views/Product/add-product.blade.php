@extends('master')

@section('body')
    <div class="container">
        <div class="row py-5">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        @if(Session::has('msg'))
                            <p class="text-primary text-center">{{Session::get('msg')}}</p>
                        @endif 
                        <form action="{{route('create-product')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mb-3">
                                <label class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="cid" aria-label="Default select example">
                                        <option selected disabled>select category</option>
                                        @foreach($categories as $c)
                                            <option value="{{$c['id']}}">{{$c['name']}}</option>
                                        @endforeach
                                    </select>                      
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" placeholder="name">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="image" class="form-control" placeholder="price">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <input type="text" name="description" class="form-control" placeholder="description">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    <input type="number" name="price" class="form-control" placeholder="price">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-md-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>     
@endsection