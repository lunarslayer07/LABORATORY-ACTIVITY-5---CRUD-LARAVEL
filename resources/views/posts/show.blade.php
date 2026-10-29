@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <p class="eyebrow">Blog post</p>
    <h1>{{ $post->title }}</h1>
    <p class="post-meta">Published {{ $post->created_at->format('M j, Y') }}</p>
    <article class="post-content">{{ $post->body }}</article>
    <div class="actions">
        <a class="button" href="{{ route('posts.index') }}">Back to posts</a>
        <a class="button button-primary" href="{{ route('posts.edit', $post) }}">Edit post</a>
        <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Delete this post?')">
            @csrf
            @method('DELETE')
            <button class="button button-danger" type="submit">Delete post</button>
        </form>
    </div>
@endsection
