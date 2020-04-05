@extends('layouts.app')

@section('content')
<div class="container">
    
    <!-- logo part -->
    <div class="row">
        <div class="col-3 p-5">
            <img class="rounded-circle" src="https://scontent-hkt1-1.cdninstagram.com/v/t51.2885-19/s150x150/83213956_3360255157381124_5752385570823208960_n.jpg?_nc_ht=scontent-hkt1-1.cdninstagram.com&_nc_ohc=46uU5LDixZ4AX9sX9rH&oh=90bc1fdb5cc6834ee6445dbe63864f32&oe=5EAE4BC6" />
        </div>
        <div class="col-9 pt-5">
            <!-- title -->
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>
                @can('update', $user->profile)
                    <a href="/p/create">Add New Post</a>
                @endcan
            </div>
            
            <!-- if it is true, show. otherwise if it is false, don't show -->
            @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan
            
            <div class="d-flex">
                <div class="pr-5">
                    <strong>{{ $user->posts->count() }}</strong> posts
                </div>
                <div class="pr-5">
                    <strong>42.8k</strong> followers
                </div>
                <div class="pr-5">
                    <strong>237</strong> following
                </div>
            </div>

            <!-- description -->
            <div class="pt-4 font-weight-bold">
                {{ $user->profile->title }}
            </div>
            <div>
                {{ $user->profile->description }}
            </div>
            <div class="font-weight-bold">
                <a href="#">{{ $user->profile->url }}</a>
            </div>
        </div>
    </div>

    <!-- image gallery part -->
    <div class="row pt-4">
        @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{ $post->id }}">
                    <img class="w-100" src="/storage/{{ $post->image }}" />
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
