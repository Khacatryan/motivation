@extends('layouts.admin-layout')
@section('content')
    <div class="container-fluid">
        <h2>Add Task</h2>
        @if(session()->has('message'))
            <div>
                <h4>
                    {{session()->get('message')}}
                </h4>
            </div>
        @endif
        <form method="get" action="{{route('add.notification')}}">
            @csrf
            <div class="form-group mx-sm-3 mb-2 col-3">
                <label for="name">Notification</label>
                <input name="title" type="text" class="form-control" id="name" aria-describedby="emailHelp"
                       placeholder="Name">
            </div>
            <div class="form-group mx-sm-3 mb-2 col-md-3">
                <label for="inputState">Category</label>
                <select name="id" id="inputState" class=" selectCategory form-control">
                    <option selected>Choose...</option>
                    @foreach($category as $cat)
                        <option class="change" value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mx-sm-3 mb-2 col-md-3 daysCat">
                <label for="inputState">Days</label>
                <select name="singl_id" id="inputState" class=" selectCategory1 form-control">
                    <option selected>Choose...</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary col-2">Add</button>
        </form>
    </div>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('.selectCategory').on('change', function () {
            let cat_id = $('.selectCategory').val();
            var url = "{{route('send.task')}}";
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token" ]').attr('content')
                },
                type: 'post',
                url: url,
                dataType: 'json',
                data: {
                    cat_id,
                },
                success: function (res) {
                    console.log(res)
                    $('.selectCategory1').empty()
                    for (let i in res) {
                        $('.selectCategory1').append(`

                    <option class="change"
                        data-catId=${res[i].category_id} value=${res[i].id}>${res[i].name}</option>
                                                                `)
                    }
                }
            })
        })
    });
</script>
