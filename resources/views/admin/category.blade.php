@extends('admin.layouts.vertical', ['title' => 'Manage Category'])

@section('container')

    <!-- Page Title Start -->
    <div class="flex items-center justify-between flex-wrap   mb-6">
        <h4 class="text-slate-900 text-lg font-medium mb-2">Manage Category</h4>
        <a href="{{ url('admin/category/manage_category') }}"
            class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-blue-700 py-2 px-4 border border-blue-500 hover:border-transparent rounded">Add
            Category</a>
    </div>
    <!-- Page Title End -->

    <div class="w-full gap-6 mb-6">
        <div class="card">

            <table class="w-full">
                <thead class="bg-light/40 border-b border-gray-100">
                    <tr>
                        <th class="p-2 text-start w-1/3">Category Name</th>
                        <th class="p-2 text-start w-1/3">Category Home Status</th>
                        <th class="p-2 text-start w-1/3">Category Status</th>
                        <th class="p-2 text-start w-1/3">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($data as $category)
                        <tr>
                            <td class="p-2">{{ $category->category_name }}</td>

                            <td class="p-2">
                                @if($category->is_home == '0')

                                    <button type="button"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-700 rounded">Deactivate</button>

                                @elseif($category->is_home == '1')

                                    <button type="button"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-700 rounded">Activate</button>

                                @endif
                            </td>

                            <td class="p-2">
                                @if($category->status == '0')

                                    <a href="{{ url('admin/category/status/1/' . $category->id) }}"
                                        class="text-red-500 hover:text-red-700"><button type="button"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-700 rounded">Deactivate</button></a>

                                @elseif($category->status == '1')

                                    <a href="{{ url('admin/category/status/0/' . $category->id) }}"
                                        class="text-green-500 hover:text-green-700"><button type="button"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-700 rounded">Activate</button></a>

                                @endif
                            </td>

                            <td class="p-2">
                                <a href="{{ url('admin/category/manage_category/' . $category->id) }}"
                                    class="text-blue-500 hover:text-blue-700">Edit</a>
                                <a href="{{ url('admin/category/delete/' . $category->id) }}"
                                    class="text-red-500 hover:text-red-700 ml-4">Delete</a>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div> <!-- end p-6-->
    </div> <!-- end card-->
    <!-- #region --><!-- end row -->



@endsection