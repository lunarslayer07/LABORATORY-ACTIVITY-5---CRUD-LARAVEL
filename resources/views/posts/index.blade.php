@extends('layouts.app')

@section('title', 'Blog posts')

@section('content')
    <div class="page-heading">
        <div>
            <p class="eyebrow">The journal</p>
            <h1>Blog posts</h1>
            <p class="intro">Ideas, stories, and notes worth sharing.</p>
        </div>
        <a class="button button-primary" href="{{ route('posts.create') }}">Create a post</a>
    </div>

    @if ($posts->isEmpty())
        <section class="empty-state">
            <h2>Your blog starts here</h2>
            <p>There are no posts yet. Create the first one to get started.</p>
            <a class="button button-primary" href="{{ route('posts.create') }}">Write your first post</a>
        </section>
    @else
        <div class="post-list">
            @foreach ($posts as $post)
                <article class="card">
                    <h2><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h2>
                    <p class="post-meta">Published {{ $post->created_at->format('M j, Y') }}</p>
                    <p class="card-body">{{ \Illuminate\Support\Str::limit($post->body, 220) }}</p>
                    <div class="actions">
                        <a class="button button-small" href="{{ route('posts.show', $post) }}">Read post</a>
                        <a class="button button-small" href="{{ route('posts.edit', $post) }}">Edit</a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Delete this post?')">
                            @csrf
                            @method('DELETE')
                            <button class="button button-small button-danger" type="submit">Delete</button>
                        </form>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="pagination">{{ $posts->links() }}</div>
    @endif
@endsection
