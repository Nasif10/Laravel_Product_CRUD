@extends('master')

@section('body')
    <div class="container">
        <div class="row pt-5"> 
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="row"> 
                        <div class="col-md-4">
                            <img src="{{asset($product->image)}}" class="img-fluid rounded-start border-end" width="75%" alt="">
                        </div>
                        <div class="col-md-8 d-flex align-items-center">
                            <div class="card-body">
                                <h2 class="card-title">{{$product->name}}</h2>
                                <p class="card-text">Description : {{$product['description']}}</p>
                                <p class="card-text">Tk. {{$product['price']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="pt-4">Similar products</h4>

        <div class="row pt-2">
            @foreach($similarProducts as $s)
            <div class="col-sm-2 pb-3">
                <div class="card h-100">
                    <img src="{{asset($s->image)}}" class="card-img-top border-bottom" height="150px" alt="...">
                    <div class="card-body">
                        <p class="card-title my-0">{{$s->name}}</p>
                        <a href="{{route('detail', ['id' => $s->id])}}" class="card-link" style="text-decoration:none;">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection