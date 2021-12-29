@extends('layout')

@section('content')
    <article>
        <h1>
            {{ $file->title; }}
        </h1>
    </article>

    <div>
        {!! $file->body; !!}
    </div>

    <a href="/">Go Back</a>
@endsection