@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- begin row -->
    <div class="row">
        <div class="col-md-12 m-b-30">
            <!-- begin page title -->
            <div class="d-block d-sm-flex flex-nowrap align-items-center">
                <div class="page-title mb-2 mb-sm-0">
                    <h1>Edit Recipe</h1>
                </div>
                <div class="ml-auto d-flex align-items-center">
                    <nav>
                        <ol class="breadcrumb p-0 m-b-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('recipe-items.index') }}">Recipes</a>
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
                    <form action="{{ route('recipe-items.update', $recipe->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Recipe Name</label>
                            <input type="text" class="form-control" id="title" placeholder="Recipe name" name="title"
                                value="{{ $recipe->title }}">
                        </div>
                        <div class="form-group">
                            <label for="category_id">Recipe Category</label>
                            <select class="form-control" name="category_id">
                                <option value="">--- Category ---</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}" {{ $recipe->category_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="price">Recipe Price</label>
                            <input type="number" step="any" class="form-control" id="price" placeholder="Recipe price" name="price" value="{{ $recipe->price }}">
                        </div>

                        <div class="form-group">
                            <label for="recipe_images">Recipe Images</label>
                            <input type="file" class="form-control" accept="image/*" id="recipe_images" name="recipe_images[]" multiple>

                            @if (!empty($recipe->image_urls))
                                @foreach ($recipe->image_urls as $image)
                                    <img src="{{ $image }}" alt="" width="100" class="mt-2">
                                @endforeach
                            @endif
                        </div> 

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control summernote" id="description" placeholder="Write some text..."
                                name="description">{{ $recipe->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="additional_description">Additional Description</label>
                            <textarea class="form-control summernote" id="additional_description" placeholder="Write some text..."
                                name="additional_description">{{ $recipe->additional_description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="recipe_information">Recipe Information</label>
                            <textarea class="form-control summernote" id="recipe_information" placeholder="Write some text..."
                                name="recipe_information">{{ $recipe->recipe_information }}</textarea>
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