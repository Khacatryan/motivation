@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <a class="btn badge-primary" href="{{route("site.show.category")}}">Start</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>

    html, body {
        /*background-color: #fff;*/
        background-image: url("{{asset('/storage/images/begin.jpg')}}");
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
