@extends('layouts.starlight')

@section('category')
    active
@endsection

@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ url('/home') }}">Dashboard</a>
        <span class="breadcrumb-item active">Category</span>
    </nav>
@endsection




@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-white bg-secondary">
                <div class="card-header">
                    <h4 class="text-center">Add Category</h4>
                    <div>
                        <a href="{{ url('/show/category') }}" class="btn btn-info float-right">Show All Category</a>
                    </div>
                </div>
                <div class="card-body">
                    
                    <form action="{{ url('add/category') }}" method="POST">
                        @csrf
                        
                         @if (session('category_success_msg'))
                            <div class="alert alert-success">
                                {{ session('category_success_msg') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name *</label>
                            <input type="text" class="form-control"  placeholder="Enter Category Name" name="category_name">
                            @if (session('category_error'))
                                <span class="text-danger"> * {{ session('category_error') }}</span>
                            @endif
                            @error('category_name')
                                <span class="text-danger">* {{ $message }}</span>
                            @enderror
                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sub Category Name *</label>
                            <input type="text" class="form-control"  placeholder="Enter Sub Category Name" name="subcategory_name">
                            @if (session('subcategory_error'))
                                <span class="text-danger"> * {{ session('subcategory_error') }}</span>
                            @endif
                             @error('subcategory_name')
                                <span class="text-danger">* {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Subcategory Image *</label>
                            <input type="file" class="form-control"  placeholder="Enter Category Name" name="subcategory_image">
                            @if (session('category_image_error'))
                                <span class="text-danger"> * {{ session('category_image_error') }}</span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection