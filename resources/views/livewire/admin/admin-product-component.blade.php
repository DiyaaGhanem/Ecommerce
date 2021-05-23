<div>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0 text-dark">products</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">products</li>
                </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All products</h3>
                
                                <div class="card-tools">
                                  <a href="{{ route('admin.addproduct')}}" type="button" class="btn btn-sm btn-primary">
                                      Add New
                                  </a>
                                </div>
                              </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                @if (Session::has('message'))
                                    <div class="alert alert-success">
                                        {{Session::get('message')}}
                                    </div>
                                @endif
                              <table class="table table-hover text-nowrap table-striped">
                                <thead>
                                  <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Sale Price</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td> 
                                                <img src="{{ asset("assets/images/products") }}/{{$product->image}}" height="60px" alt="">
                                            </td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->stock_status }}</td>
                                            <td>{{ $product->regular_price }}</td>
                                            <td>{{ $product->sale_price }}</td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>{{Carbon\Carbon::parse($product->created_at)->format('F d, Y')}}</td>
                                            <td>
                                                <a href="{{ route('admin.editproduct', ['product_slug' => $product->slug ]) }}" type="button" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="#" onclick="confirm('Are You sure, You want to delete [{{$product->name}}] ?') || event.stopImmediatePropagation()" wire:click.prevent="deleteProduct({{$product->id}})" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                              </table>
                                <div class="d-flex my-3 justify-content-center">
                                    {{ $products->links() }}
                                </div>
                            </div>
                            <!-- /.card-body -->
                          </div>
                    </div>
                </div>
            <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
</div>