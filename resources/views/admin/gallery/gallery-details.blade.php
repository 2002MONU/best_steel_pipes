@extends('admin.layout.main')
@section('title') Gallery Details @endsection
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
            Gallery 
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
                    <h5 class="card-title">Gallery List</h5>
                    <a href="{{ route('galleries.create') }}" class="btn btn-primary ms-auto">Add Gallery</a>
                </div>
                <div class="card-body">

                    <!-- Table starts -->
                    <div class="table-responsive">
                        <table id="basicExample" class="table m-0 align-middle">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title (When image didn't show)</th>
                                    <th>Gallery Image</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php 
                                  $i = 1;
                                @endphp
                                @foreach($galleries as $gallery)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $gallery->title }}</td>
                                    <td>
                                        <a href="{{ asset('assets/dynamics/gallery/' . $gallery->image) }}">
                                            <img src="{{ asset('assets/dynamics/gallery/' . $gallery->image) }}" style="width:100px;height:100px;">
                                        </a>
                                    </td>
                                    <td>
                                        @if ($gallery->status == 1)
                                        <span class=" badge border border-success text-success">active</span> 
                                        @else
                                         <span class="badge border border-danger text-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $gallery->created_at }}</td>
                                    <td>{{ $gallery->updated_at }}</td>
                                    <td>
                                        <div class="d-inline-flex gap-1">
                                            <a href="{{ route('galleries.edit', ['gallery' => $gallery->id]) }}" class="btn btn-outline-success btn-sm">
                                                <i class="ri-edit-box-line"></i>
                                            </a>
                                            <form id="delete-brand-{{ $gallery->id }}" action="{{ route('galleries.destroy', ['gallery' => $gallery->id]) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                            <!-- Delete Button -->
                                            <a href="{{ route('brands.destroy', ['brand' => $gallery->id]) }}" class="btn btn-outline-danger btn-sm" onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('delete-brand-{{ $gallery->id }}').submit(); }">
                                                <i class="ri-delete-bin-line"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Pagination links -->
                        
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
