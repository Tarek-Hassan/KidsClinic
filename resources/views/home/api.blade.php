@extends('home.index')
@section('title','Quotes')
@section('section_title','Motivation Quotes')
@section('content')

<div class="container my-3">

    <div class="card mb-3">

        <?php $bg=['primary','secondary','success','danger','warning','info','light','dark'];?>

        @foreach($datas as $data )

            <div class="alert alert-{{$bg[array_rand($bg)]}}" role="alert">
                <p>“ {{$data->text}} „</p>
                <hr>
                <p class="mb-0 float-right">{{$data->author}}</p>
            </div>

        @endforeach

    </div>
    
</div>

</body>
@endsection
