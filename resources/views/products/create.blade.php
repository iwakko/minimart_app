@extends('layouts.app')

@section('title','New Products')
    
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <form action="{{ route('store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Name</label>
                    <input type="text" name="name" id="name" class="form-control" autofocus>
                    @error('name')
                       <p class="text-danger small">{{ $message }}</p> 
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Description</label>
                    <textarea name="description" id="description" rows="10" class="form-control"></textarea>
                    @error('description')
                       <p class="text-danger small">{{ $message }}</p> 
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label fw-bold">Price</label>
                    <div class="input-group">
                        <div class="input-group-text">$</div>
                        <input type="number" name="price" id="price" class="form-control" step="any">   
                    </div>
                    
                </div>

                <div class="mb-3">
                    <label for="section" class="form-label">Section</label>
                    <select name="section" id="section" class="form-control">
                                <option value="" hidden>Select Section</option>
                            @foreach ($all_sections as $section)
                                <option value="{{ $section->id }}">{{ $section->name }}</option>
                            @endforeach 
                    </select>
                    <a href="{{ route('section.index')}}" class="text-decoration-none">Add a new section</a>
                </div>

                <div class="mb-3">
                    <a href="{{ route('index')}}" class="btn btn-outline-success btn-sm">Cancel</a>
                    <button type="submit" class="btn btn-success btn-sm">+Add</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection