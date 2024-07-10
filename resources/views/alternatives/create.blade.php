<!-- resources/views/admin/product/create.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.dashboard.css')
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Sidebar Start -->
        @include('admin.dashboard.sidebar')
        <!-- Sidebar End -->

        <!-- content start -->
        <div class="content">

            <!-- Navbar Start -->
            @include('admin.dashboard.navbar')
            <!-- Navbar End -->

            <div class="container-fluid pt-4 px-4">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-0">Tambah Alternatif</h1>
                    <hr />
                    @if (session()->has('error'))
                    <div>
                        {{session('error')}}
                    </div>
                    @endif
                    <p><a href="{{ route('/alternatives') }}" class="btn btn-primary">Kembali</a></p>

                    <form action="{{ route('/alternatives/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="name" class="form-control" placeholder="nama">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="label" class="form-control" placeholder="label">
                                @error('label')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <button class="btn btn-primary">Simpan</button>

                    </form>
                </div>
            </div>


        </div>
        <!-- javascript -->
        @include('admin.dashboard.js')
</body>

</html>