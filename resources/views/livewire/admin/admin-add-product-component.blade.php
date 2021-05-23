<div>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add New Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.products') }}">Products</a></li>
                    <li class="breadcrumb-item active">Add New</li>
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
                    <div class="col-12 pd-3">
                        @if (Session::has('message'))
                            <div class="alert alert-success">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        <form enctype="multipart/form-data" id="add-form" wire:submit.prevent="addProduct">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" name="" class="form-control" wire:model="name" wire:keyup="generateSlug">
                                        @error('name') <p class="text-danger"> {{$message}} </p> @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Product slug</label>
                                        <input type="text" name="" class="form-control" wire:model="slug">
                                        @error('slug') <p class="text-danger"> {{$message}} </p> @enderror
                                    </div>
                                </div>
                            </div>
                                <div class="form-group">
                                    <div  wire:ignore>
                                        <label>short Descriprtion</label>
                                        <textarea class="form-control" id="short_description" wire:model="short_description" name="" rows="5"></textarea>
                                        @error('short_description') <p class="text-danger"> {{$message}} </p> @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div wire:ignore>
                                        <label>Description</label>
                                        <textarea class="form-control" id="description" wire:model="description" name="" rows="5"></textarea>
                                        @error('description') <p class="text-danger"> {{$message}} </p> @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Regular Price</label>
                                            <input type="text" name="" class="form-control" wire:model="regular_price">
                                            @error('regular_price') <p class="text-danger"> {{$message}} </p> @enderror
                                        </div>
                                    </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Sale Price</label>
                                                <input type="text" name="" class="form-control" wire:model="sale_price">
                                                @error('sale_price') <p class="text-danger"> {{$message}} </p> @enderror
                                            </div>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>SKU</label>
                                            <input type="text" name="" class="form-control" wire:model="SKU">
                                            @error('SKU') <p class="text-danger"> {{$message}} </p> @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="text" name="" class="form-control" wire:model="quantity">
                                            @error('quantity') <p class="text-danger"> {{$message}} </p> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="custom-select form-control" wire:model="category_id" name="">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option> 
                                                @endforeach
                                            </select>
                                            @error('category_id') <p class="text-danger"> {{$message}} </p> @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Stock Status</label>
                                            <select class="custom-select form-control" wire:model="stock_status" name="">
                                                    <option value="instock">InStock</option> 
                                                    <option value="outofstock">Out of stock</option> 
                                            </select>
                                            @error('stock_status') <p class="text-danger"> {{$message}} </p> @enderror
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Featured</label>
                                        <select class="custom-select form-control" wire:model="featured" name="">
                                                <option value="0">No</option> 
                                                <option value="1">Yes</option> 
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Product Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="" wire:model="image">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                            @if ($image)
                                                <img src="{{$image->temporaryUrl()}}" width="120" />
                                            @endif
                                            @error('image') <p class="text-danger"> {{$message}} </p> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success" data-dismiss="modal">Submit</button>
                                    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                                </div>
                        </form>
                    </div>
                </div>
            <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

</div>
@push('scripts')

    <script>
        $(function(){
            tinymce.init({
                selector:'#short_description',
                setup:function(editor){
                    editor.on('Change',function(e){
                        tinyMCE.triggerSave();
                        var sd_data = $('#short_description').val();
                        @this.set('short_description', sd_data);
                    });
                }
            });

            tinymce.init({
                selector:'#description',
                setup:function(editor){
                    editor.on('Change',function(e){
                        tinyMCE.triggerSave();
                        var d_data = $('#description').val();
                        @this.set('description', d_data);
                    });
                }
            });
        });
    </script>
    
@endpush