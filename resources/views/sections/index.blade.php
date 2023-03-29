@extends('layouts.app')

@section('title','Section')
    
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <h1 class="h3">Sections</h1>
            <form action="{{ route('section.store')}}" method="post">
                @csrf
                <div class="mt-2 mb-3">
                    <div class="row">
                        <div class="col-10">
                            <input type="text" name="section" id="section" placeholder="Add new section here..." class="form-control">
                        </div>
                        <div class="col-2">
                            <button type="submit" class="bg-info form-control fw-bold">+Add</button>
                        </div>
                    </div>
                </div>
            </form>
            <table class="table align-center text-center">
                <tr class="fw-bold bg-info border-bottom border-4 border-dark">
                    <th>ID</th>
                    <th>NAME</th>
                    <th> </th>
                </tr>
                    @foreach ($all_sections as $section)
                        <tr>
                            <td>{{ $section->id }}</td>
                            <td>{{ $section->name }}</td>
                            <td>
                                <form action="{{ route('section.destroy',$section->id) }}" method="post">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn text-danger btn-sm">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach   
            </table>
        </div>
    </div>
</div>
@endsection