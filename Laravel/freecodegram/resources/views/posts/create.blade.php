@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="/p" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-8 offset-2">
                
                <!-- post title -->
                <div class="row">
                    <h1>Add New Post</h1>
                </div>

                <!-- caption area -->
                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label">Post Caption</label>

                    <input
                        name="caption"
                        id="caption"
                        type="text"
                        class="form-control
                        @error('caption') is-invalid @enderror"
                        caption="caption"
                        value="{{ old('caption') }}"
                        autocomplete="caption"
                        autofocus
                    >

                    @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- upload image -->
                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Post Image</label>
                    <input type="file" name="image" id="image" class="form-control-file">

                    @error('image')
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>

                <!-- post button -->
                <div class="row pt-4">
                    <button class="btn btn-primary">Add New Post</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
