@extends('layouts.app')

@section('content')
<div class="grid-container">
    @foreach ($categories as $cat)
        <a href="{{route('site.show.days',['id'=>$cat->id])}}">
            <div class="grid-item col-2">
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
        height: 70px;
        width: 70px;
        background: #e48d8d;
        padding: 10px;
        text-align: center;
        margin: 9px;
        justify-content: center;
    }
    a {
        text-decoration: none;
    }
</style>
