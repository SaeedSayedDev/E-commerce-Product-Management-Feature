<x-app-layout>



    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container  ">
                        <div class="row mb-1">
                            <div class="col-lg-5">
                            </div>
                            <div class="col-lg-5">
                                <p class="font-semibold text-gray-1000 text-info " style="font-size: 2rem;">Add Product</p>
                            </div>
                        </div>
                        <form action="{{url('/product/store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="w-50 m-auto shadow h-100 bg-white p-4 rounded ">
                                <!-- <p id="success" class="alert alert-success d-none"></p> -->
                                @if(session()->get('Add_success'))
                                <div class="alert alert-success">{{session()->get('Add_success')}}</div>
                                @endif
                                <div class="u-name mb-4">
                                    <label for="ProductName">Name:</label>
                                    <input id="ProductName" type="text" class="form-control rounded" name="name" value="{{ old('name') }}">
                                    <p id="erorrProductName" class="text-danger p-0 d-none"></p>
                                    @error('name')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                               

                                <div class="u-name mb-4">
                                    <label for="ProductPrice">Price:</label>
                                    <input id="ProductPrice" type="text" class="form-control rounded" name="price" value="{{ old('price') }}">
                                    <p id="erorrProductPrice" class="text-danger p-0 d-none"></p>
                                    @error('price')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="u-name mb-4">
                                    <label for="ProductDescription">Quantity:</label>
                                    <input id="ProductDescription" type="text" class="form-control rounded" name="quantity" value="{{ old('quantity') }}">
                                    <p id="erorrProductDescription" class="text-danger p-0 d-none"></p>
                                    @error('quantity')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="u-name mb-4">
                                    <label for="ProductCategory">Description:</label>
                                    <textarea id="ProductCategory" type="text" class="form-control rounded" name="description" >{{ old('description') }}</textarea>
                                    <p id="erorrProductCategory" class="text-danger p-0 d-none"></p>
                                    @error('description')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-center align-items-center pt-4" >
                                    <button id="setData" class="btn btn-info w-50 ">Add Product</button>
                                </div>

                                <!-- <button id="setData" class="btn btn-info mt-4">Add Product</button> -->
                            </div>
                        </form>
                    </div>





                </div>
            </div>
        </div>
    </div>
</x-app-layout>