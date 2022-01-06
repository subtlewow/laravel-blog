@extends('layout')

@section('content')
    <article>
        <h1>
            {{ $file->title; }}
        </h1>

        <p>
            By <a href="/authors/{{ $file->author->username }}">{{ $file->author->name }}</a> in <a href="/categories/{{ $file->category->slug }}">{{ $file->category->name }}</a>
        </p>


        <div>
            {!! $file->body; !!}
        </div>
    </article>

    <a href="/">Go Back</a>
@endsection