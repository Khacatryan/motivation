@extends('layouts.admin-layout')
@section('content')

    <div class="container-fluid">
        <h2>Edit Days</h2>
         <div class="input form-group mx-sm-3 mb-2 col-md-4"></div>
            <div class="form-group mx-sm-3 mb-2 col-md-3">
                <label for="inputState">Category</label>
                <select  name="id" id="inputState" class="selectCategory form-control">
                    <option selected>Choose...</option>
                    @foreach($category as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>
            </div>
    </div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('.selectCategory').on('change', function () {
            let cat_id = $('.selectCategory').val();
            var url = "{{route('edit.day')}}";
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
                    $('.input').empty();
                    for(let i in res){
                        res[i].name=res[i].name.split(' ').join("");
                        $('.input').append(`

                  <form method="get" action="{{route('edit.single.day')}}">
                          <input type="hidden"  name="id"  type="text" value=${res[i].id}>
                          <div class="row">
                            <div class="col-6">
                                <input class="form-control"  name="name"  type="text" value=${res[i].name}>
                            </div>
                            <div class="col-2">
                                <button class="edit btn btn-primary" type="submit">Edit</button>
                            </div>
                         </div>
                    </form>`)
                    }
                }

            })
        })
    });
</script>
