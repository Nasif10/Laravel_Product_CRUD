@extends('master')

@section('body')
    <div class="container">
        <div class="row pt-5">
            @if(Session::has('msg'))
                <p class="text-primary text-center">{{Session::get('msg')}}</p>
            @endif 
            <table class="table table-bordered table-hover" cellpadding="2px">
                <thead class="table-light">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>  
                    <th scope="col"></th>
                </thead>
                <tbody>
                @foreach($products as $p)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$p->name}}</td>
                        <td style="text-align:center;"><img src="{{$p->image}}" alt="N" width="45" height="45"></td>
                        <td>{{$p->description}}</td>
                        <td>{{$p->price}}</td>             
                        <td style="text-align: center; width:13%">
                            <a role="button" class="btn btn-sm btn-outline-warning mx-1" href="{{route('edit-product', ['id' => $p->id])}}"><i class="bi bi-pencil-square"></i></a>
                            <a role="button" class="btn btn-sm btn-outline-danger mx-1" href="{{route('delete-product', ['id' => $p->id])}}"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection