@extends('layouts.admin-layout')
@section('content')
    <div class="container-fluid">
        <h2>Add Categories Days</h2>
        <form method="get" action="{{route('add.days.category')}}">
            @csrf
            <div class="form-group mx-sm-3 mb-2 col-3" >
                <label for="name">Name</label>
                <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Name">
            </div>
            <div class="form-group mx-sm-3 mb-2 col-md-3">
                <label for="inputState">State</label>
                <select name="id" id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    @foreach($category as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>
            </div>
            <button  type="submit" class="btn btn-primary col-2">Add</button>
        </form>
    </div>

@endsection
