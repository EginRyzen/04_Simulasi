@extends('front')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Timeline</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Timeline</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Timelime example  -->
            <div class="row">
                <div class="col-md-12">
                    <!-- The time line -->
                    <div class="timeline">
                        <!-- timeline item -->
                        @foreach ($foto as $item)
                            <div>
                                <i class="fas fa-envelope bg-blue"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fas fa-clock"></i>
                                        {{ $item->created_at->diffForHumans() }}</span>
                                    <a href="{{ asset('image/' . $item->foto) }}" data-toggle="lightbox"
                                        data-title="{{ $item->foto }}">
                                        <img class="d-block m-auto py-5" src="{{ asset('image/' . $item->foto) }}"
                                            height="500" alt="">
                                    </a>
                                    <div class="mx-5">
                                        <h2>{{ $item->judul }}</h2>
                                        <p>{{ $item->deskripsi }}</p>
                                    </div>
                                    <div class="mx-5 pb-5">
                                        <a class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#modal-update{{ $item->id }}">Update</a>
                                        <a href="{{ url('timeline/' . $item->id) }}"
                                            onclick="return confirm('Yakin Untuk DiHapus??')"
                                            class="btn btn-danger btn-sm">Delete</a>
                                    </div>
                                </div>
                                <div class="modal fade" id="modal-update{{ $item->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Update Modal</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ url('timeline/' . $item->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @method('PUT')
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input type="text" value="{{ $item->judul }}"
                                                            class="form-control" required name="judul"
                                                            placeholder="Judul">
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea type="text" rows="5" class="form-control" required name="deskripsi" placeholder="Deskripsi">{{ $item->deskripsi }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="file" name="foto"
                                                            id="inputUpdate{{ $item->id }}">
                                                    </div>
                                                    <div class="form-group">
                                                        @if ($item->foto)
                                                            <img src="{{ asset('image/' . $item->foto) }}"
                                                                id="previewUpdate{{ $item->id }}"
                                                                style="max-width: 150px; width:100%; height:200px">
                                                        @else
                                                            <img id="previewUpdate{{ $item->id }}"
                                                                style="max-width: 150px; width:100%; height:200px">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                            </div>
                        @endforeach
                        <!-- timeline time label -->
                        <div>
                            <i class="fas fa-clock bg-gray"></i>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.timeline -->

    </section>
    <!-- /.content -->
@endsection
