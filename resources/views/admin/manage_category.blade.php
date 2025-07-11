@extends('admin.layout')

@section('container')

    <!-- Page Title Start -->
    <div class="flex items-center justify-between flex-wrap   mb-6">
        <h4 class="text-slate-900 text-lg font-medium mb-2">Create Category</h4>
        <a href="{{ url('admin/category') }}"
            class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-blue-700 py-2 px-4 border border-blue-500 hover:border-transparent rounded">Manage
            Category</a>
    </div>
    <!-- Page Title End -->

    <div class="w-full gap-6 mb-6">
        <div class="card">
            <div class="p-6">
                {{ session('message') }}
                <form action="{{ route('category.manage_category_process') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <div class="flex flex-wrap -mx-2">
                            <div class="w-full md:w-1/3 px-2 mb-4 md:mb-0">
                                <label for="category_name" class="block mb-1 font-medium">Category Name</label>
                                <input id="category_name" value="{{$category_name}}" name="category_name" type="text"
                                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    aria-required="true" aria-invalid="false" required>
                            </div>

                            <div class="w-full md:w-1/3 px-2 mb-4 md:mb-0">
                                <label for="category_name" class="block mb-1 font-medium">Parent Category</label>
                                <select id="parent_category_id" name="parent_category_id"
                                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                                    <option value="0">Select Categories</option>
                                    @foreach($category as $list)
                                        @if($parent_category_id == $list->id)
                                            <option selected value="{{$list->id}}">
                                        @else
                                                <option value="{{$list->id}}">
                                            @endif
                                            {{$list->category_name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="w-full md:w-1/3 px-2">
                                <label for="category_slug" class="block mb-1 font-medium">Category Slug</label>
                                <input id="category_slug" value="{{$category_slug}}" name="category_slug" type="text"
                                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    aria-required="true" aria-invalid="false" required>
                                @error('category_slug')
                                    <div class="text-red-600 mt-1 text-sm">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block mb-1 font-medium">Image</label>
                        <input id="category_image" name="category_image" type="file"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            aria-required="true" aria-invalid="false">
                        @error('category_image')
                            <div class="text-red-600 mt-1 text-sm">
                                {{$message}}
                            </div>
                        @enderror

                        @if($category_image != '')
                            <a href="{{asset('storage/media/category/' . $category_image)}}" target="_blank">
                                <img src="{{ asset('storage/media/category/' . $category_image) }}" width="100px"
                                    class="mt-2 rounded-md shadow-md" alt="Category Image"> 
                            </a>
                        @endif
                    </div>

                    <div class="mb-4">
                        <label for="is_home" class="block mb-1 font-medium">Show in Home Page</label>
                        <input id="is_home" name="is_home" type="checkbox" {{$is_home_selected}}
                            class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    </div>

                    <div class="mb-4">
                        <button id="payment-button" type="submit"
                            class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition">
                            Submit
                        </button>
                    </div>

                    <input type="hidden" name="id" value="{{$id}}" />
                </form>

            </div>
        </div>
    </div> <!-- end p-6-->



@endsection