<div>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0 text-dark">Sliders</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Sliders</li>
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
                                <h3 class="card-title">All Sliders</h3>
                
                                <div class="card-tools">
                                  <a href="{{ route('admin.addhomeslider')}}" type="button" class="btn btn-sm btn-primary">
                                      Add New Slider
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
                                    <th>Title</th>
                                    <th>subtitle</th>
                                    <th>Price</th>
                                    <th>Link</th>
                                    <th>status</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($sliders as $slider)
                                        <tr>
                                            <td>{{ $slider->id }}</td>
                                            <td> 
                                                <img src="{{ asset("assets/images/sliders") }}/{{$slider->image}}" height="90px" alt="">
                                            </td>
                                            <td>{{ $slider->title }}</td>
                                            <td>{{ $slider->subtitle }}</td>
                                            <td>{{ $slider->price }}</td>
                                            <td>{{ $slider->link }}</td>
                                            <td>{{ $slider->status == 1 ? 'Active' : 'Inactive' }}</td>
                                            <td>{{Carbon\Carbon::parse($slider->created_at)->format('F d, Y')}}</td>
                                            <td>
                                                <a href="{{ route('admin.edithomeslider', ['slide_id' => $slider->id ]) }}" type="button" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="#" wire:click.prevent="deleteSlider({{$slider->id}})" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                              </table>
                                <div class="d-flex my-3 justify-content-center">
                                    {{ $sliders->links() }}
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