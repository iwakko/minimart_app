@extends('layouts.app')

@section('title', 'Products')
    
@section('content')
<div class="row mb-4">
    <div class="col">
        <h1 class="h3">Products</h1>
    </div>
    <div class="col text-end" >
        <a href="{{ route('create') }}" class="btn btn-success btn-sm">
            <i class="fa fa-plus-circle "></i>New Product
        </a>
    </div>
</div>
    
        
    
    <table class="table border-bottom border-3">
        <tr class="table-success fw-bold border-bottom border-4 border-dark text-muted">
            <th>ID</th>
            <th>NAME</th>
            <th>DESCRIPTION</th>
            <th>PRICE</th>
            <th>SECTION</th>
            <th> </th>
            <th> </th>
        </tr>
            @foreach ($all_products as $product)
                <tr>
                    <td style="width: 5%">{{ $product->id }}</td>
                    <td class="fw-bold" style="width: 10%">{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td style="width: 10%">${{ $product->price }}</td>
                    <td class="text-muted" style="width: 10%">{{ $product->section->name }}</td>
                    <td style="width: 5%">
                        <a href="{{ route('edit',$product->id) }}" class="btn text-secondary btn-sm" title="edit"><i class="fa-solid fa-pen"></i></a>
                    </td>
                    <td style="width: 5%">
                        <button class="btn text-danger btn-sm" style="" title="Delete" data-bs-toggle="modal" data-bs-target="#delete-product-{{ $product->id }}">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                        @include('products.modal.delete')
                    </td>
                </tr>
            @endforeach   
    </table>
@endsection