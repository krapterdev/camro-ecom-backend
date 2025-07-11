@extends('admin.layouts.vertical', ['title' => 'Manage product'])

@section('content')

@if(session()->has('message'))
<script>
    document.addEventListener("DOMContentLoaded", function() {
        Toastify({
            text: "{{ session('message') }}",
            duration: 3000,
            gravity: "top",
            position: "center",
            close: true,
            backgroundColor: "#4CAF50", // Success color (green)
        }).showToast();
    });
</script>
@endif


<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div>
                    <div class="table-responsive">
                        <table id="myTable" class="table align-middle mb-2 table-hover table-centered">
                            <thead class="bg-light-subtle">
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">product Name</th>
                                    <th class="text-center">product Slug</th>
                                    <th class="text-center">product Image</th>
                                    <th class="text-center">product Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sn = 1;
                                ?>
                                @foreach($data as $row)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ $row->product_name }}</td>
                                    <td>{{ $row->product_slug }}</td>
                                    
                                    <td class="text-center">@php
                                    $imagePath = 'media/product/' . $row->product_image;
                                    @endphp
                                    @if(!empty($row->product_image) && Storage::disk('public')->exists($imagePath))
                                        <img src="{{ asset('storage/' . $imagePath) }}" alt="product" width="50" />
                                        @else
                                        <span class="text-muted">No Product Image</span>
                                        @endif
 </td>
                                    <td class="text-center">
                                        @if($row->status == 1)
                                        <a href="{{url('admin/product/status/0')}}/{{$row->id}}"><button type="button"
                                                class="btn btn-success">Active</button></a>
                                        @elseif($row->status == 0)
                                        <a href="{{url('admin/product/status/1')}}/{{$row->id}}"><button type="button"
                                                class="btn btn-warning">Deactive</button></a>
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        <a href="{{url('admin/product/manage_product/')}}/{{$row->id}}"><button
                                                type="button" class="btn btn-success">Edit</button></a>

                                        <a href="{{url('admin/product/delete/')}}/{{$row->id}}"
                                            onclick="return confirm('Are you sure you want to delete this product?')"><button
                                                type="button" class="btn btn-danger">Delete</button></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable(); // initialize DataTables
    });
</script>

@endsection