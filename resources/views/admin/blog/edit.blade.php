@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- begin row -->
    <div class="row">
        <div class="col-md-12 m-b-30">
            <!-- begin page title -->
            <div class="d-block d-sm-flex flex-nowrap align-items-center">
                <div class="page-title mb-2 mb-sm-0">
                    <h1>Edit Blog</h1>
                </div>
                <div class="ml-auto d-flex align-items-center">
                    <nav>
                        <ol class="breadcrumb p-0 m-b-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('blog-items.index') }}">Blogs</a>
                            </li>
                            <li class="breadcrumb-item active text-warning" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- end page title -->
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
            <div class="alert border-0 alert-danger m-b-30 alert-dismissible fade show border-radius-none" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-white">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>

    <!-- begin row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-statistics">
                <div class="card-body">
                    <form action="{{ route('blog-items.update', $blog->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Blog Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Blog name" name="title"
                                value="{{ $blog->title }}">
                        </div>

                        <div class="form-group">
                            <label for="recipe_images">Blog Image</label>
                            <input type="file" class="form-control" accept="image/*" id="photo" name="photo">
                            @if ($blog->photo_url != '')
                                <img src="{{ $blog->photo_url }}" alt="" width="100" class="mt-2">
                            @endif
                        </div>                        

                        <div class="form-group">
                            <label for="description">Short Description</label>
                            <textarea class="form-control" id="description" placeholder="Write some text..."
                                name="description">{{ $blog->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="long_description">Blog Content</label>
                            <textarea class="form-control summernote" id="long_description" placeholder="Write some text..."
                                name="long_description">{{ $blog->long_description }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });
</script>
@endpush