@extends('layouts.admin-layout')
@section('content')
    <div class="container-fluid">
            @foreach($category as $cat)
            <div class="row">
                <form method="get" action="{{route('edit.all',['id'=>$cat->id])}}">

                    <input type="text" name="name" value="{{$cat->name}}">
                    <button type="submit" style="float: right"  ><i class="fas fa-edit"></i></button>
                </form>
                <a href="{{route('delete.cat',['id'=>$cat->id])}}"><i class="fas fa-trash-alt"></i></a>
            </div>
            @endforeach
    </div>
@endsection
