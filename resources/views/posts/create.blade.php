@extends('layouts.app')

@section('title', 'Create a post')

@section('content')
    <p class="eyebrow">New story</p>
    <h1>Create a post</h1>
    <p class="intro">Give your post a title and start writing.</p>

    <form class="form-card" action="{{ route('posts.store') }}" method="POST">
        @csrf
        @include('posts._form', ['submitLabel' => 'Publish post'])
    </form>
@endsection
