@extends('admin.layouts.vertical', ['title' => 'Add Category'])

@section('content')

    <div class="container-xxl">
        <div class="row">
            <div class="col-xl-12 col-lg-8 ">
                <form action="{{route('category.manage_category_process')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Category Information</h4>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="category-name" class="form-label">Category Name <span
                                                class="text-primary">(*)</span></label>
                                        <input type="text" id="category-name" class="form-control"
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
                                        <label for="category-slug" class="form-label">Category Slug <span
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
                                        <h5 class="text-dark fw-medium">Category Status <span
                                                class="text-primary">(*)</span>
                                        </h5>
                                        <div class="d-flex flex-wrap gap-2 form-switch" role="group">
                                            <!-- hidden field to always send status -->
                                            <input type="hidden" name="status" id="hiddenStatus" value="<?= $status ?>">

                                            <!-- actual visible switch -->
                                            <input class="form-check-input" type="checkbox" role="switch" id="activeSwitch"
                                                <?= $status == 1 ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="activeSwitch" id="statusLabel">
                                                <?= $status == 1 ? 'Active' : 'Inactive' ?>
                                            </label>

                                        </div>
                                    </div>
                                </div>

                                
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Category Banner Photo <span class="text-danger">(Optional)</span>
                            </h4>
                        </div>
                        <div class="card-body p-1">
                            <div class="mb-3">
                                <input type="file" name="category_image" accept="image/*" class="form-control" />
                                <small class="form-text text-muted">
                                    600px x 600px recommended. PNG and JPG files are allowed.
                                </small>
                            </div>

                            @if($category_image != '')
                                <a href="{{ asset('storage/media/category/' . $category_image) }}" target="_blank">
                                    <img width="100px" src="{{ asset('storage/media/category/' . $category_image) }}" />
                                </a>
                            @endif
                        </div>
                    </div>


                    <input type="hidden" name="id" value="{{$id}}" />

                    <div class="p-3 bg-white mb-3 rounded">
                        <div class="row justify-content-end">
                            <div class="col-lg-2">
                                @if($id > 1)
                                    <input class="btn btn-primary w-100" type="submit" value="Update Category">
                                @else
                                    <input class="btn btn-primary w-100" type="submit" value="Create Category">
                                @endif
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // status switch
        const switchInput = document.getElementById('activeSwitch');
        const statusLabel = document.getElementById('statusLabel');
        const hiddenStatus = document.getElementById('hiddenStatus');

        switchInput.addEventListener('change', function () {
            if (this.checked) {
                statusLabel.textContent = 'Active';
                hiddenStatus.value = '1'; // send 1
            } else {
                statusLabel.textContent = 'Inactive';
                hiddenStatus.value = '0'; // send 0
            }
        });
        
        // slug live fetch
        document.getElementById('category-name').addEventListener('input', function () {
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