@extends('layouts.admin-layout')
@section('content')
    <div class="container-fluid">
        <h2>Add Category</h2>
        <form method="post" enctype="multipart/form-data" action="{{route('add.category')}}">
            @csrf
            <div class="form-group mx-sm-3 mb-2 col-3" >
                <label for="name">Name</label>
                <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Name">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="img">Img</label>
                <input name="img" type="file" class="form-control-file" id="img">
            </div>
            <button  type="submit" class="btn btn-primary col-2">Add</button>
        </form>
    </div>

@endsection
