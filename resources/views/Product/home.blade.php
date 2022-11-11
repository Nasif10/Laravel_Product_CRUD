@extends('master')

@section('body')
    <div class="container">
        <div class="row pt-4 justify-content-end">
            <div class="col col-3">
                <form class="input-group post-form" action="" method="get">
                    <select class="form-select" name="cid">
                        <option value="" >All</option>
                        @foreach($categories as $c)
                            <option value ="{{$c->id}}" @if(isset($_GET['cid']) && ($c->id == (int)$_GET['cid'])) ? {{'selected'}} @endif> {{$c->name}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                </form>
            </div>
        </div> 

        <div class="row pt-4">
            @foreach($products as $p)
            <div class="col-sm-3 pb-4">
                <div class="card h-100">
                    <img src="{{$p->image}}" class="card-img-top border-bottom" height="220px" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$p->name}}</h5>
                        <p class="card-text mb-2">Tk. {{$p->price}}</p>
                        <a href="{{route('detail', ['id' => $p->id])}}" class="card-link" style="text-decoration:none;">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection