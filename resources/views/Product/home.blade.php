<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hi <span class="text-info font-semibold">{{ auth()->user()->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="container">
                        <div class="row ">

                         
                            <div class="col-lg-12 d-flex justify-content-end ">
                                <a href="{{ route('product.create') }}" class="text-decoration-none">
                                    <button type="button" class="btn btn-info form-control w-100 m-auto px-5">Add product</button>
                                </a>
                            </div>
                        </div>
                        @if(session()->get('update_success'))
                        <div class="alert alert-success pt-4">{{session()->get('update_success')}}</div>
                        @elseif(session()->get('delete_success'))
                        <div class="alert alert-success pt-4">{{session()->get('delete_success')}}</div>
                        @endif
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="d-flex justify-content-start pl-5">
                            <p class="h3 text-info">Products</p>
                        </div>
                        <table class="table table-hover my-3 text-center " id="product-list">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody id="demo">
                                @foreach($products as $index=> $product)
                                <tr>
                                    <td>{{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}</td>

                                    <td>{{$product["name"]}}</td>
                                    <td>{{$product["price"]}}</td>

                                    <!-- Button trigger modal -->
                                    <td class="col-4">

                                        <a href='{{url("/product/details/$product->id")}}' class="text-decoration-none">

                                            <button
                                                type="button"
                                                class="text-primary col-1"
                                                title="details">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                        </a>

                                        <button type="button" class="text-info col-1" title="update" data-toggle="modal" data-target="#exampleModalLong{{$product->id}}"><i class="fa-solid fa-pen-to-square"></i></button>

                                        <button class="text-danger col-1" title="delete" data-toggle="modal" data-target="#exampleModal{{$product->id}}"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>


                        </table>
                        <div class="d-flex justify-content-center ">
                            {{ $products->links() }}

                        </div>
                        @foreach($products as $product)
                        <!-- Modal Update -->
                        <div class="modal fade" id="exampleModalLong{{$product->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog my-0" role="document">
                                <div class="modal-content text-left">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Update Product</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body p-3">
                                        <form action='{{url("/product/update/$product->id")}}' method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <!-- <div class="w-50 m-auto shadow h-100 bg-white p-5 rounded "> -->
                                            <!-- <p id="success" class="alert alert-success d-none"></p> -->

                                            <div class="u-name mb-4">
                                                <label for="ProductName">Name:</label>
                                                <input id="ProductName" type="text" class="form-control rounded" name="name" value="{{$product->name}}">
                                                <p id="erorrProductName" class="text-danger p-0 d-none"></p>
                                            </div>



                                            <div class="u-name mb-4">
                                                <label for="ProductPrice">Price:</label>
                                                <input id="ProductPrice" type="text" class="form-control rounded" name="price" value="{{$product->price}}">
                                                <p id="erorrProductPrice" class="text-danger p-0 d-none"></p>
                                            </div>

                                            <div class="u-name mb-4">
                                                <label for="ProductDescription">Quantity:</label>
                                                <input id="ProductDescription" type="text" class="form-control rounded" name="quantity" value="{{$product->quantity}}">
                                                <p id="erorrProductDescription" class="text-danger p-0 d-none"></p>

                                            </div>
                                            <div class="u-name mb-4">
                                                <label for="ProductCategory">Description:</label>
                                                <textarea id="ProductCategory" type="text" class="form-control rounded" name="description">{{$product->description}}</textarea>
                                                <p id="erorrProductCategory" class="text-danger p-0 d-none"></p>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" id="upadateDataId">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-info" id="setUpdate">Update</button>
                                            </div>

                                            <!-- <button id="setData" class="btn btn-info mt-4">Add Product</button> -->
                                            <!-- </div> -->
                                        </form>

                                    </div>



                                </div>
                            </div>
                        </div>

                        <!-- Modal Delete -->
                        <div class="modal fade" id="exampleModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-info text-center">
                                            Do you really want to delete ?<br>
                                            process cannot be undone
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" id="deleteDataId">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <div class="col-6">
                                            <form action='{{url("product/delete/$product->id")}}' method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm">delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- This Pagenation -->
                        <div class="d-flex justify-content-center">
                            <nav aria-label="...">
                                <ul class="pagination user-select-auto" id="pagination">

                                </ul>
                            </nav>
                        </div>


                    </div>



                </div>
            </div>
        </div>
    </div>

</x-app-layout>