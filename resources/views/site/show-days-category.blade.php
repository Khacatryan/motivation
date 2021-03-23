@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @if(session()->has('message'))
            <div class="alert alert-success" role="alert">
                <h4>
                    {{session()->get('message')}}
                </h4>
            </div>
        @endif
    </div>
    <div class="grid-container">
        @foreach ($days as $day)
            <div class="day"
                 data-id="{{$day->id}}">
                @if($day->seen===1 && $day->completed===1 )
                    <a data-toggle="modal"
                       data-target="#exampleModalCenter{{$day->id}}">
                        <div style="background: #008000" class="grid-item">
                            {{$day->name}}
                        </div>
                    </a>
                @elseif($day->seen===1 && $day->completed===0)
                    <a data-toggle="modal"
                       data-target="#exampleModalCenter{{$day->id}}">
                        <div class="completed">
                            {{$day->name}}
                        </div>
                    </a>
                @else
                    <a href="#">
                        <div class="grid-item">
                            {{$day->name}}
                        </div>
                    </a>
                @endif
            </div>
            <div class="modal fade" id="exampleModalCenter{{$day->id}}" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Days Challenge</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <form method="post" action="{{route('site.completed.task')}}">
                                @csrf
                                <input name="days_id" type='hidden' value="{{$day->id}}">
                                @if($day->seen===1 && $day->completed===1)
                                    <button disabled type="submit">Completed</button>
                                @else
                                    <button type="submit">Completed</button>
                                @endif
                            </form>
                            {{--                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('.day').on('click', function () {
            let day_id = $(this).attr('data-id');
            var url = "{{route('site.show.task')}}";
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token" ]').attr('content')
                },
                type: 'post',
                url: url,
                dataType: 'json',
                data: {
                    day_id
                },
                success: function (res) {
                    console.log(res)
                    $('.modal-body').empty()
                    for (let i in res) {
                        $('.modal-body').append(`
                             <p>${res[i].name}</p>

                    `)
                    }

                }
            })
        })
        {{--$('.completed').on('click',function (){--}}
        {{--    let days_id = $(this).attr('data-dayId');--}}
        {{--    var url = "{{route('site.completed.task')}}";--}}
        {{--    $.ajax({--}}
        {{--        headers: {--}}
        {{--            'X-CSRF-TOKEN': $('meta[name="csrf-token" ]').attr('content')--}}
        {{--        },--}}
        {{--        type: 'post',--}}
        {{--        url: url,--}}
        {{--        dataType: 'json',--}}
        {{--        data: {--}}
        {{--            days_id--}}
        {{--        },--}}
        {{--        success: function (res) {--}}
        {{--            console.log(res)--}}
        {{--        }--}}
        {{--    })--}}

        {{--})--}}
    });
</script>

<style>
    .grid-container {
        display: flex;
        flex-wrap: wrap;
        width: 500px;
        justify-content: center;
        margin: 0 auto;
        margin-top: 60px;
        transition: 500ms linear;
    }

    .grid-item {
        height: 70px;
        width: 70px;
        background: #e48d8d;
        padding: 10px;
        text-align: center;
        transition: transform .2s;
        margin: 9px;
        justify-content: center;
    }

    .completed {
        height: 70px;
        width: 70px;
        background: #e48d8d;
        padding: 10px;
        text-align: center;
        transition: transform .2s;
        margin: 9px;
        justify-content: center;
    }

    .completed:hover {
        transform: scale(1.5);
        background: orange;

    }

    a {
        text-decoration: none;
    }
</style>