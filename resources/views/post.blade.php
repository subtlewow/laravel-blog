@extends('layout')

@section('content')
    <article>
        <h1>
            {{ $file->title; }}
        </h1>

        <p>
        <a href="/categories/{{$file->category->slug}}">{{ $file->category->name }}</a>
        </p>

        <div>
            {!! $file->body; !!}
        </div>
    </article>



    <a href="/">Go Back</a>
@endsection