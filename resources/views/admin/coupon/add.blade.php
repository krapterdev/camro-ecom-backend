@extends('admin.layouts.vertical', ['title' => 'Add Coupons'])

@section('content')

    <div class="container-xxl">
        <div class="row">
            <div class="col-xl-12 col-lg-8 ">
                <form action="{{route('category.manage_category_process')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Coupons Information</h4>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="product-name" class="form-label">Coupons Name <span
                                                class="text-primary">(*)</span></label>
                                        <input type="text" id="product-name" class="form-control"
                                            placeholder="Enter Category Name" value="{{$category_name}}"
                                            name="category_name" required>
                                        @error('category_name')
                                            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="category-slug" class="form-label">Coupons Slug <span
                                                class="text-primary">(*)</span></label>
                                        <input type="text" id="category-slug" class="form-control"
                                            placeholder="Enter Category Slug" value="{{$category_slug}}"
                                            name="category_slug" required>
                                        @error('category_slug')
                                            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-4">
                                    <div class="mt-3">
                                        <h5 class="text-dark fw-medium">Coupons Status <span
                                                class="text-primary">(*)</span>
                                        </h5>
                                        <div class="d-flex flex-wrap gap-2 form-switch" role="group">
                                            <input class="form-check-input" type="checkbox" role="switch" id="activeSwitch"
                                                checked>
                                            <label class="form-check-label" for="activeSwitch"
                                                id="statusLabel">Active</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <input type="hidden" name="id" value="{{$id}}" />

                    <div class="p-3 bg-white mb-3 rounded">
                        <div class="row justify-content-end">
                            <div class="col-lg-2">
                                @if($id > 1)
                                    <input class="btn btn-primary w-100" type="submit" value="Update Coupons">
                                @else
                                    <input class="btn btn-primary w-100" type="submit" value="Create Coupons">
                                @endif
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const switchInput = document.getElementById('activeSwitch');
        const statusLabel = document.getElementById('statusLabel');
        switchInput.addEventListener('change', function () {
            if (this.checked) {
                statusLabel.textContent = 'Active';
            } else {
                statusLabel.textContent = 'Inactive';
            }
        });

        document.getElementById('product-name').addEventListener('input', function () {
            let title = this.value;

            // Slug banane ka logic
            let slug = title.toLowerCase() // lowercase
                .replace(/[^a-z0-9\s-]/g, '') // special chars remove
                .replace(/\s+/g, '-')         // space to hyphen
                .replace(/-+/g, '-');          // multiple hyphen to single

            document.getElementById('category-slug').value = slug;
        });
    </script>

@endsection