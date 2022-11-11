@extends('master')

@section('body')
    <div class="container">
        <div class="row py-5">
            <div class="col-md-7 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <p class="text-primary text-center">{{Session::get('msg')}}</p>
                        <form action="{{route('update-product', ['id' => $product->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mb-3">
                                <label class="col-sm-3 col-form-label">Category</label>
                                <div class="col-sm-9">
                                    <select class="form-select" name="cid" aria-label="Default select example">
                                        <option selected>Select category</option>
                                        @foreach($categories as $c)
                                            <option value="{{$c->id}}" @if($c->id == $product->cid) ? {{'selected'}} @endif>{{$c->name}}</option>
                                        @endforeach
                                    </select>                      
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="name">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-3 col-form-label">Image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" value="{{$product->image}}" class="form-control mb-1">
                                    <img src="{{asset($product->image)}}" alt="N" width="45" height="45">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <input type="text" name="description" value="{{$product->description}}" class="form-control" placeholder="description">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-3 col-form-label">Price</label>
                                <div class="col-sm-9">
                                    <input type="number" name="price" value="{{$product->price}}" class="form-control" placeholder="price">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-md-3">
                                    <button type="submit" class="btn btn-primary" value="update">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>     
@endsection