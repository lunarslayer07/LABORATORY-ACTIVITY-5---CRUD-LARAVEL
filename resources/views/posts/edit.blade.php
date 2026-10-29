@extends('layouts.app')

@section('title', 'Edit post')

@section('content')
    <p class="eyebrow">Update your story</p>
    <h1>Edit post</h1>
    <p class="intro">Make changes to “{{ $post->title }}”.</p>

    <form class="form-card" action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')
        @include('posts._form', ['submitLabel' => 'Save changes'])
    </form>
@endsection
