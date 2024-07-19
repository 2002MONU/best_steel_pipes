@extends('admin.layout.main')
@section('title')Sub Category Details @endsection
@section('maindashboard')

<!-- App hero header starts -->
<div class="app-hero-header d-flex align-items-center">
    <script>
        window.onload = function() {
            // Alert messages for login success or errors
            @if (session('success'))
                alert("{{ session('success') }}");
            @endif

            @if (session('error'))
                alert("{{ session('error') }}");
            @endif
        };
    </script>
    <!-- Breadcrumb starts -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <i class="ri-home-8-line lh-1 pe-3 me-3 border-end"></i>
            <a href="{{route('admin.dashboard')}}">Home</a>
        </li>
        <li class="breadcrumb-item text-primary" aria-current="page">
           Sub-Category
        </li>
    </ol>
    <!-- Breadcrumb ends -->
</div>
<!-- App Hero header ends -->

<!-- App body starts -->
<div class="app-body">

    <!-- Row starts -->
    <div class="row gx-3">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title"> Sub-Category And other details</h5>
                    <a href="{{ route('productsubcategories.create') }}" class="btn btn-primary ms-auto">Add Sub Category</a>
                </div>
                <div class="card-body">

                    <!-- Table starts -->
                    <div class="table-responsive">
                        <table id="basicExample" class="table m-0 align-middle">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Product Category</th>
                                    <th>Product Sub-Category</th>
                                    <th>Title</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                   
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sub_categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->productcategory }}</td>
                                    <td>{{ $category->productsubcategory }}</td>
                                    <td>{{ $category->title }}</td>
                                    <td>{{ $category->priority }}</td>
                                    <td>
                                        @if ($category->status == 1)
                                            <span class="badge border border-success text-success">Active</span> 
                                        @else
                                            <span class="badge border border-danger text-danger">Inactive</span>
                                        @endif
                                    </td>
                                    
                                    <td>
                                        <div class="d-inline-flex gap-1">
                                            <a href="{{ route('productsubcategories.edit', ['productsubcategory' => $category->id]) }}" class="btn btn-outline-success btn-sm">
                                                <i class="ri-edit-box-line"></i>
                                            </a>
                                            <form id="delete-productsubcategory-{{ $category->id }}" action="{{ route('productsubcategories.destroy', ['productsubcategory' => $category->id]) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                    
                                            <!-- Delete Button -->
                                            <a href="{{ route('productsubcategories.destroy', ['productsubcategory' => $category->id]) }}" class="btn btn-outline-danger btn-sm" onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('delete-productsubcategory-{{ $category->id }}').submit(); }">
                                                <i class="ri-delete-bin-line"></i>
                                            </a>
                                        </div>
                                    </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Pagination links -->
                        {{-- {{ $brands->links() }} --}}
                    </div>
                    <!-- Table ends -->

                </div>
            </div>
        </div>
    </div>
    <!-- Row ends -->

</div>
<!-- App body ends -->
@endsection
