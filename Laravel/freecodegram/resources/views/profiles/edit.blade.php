@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post" action="/profile/{{ $user->id }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-8 offset-2">
                
                <!-- post title -->
                <div class="row">
                    <h1>Edit Profile</h1>
                </div>

                <!-- title area -->
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">Title</label>

                    <input
                        name="title"
                        id="title"
                        type="text"
                        class="form-control
                        @error('title') is-invalid @enderror"
                        title="title"
                        value="{{ old('title') ?? $user->profile->title }}"
                        autocomplete="title"
                        autofocus
                    >

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- description area -->
                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label">Description</label>

                    <input
                        name="description"
                        id="description"
                        type="text"
                        class="form-control
                        @error('description') is-invalid @enderror"
                        description="description"
                        value="{{ old('description') ?? $user->profile->description }}"
                        autocomplete="description"
                        autofocus
                    >

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- url area -->
                <div class="form-group row">
                    <label for="url" class="col-md-4 col-form-label">URL</label>

                    <input
                        name="url"
                        id="url"
                        type="text"
                        class="form-control
                        @error('url') is-invalid @enderror"
                        url="url"
                        value="{{ old('url') ?? $user->profile->url }}"
                        autocomplete="url"
                        autofocus
                    >

                    @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- upload image -->
                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Profile Image</label>
                    <input type="file" name="image" id="image" class="form-control-file">

                    @error('image')
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>

                <!-- post button -->
                <div class="row pt-4">
                    <button class="btn btn-primary">Save Profile</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
