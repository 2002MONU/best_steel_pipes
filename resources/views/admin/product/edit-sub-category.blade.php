@extends('admin.layout.main')

@section('title')
Edit Sub Category
@endsection

@section('maindashboard')
<!-- App container starts -->
<div class="app-hero-header d-flex align-items-center">

    <!-- Breadcrumb starts -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <i class="ri-home-8-line lh-1 pe-3 me-3 border-end"></i>
            <a href="{{route('admin.dashboard')}}">Home</a>
        </li>
        <li class="breadcrumb-item text-primary" aria-current="page">
            <a href="javascript:history.back()">Back</a>
        </li>
        <li class="breadcrumb-item text-primary" aria-current="page">
            Edit Sub Category
        </li>
    </ol>
    <!-- Breadcrumb ends -->
    <script>
        window.onload = function() {
            @if (session('error'))
                alert("{{ session('error') }}");
            @endif
        };
    </script>
</div>
<!-- App Hero header ends -->

<!-- App body starts -->
<div class="app-body">
    <!-- Row starts -->
    <div class="row gx-3">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Edit Sub Category and other details</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('productsubcategories.update', ['productsubcategory' => $sub_category->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Use PUT method for update -->
                        <!-- Row starts -->
                        <div class="row gx-3">
                            <div class="col-xxl-6 col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label" for="productcategory_id">Product Category Name</label>
                                    <select class="form-select" name="productcategory_id" id="productcategory_id">
                                        <option value="" disabled selected>Select Product Category</option>
                                        @foreach($product_category as $product)
                                            <option value="{{ $product->id }}" {{ $sub_category->productcategory_id == $product->id ? 'selected' : '' }}>{{ $product->productcategory }}</option>
                                        @endforeach
                                    </select>
                                    @error('productcategory_id')
                                    <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xxl-6 col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label" for="productsubcategory">Product Sub-Category Name</label>
                                    <input type="text" class="form-control" name="productsubcategory" value="{{ $sub_category->productsubcategory }}" placeholder="Enter Product Sub-Category">
                                    @error('productsubcategory')
                                    <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xxl-6 col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label" for="productsubcategory">Url</label>
                                    <input type="text" class="form-control" name="url" value="{{ $sub_category->url }}" placeholder="Enter url">
                                    @error('url')
                                    <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                          
                            <div class="col-xxl-6 col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label" for="productsubcategory">Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ $sub_category->title }}" placeholder="Enter title">
                                    @error('title')
                                    <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                             <div class="col-xxl-6 col-lg-6 col-sm-12">
                  <div class="mb-3">
                      <label class="form-label" for="title">Price</label>
                      <input type="number" class="form-control" name="price" value="{{ old('price',$sub_category->price) }}" placeholder="Enter price">
                      @error('price')
                      <div class="error text-danger">{{ $message }}</div>
                      @enderror
                  </div>
              </div>
                   <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label" for="a1"> Image (You can select multiple images )</label>
                      <input type="file" class="form-control" name="images[]" multiple >
                      @error('images[]')
                      <div class="error text-danger">{{ $message }}</div>
                      @enderror  
                  </div>
                  </div>
                            <div class="col-xxl-6 col-lg-6 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="title">Unit</label>
                                <input type="text" class="form-control" name="unit" value="{{ old('unit',$sub_category->unit) }}" placeholder="Enter price">
                                @error('unit')
                                <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                             <div class="col-xxl-6 col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label" for="productsubcategory">priority</label>
                                    <input type="text" class="form-control" name="priority" value="{{ $sub_category->priority }}" placeholder="Enter title">
                                    @error('priority')
                                    <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xxl-6 col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label" for="description">Product Details</label>
                                    <textarea type="text" class="form-control ckeditor" name="description" placeholder="Enter Product Description">{{ $sub_category->description }}</textarea>
                                    @error('description')
                                    <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xxl-6 col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label" for="description">Our Service Benefits</label>
                                    <textarea type="text" class="form-control ckeditor1" name="services" placeholder="Enter Product Description">{{ $sub_category->services }}</textarea>
                                    @error('services')
                                    <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                           
                            <div class="col-xxl-6 col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label" for="status">Status</label>
                                    <select class="form-select" name="status" id="status">
                                        <option value="" disabled selected>Select Status</option>
                                        <option value="1" {{ $sub_category->status == '1' ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $sub_category->status == '0' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                    <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xxl-6 col-lg-6 col-sm-12">
                <div id="input-container">
                  <!-- Input fields will be added here -->
                </div>
                <button type="button" id="add-input-button" class="btn btn-secondary mt-2">Add other details</button>
              </div>

              <div class="col-xxl-6 col-lg-6 col-sm-12">
                <div id="application-container">
                  <!-- Application fields will be added here -->
                </div>
                <button type="button" id="add-application-button" class="btn btn-secondary mt-2">Add common applications</button>
              </div>
                            <div class="col-sm-12">
                                <div class="d-flex gap-2 justify-content-end">
                                    <button class="btn btn-primary" type="submit">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div> 
                        <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
                        <script>
                            ClassicEditor
                                .create(document.querySelector('.ckeditor'))
                                .catch(error => {
                                    console.error(error);
                                });
                        
                            ClassicEditor
                                .create(document.querySelector('.ckeditor1'))
                                .catch(error => {
                                    console.error(error);
                                });
                        </script>
                        <!-- Row ends -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Row ends -->
</div>
<!-- App body ends -->
<script>
    document.getElementById('add-input-button').addEventListener('click', function () {
    const container = document.getElementById('input-container');
    const inputGroup = document.createElement('div');
    inputGroup.classList.add('mb-3');
    const inputHeading = document.createElement('input');
    inputHeading.type = 'text';
    inputHeading.name = 'headings[]';
    inputHeading.placeholder = 'Enter Heading';
    inputHeading.classList.add('form-control', 'mb-2');
    const inputValue = document.createElement('input');
    inputValue.type = 'text';
    inputValue.name = 'values[]';
    inputValue.placeholder = 'Enter Value';
    inputValue.classList.add('form-control', 'mb-2');
    inputGroup.appendChild(inputHeading);
    inputGroup.appendChild(inputValue);
    container.appendChild(inputGroup);
  });

  document.getElementById('add-application-button').addEventListener('click', function () {
    const container = document.getElementById('application-container');
    const applicationGroup = document.createElement('div');
    applicationGroup.classList.add('mb-3');
    const inputImage = document.createElement('input');
    inputImage.type = 'file';
    inputImage.name = 'application_image[]';
    inputImage.classList.add('form-control', 'mb-2');
    const inputTitle = document.createElement('input');
    inputTitle.type = 'text';
    inputTitle.name = 'application_title[]';
    inputTitle.placeholder = 'Enter Application Title';
    inputTitle.classList.add('form-control', 'mb-2');
    const inputDescription = document.createElement('textarea');
    inputDescription.name = 'application_descriptions[]';
    inputDescription.placeholder = 'Enter Application Description';
    inputDescription.classList.add('form-control', 'mb-2');
    applicationGroup.appendChild(inputImage);
    applicationGroup.appendChild(inputTitle);
    applicationGroup.appendChild(inputDescription);
    container.appendChild(applicationGroup);
  });
    </script>
@endsection
