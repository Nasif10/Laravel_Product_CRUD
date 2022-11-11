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
                    <th scope="col">CategoryName</th>  
                    <th scope="col"></th>
                </thead>
                <tbody>
                @foreach($categories as $c)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$c->name}}</td>           
                        <td style="text-align: center; width:15%">
                            <a role="button" class="btn btn-sm btn-outline-warning mx-1" href=""><i class="bi bi-pencil-square"></i></a>
                            <a role="button" class="btn btn-sm btn-outline-danger mx-1" href="{{route('delete-category', ['id' => $c->id])}}"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection