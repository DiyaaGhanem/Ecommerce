<div>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add New slider</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.homeslider') }}">sliders</a></li>
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
                        <form enctype="multipart/form-data" id="add-form" wire:submit.prevent="addSlider">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Slider title</label>
                                        <input type="text" name="" class="form-control" wire:model="title" >
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Subtitle</label>
                                        <input type="text" name="" class="form-control" wire:model="subtitle">
                                    </div>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Link</label>
                                            <input type="text" name="" class="form-control" wire:model="link">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="custom-select form-control" wire:model="status" name="">
                                                    <option value="0">Inactive</option> 
                                                    <option value="1">Active</option> 
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" name="" class="form-control" wire:model="price">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Slider Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="" wire:model="image">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                            @if ($image)
                                            <img src="{{$image->temporaryUrl()}}" width="120" />
                                            @endif
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