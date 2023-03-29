@extends('layouts.app')

@section('title','Edit Products')
    
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <form action="{{ route('update',$product->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Name</label>
                    <input type="text" name="name" id="name" class="form-control" autofocus value="{{ old('name',$product->name)}}">
                    @error('name')
                       <p class="text-danger small">{{ $message }}</p> 
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Description</label>
                    <textarea name="description" id="description" rows="10" class="form-control">{{ old('description',$product->description)}}</textarea>
                    @error('description')
                       <p class="text-danger small">{{ $message }}</p> 
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label fw-bold">Price</label>
                    <div class="input-group">
                        <div class="input-group-text">$</div>
                        <input type="number" name="price" id="price" class="form-control" value="{{ old('price',$product->price)}}" step="any">   
                    </div>
                </div>

                <div class="mb-3">
                    <label for="section" class="form-label">Section</label>
                    <select name="section" id="section" value="{{ old('section',$product->section)}}" class="form-control">
                            @foreach ($all_sections as $section)
                                <option value="{{ old('section',$section->id) }}">{{ $section->name }}</option>
                            @endforeach     
                    </select>
                </div>

                <div class="mb-3">
                    <a href="{{ route('index')}}" class="btn btn-outline-secondary btn-sm">Cancel</a>
                    <button type="submit" class="btn btn-secondary btn-sm">✓Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection