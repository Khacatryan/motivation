@extends('layouts.app')

@section('content')
    <div class="grid-container">
        @foreach ($categories as $cat)

            <a href="{{route('site.show.days',['id'=>$cat->id])}}">
                <div class="grid-item ">
                    @if($cat->img==null)
                        <img src="{{asset('/storage/images/good.jpeg')}}" alt="">
                    @else
                        <img src="{{asset('/storage/images/'.$cat->img)}}" alt="">
                    @endif
                    {{$cat->name}}
                </div>
            </a>
        @endforeach
    </div>
@endsection

<style>
    .grid-container {
        display: flex;
        flex-wrap: wrap;
        width: 500px;
        justify-content: center;
        margin: 0 auto;
        margin-top: 60px;
    }

    .grid-item {
        height: 100px;
        width: 100px;
        padding: 10px;
        text-align: center;
        margin: 9px;
        justify-content: center;
        overflow: hidden;
    }

    img {
        height: 70px;
        width: 70px;
        border-radius: 20px;
        box-shadow: 5px -5px #212529;
    }

    a {
        text-decoration: none;
    }
    html, body {
        /*background-color: #fff;*/
        background-image: url("{{asset('/storage/images/stone.jpg')}}");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }
</style>
