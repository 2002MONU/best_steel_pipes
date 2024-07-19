@extends('admin.layout.main')
@section('title') Testimonial Details @endsection
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
            Testimonial
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
                    <h5 class="card-title">Testimonials</h5>
                    <a href="{{ route('testinomials.create') }}" class="btn btn-primary ms-auto">Add Testimonial</a>
                </div>
                <div class="card-body">

                    <!-- Table starts -->
                    <div class="table-responsive">
                        <table id="basicExample" class="table m-0 align-middle">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Description</th>
                                    <th>Client Name</th>
                                    <th>Designation</th>
                                    <th>Client Image</th>
                                    <th>Status</th>
                                    <th>Updated</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($testimonials as $testi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td></td>
                                    <td>{{ $testi->clientname }}</td>
                                    <td>{{ $testi->designation }}</td>
                                    <td>
                                        <a href="{{ asset('assets/dynamics/slider/' . $testi->clientimage) }}">
                                            <img src="{{ asset('assets/dynamics/slider/' . $testi->clientimage) }}" style="width:100px;height:100px;">
                                        </a>
                                    </td>
                                    <td>
                                        @if ($testi->status == 1)
                                        <span class=" badge border border-success text-success">active</span> 
                                        @else
                                         <span class="badge border border-danger text-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $testi->updated_at }}</td>
                                    <td>
                                        <div class="d-inline-flex gap-1">
                                            <a href="{{ route('testinomials.edit', ['testinomial' => $testi->id]) }}" class="btn btn-outline-success btn-sm">
                                                <i class="ri-edit-box-line"></i>
                                            </a>
                                            <form id="delete-testimonial-{{ $testi->id }}" action="{{ route('testinomials.destroy', ['testinomial' => $testi->id]) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                            <!-- Delete Button -->
                                            <a href="{{ route('testinomials.destroy', ['testinomial' => $testi->id]) }}" class="btn btn-outline-danger btn-sm" onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('delete-testimonial-{{ $testi->id }}').submit(); }">
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
