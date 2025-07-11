@extends('admin.layouts.vertical', ['title' => 'Manage Slider'])

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
                                    <th>ID</th>
                                    <th>Slider Name</th>
                                    <th>slider Slug</th>
                                    <th>slider Image</th>
                                    <th>slider Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sn = 1;
                                ?>
                                @foreach($data as $row)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ $row->slider_name }}</td>
                                    <td>{{ $row->slider_slug }}</td>
                                    <td>
                                        @php
                                        $imagePath = 'media/slider/' . $row->slider_image;
                                        @endphp

                                        @if(!empty($row->slider_image) && Storage::disk('public')->exists($imagePath))
                                        <img src="{{ asset('storage/' . $imagePath) }}" alt="Slider" width="80" />
                                        @else
                                        <span class="text-muted">No Image</span>
                                        {{-- Optional default image --}}
                                        {{-- <img src="{{ asset('default/no-image.png') }}" width="80" alt="No Image" /> --}}
                                        @endif
                                    </td>

                                    <td>
                                        @if($row->status == 1)
                                        <a href="{{url('admin/slider/status/0')}}/{{$row->id}}"><button type="button"
                                                class="btn btn-success">Active</button></a>
                                        @elseif($row->status == 0)
                                        <a href="{{url('admin/slider/status/1')}}/{{$row->id}}"><button type="button"
                                                class="btn btn-warning">Deactive</button></a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('admin/slider/manage_slider/')}}/{{$row->id}}"><button
                                                type="button" class="btn btn-success">Edit</button></a>

                                        <a href="{{url('admin/slider/delete/')}}/{{$row->id}}"
                                            onclick="return confirm('Are you sure you want to delete this slider?')"><button
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