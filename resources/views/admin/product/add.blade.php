@extends('admin.layouts.vertical', ['title' => $id > 0 ? 'Edit Product' : 'Add Product'])

@section('content')
<div class="container-xxl">
    <form action="{{ route('product.manage_product_process') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $id }}">

        <!-- Product Info Card -->
        <div class="card mb-4">
            <div class="card-header">
                <h4 class="card-title">Product Information</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    {{-- Category --}}
                    <div class="col-lg-6 mb-3">
                        <label for="category_id" class="form-label">Select Category <span class="text-danger">*</span></label>
                        <select id="category_id" name="category_id" class="form-select" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <!-- Product Name -->
                    <div class="col-lg-6 mb-3">
                        <label class="form-label">Product Name <span class="text-danger">*</span></label>
                        <input type="text" name="product_name" id="product-name" class="form-control" value="{{ $product_name }}" required>
                        @error('product_name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Slug -->
                    <div class="col-lg-6 mb-3">
                        <label class="form-label">Slug <span class="text-danger">*</span></label>
                        <input type="text" name="product_slug" id="product-slug" class="form-control" value="{{ $product_slug }}" required>
                        @error('product_slug') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>


                    <!-- Image Upload -->
                    <div class="col-lg-6 mb-3">
                        <label class="form-label">Product Main Image <span class="text-danger">*</span></label>
                        <input type="file" name="product_image" accept="image/*" class="form-control mb-2">
                        @if($product_image)
                        <img src="{{ asset('storage/media/product/' . $product_image) }}" width="100" class="img-thumbnail">
                        @endif
                    </div>

                    <!-- Product Desc -->
                    <div class="col-lg-12 mb-3">
                        <label class="form-label">Product Description</label>
                        <textarea name="product_desc" class="form-control" rows="4">{{ $product_desc }}</textarea>
                    </div>

                    <!-- Sort Order -->
                    <div class="col-lg-3 mb-3">
                        <label class="form-label">Sort Order</label>
                        <input type="number" name="sort_order" class="form-control" value="{{ $sort_order }}">
                    </div>

                    <!-- Status Switch -->
                    <div class="col-lg-3 mb-3">
                        <label class="form-label">Status</label><br>
                        <input type="hidden" name="status" id="hiddenStatus" value="{{ $status }}">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="activeSwitch" {{ $status == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="activeSwitch" id="statusLabel">{{ $status == 1 ? 'Active' : 'Inactive' }}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Product More Images --}}
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">
                    Product Additional Images <span id="imageCount" class="text-primary">(1)</span>
                </h5>

                <button type="button" class="btn btn-sm btn-success" onclick="addMoreImages()">+ Add Image</button>
            </div>
            <div class="card-body">
                {{-- Placeholder for no images --}}
                <div id="noImageMsg" class="text-muted text-center">No image selected.</div>

                <div class="row" id="productImagesBox">
                    <div class="col-md-3 image-box mb-3">
                        <div class="input-group">
                            <input type="file" name="more_images[]" class="form-control" accept="image/*">
                            <button type="button" class="btn btn-danger" onclick="removeImageRow(this)">×</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Product More Attributes --}}
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Product Pricing / Weight Attributes (<span id="pricingCount">1</span>)</h5>
                <button type="button" class="btn btn-sm btn-success" onclick="addPricingRow()">+ Add</button>
            </div>

            <div class="card-body" id="pricingContainer">
                <!-- Initial Row -->
                <div class="row mb-3 pricing-row align-items-end" id="row-0">
                    <div class="col-md-2"><input type="text" class="form-control" name="weights[0][weight]" placeholder="Weight"></div>
                    <div class="col-md-2"><input type="text" class="form-control" name="weights[0][weight_type]" placeholder="Weight Type"></div>
                    <div class="col-md-2"><input type="number" class="form-control" name="weights[0][mrp_price]" placeholder="MRP"></div>
                    <div class="col-md-2"><input type="number" class="form-control" name="weights[0][discount]" placeholder="Discount %"></div>
                    <div class="col-md-2"><input type="number" class="form-control" name="weights[0][selling_price]" placeholder="Selling Price"></div>
                    <div class="col-md-2"><input type="number" class="form-control" name="weights[0][tax_in_percentage]" placeholder="Tax %"></div>
                    <div class="col-md-2">
                        <select name="weights[0][tax_type]" class="form-control">
                            <option value="exclusive">Exclusive</option>
                            <option value="inclusive">Inclusive</option>
                        </select>
                    </div>
                    <div class="col-md-2"><input type="number" class="form-control" name="weights[0][net_price]" placeholder="Net Price"></div>
                    <div class="col-md-2"><input type="number" class="form-control" name="weights[0][tax_in_value]" placeholder="Tax Value"></div>
                    <div class="col-md-2"><input type="text" class="form-control" name="weights[0][hsncode]" placeholder="HSN Code"></div>
                    <div class="col-md-1">
                        <input type="checkbox" name="weights[0][in_stock]" value="1" checked> In Stock
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger btn-sm" onclick="removePricingRow(this)">Remove</button>
                    </div>
                </div>
            </div>

            <div id="pricingEmptyText" class="text-danger px-3 d-none">No Pricing Row Found</div>
        </div>




        <!-- Meta SEO -->
        <div class="card mb-4">
            <div class="card-header">
                <h4 class="card-title">Meta Info</h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="{{ $meta_title }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Meta Keywords</label>
                    <textarea name="meta_keywords" class="form-control" rows="2">{{ $meta_keywords }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Meta Description</label>
                    <textarea name="meta_desc" class="form-control" rows="2">{{ $meta_desc }}</textarea>
                </div>
            </div>
        </div>


        <!-- status managent -->
        <div class="card mb-4">
            <div class="card-header">
                <h4 class="card-title">Status Management</h4>
            </div>
            <div class="card-body">
                <div class="row mb-4">

                    @php
                    $statusFields = [
                    ['name' => 'in_stock', 'label' => 'In Stock', 'value' => $in_stock ?? 0],
                    ['name' => 'cod_available', 'label' => 'Available for COD', 'value' => $cod_available ?? 0],
                    ['name' => 'is_featured', 'label' => 'Featured Product', 'value' => $is_featured ?? 0],
                    ['name' => 'is_trending', 'label' => 'Trending Product', 'value' => $is_trending ?? 0],
                    ['name' => 'is_new_arrival', 'label' => 'New Arrival', 'value' => $is_new_arrival ?? 0],
                    ['name' => 'is_combo', 'label' => 'Combo Product', 'value' => $is_combo ?? 0],
                    ['name' => 'is_flavor', 'label' => 'Flavor is Everything', 'value' => $is_flavor ?? 0],
                    ['name' => 'is_savor', 'label' => 'Savor the Difference', 'value' => $is_savor ?? 0],
                    ];
                    @endphp

                    @foreach ($statusFields as $field)
                    <div class="col-md-3 mb-2">
                        <div class="form-check form-switch">
                            <input type="hidden" name="{{ $field['name'] }}" value="0">
                            <input class="form-check-input status-toggle" type="checkbox"
                                id="{{ $field['name'] }}Switch"
                                name="{{ $field['name'] }}"
                                value="1"
                                {{ $field['value'] == 1 ? 'checked' : '' }}
                                data-label-id="{{ $field['name'] }}Label">

                            <label class="form-check-label" id="{{ $field['name'] }}Label" for="{{ $field['name'] }}Switch">
                                {!! $field['value'] == 1 ? $field['label'] : '<del>' . $field['label'] . '</del>' !!}
                            </label>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>


        <!-- Submit -->
        <div class="text-end">
            <button type="submit" class="btn btn-primary">
                {{ $id > 0 ? 'Update Product' : 'Create Product' }}
            </button>
        </div>
    </form>
</div>

<script>
    document.querySelectorAll('.status-toggle').forEach(input => {
        input.addEventListener('change', function() {
            const labelId = this.getAttribute('data-label-id');
            const label = document.getElementById(labelId);
            const labelText = label.textContent;

            if (this.checked) {
                label.innerHTML = labelText;
            } else {
                label.innerHTML = `<del>${labelText}</del>`;
            }
        });
    });

    // Slug auto-generate from name
    document.getElementById('product-name').addEventListener('input', function() {
        let slug = this.value.toLowerCase()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-');
        document.getElementById('product-slug').value = slug;
    });

    // Status Switch
    const switchInput = document.getElementById('activeSwitch');
    const statusLabel = document.getElementById('statusLabel');
    const hiddenStatus = document.getElementById('hiddenStatus');

    switchInput.addEventListener('change', function() {
        if (this.checked) {
            statusLabel.textContent = 'Active';
            hiddenStatus.value = '1';
        } else {
            statusLabel.textContent = 'Inactive';
            hiddenStatus.value = '0';
        }
    });

    // <!-- img script -->

    document.addEventListener('DOMContentLoaded', function() {
        toggleNoImageMessage();
        updateImageCount(); // initial count
    });

    function addMoreImages() {
        const html = `
            <div class="col-md-3 image-box mb-3">
                <div class="input-group">
                    <input type="file" name="more_images[]" class="form-control" accept="image/*">
                    <button type="button" class="btn btn-danger" onclick="removeImageRow(this)">×</button>
                </div>
            </div>`;
        document.getElementById('productImagesBox').insertAdjacentHTML('beforeend', html);
        toggleNoImageMessage();
        updateImageCount(); // update count
    }

    function removeImageRow(btn) {
        btn.closest('.image-box').remove();
        toggleNoImageMessage();
        updateImageCount(); // update count
    }

    function toggleNoImageMessage() {
        const imageBoxes = document.querySelectorAll('#productImagesBox .image-box');
        const msg = document.getElementById('noImageMsg');
        msg.style.display = imageBoxes.length === 0 ? 'block' : 'none';
    }

    function updateImageCount() {
        const imageBoxes = document.querySelectorAll('#productImagesBox .image-box');
        document.getElementById('imageCount').innerText = `(${imageBoxes.length})`;
    }


    // <!-- attr script -->

    let rowIndex = 1;

    function addPricingRow() {
        const container = document.getElementById('pricingContainer');
        const row = document.createElement('div');
        row.classList.add('row', 'mb-3', 'pricing-row', 'align-items-end');
        row.id = `row-${rowIndex}`;

        row.innerHTML = `
            <div class="col-md-2"><input type="text" class="form-control" name="weights[${rowIndex}][weight]" placeholder="Weight"></div>
            <div class="col-md-2"><input type="text" class="form-control" name="weights[${rowIndex}][weight_type]" placeholder="Weight Type"></div>
            <div class="col-md-2"><input type="number" class="form-control" name="weights[${rowIndex}][mrp_price]" placeholder="MRP"></div>
            <div class="col-md-2"><input type="number" class="form-control" name="weights[${rowIndex}][discount]" placeholder="Discount %"></div>
            <div class="col-md-2"><input type="number" class="form-control" name="weights[${rowIndex}][selling_price]" placeholder="Selling Price"></div>
            <div class="col-md-2"><input type="number" class="form-control" name="weights[${rowIndex}][tax_in_percentage]" placeholder="Tax %"></div>
            <div class="col-md-2">
                <select name="weights[${rowIndex}][tax_type]" class="form-control">
                    <option value="exclusive">Exclusive</option>
                    <option value="inclusive">Inclusive</option>
                </select>
            </div>
            <div class="col-md-2"><input type="number" class="form-control" name="weights[${rowIndex}][net_price]" placeholder="Net Price"></div>
            <div class="col-md-2"><input type="number" class="form-control" name="weights[${rowIndex}][tax_in_value]" placeholder="Tax Value"></div>
            <div class="col-md-2"><input type="text" class="form-control" name="weights[${rowIndex}][hsncode]" placeholder="HSN Code"></div>
            <div class="col-md-1">
                <input type="checkbox" name="weights[${rowIndex}][in_stock]" value="1" checked> In Stock
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-danger btn-sm" onclick="removePricingRow(this)">Remove</button>
            </div>
        `;
        container.appendChild(row);
        rowIndex++;
        updatePricingCount();
    }

    function removePricingRow(button) {
        const row = button.closest('.row');
        row.remove();

        updatePricingCount();
        const container = document.getElementById('pricingContainer');
        const emptyText = document.getElementById('pricingEmptyText');
        emptyText.classList.toggle('d-none', container.children.length > 0);
    }

    function updatePricingCount() {
        const rows = document.querySelectorAll('.pricing-row');
        document.getElementById('pricingCount').innerText = rows.length;
    }

    window.onload = function() {
        updatePricingCount();
    };
</script>



@endsection