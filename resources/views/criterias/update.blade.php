<!-- resources/views/admin/product/update.blade.php -->

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
                    <h1 class="mb-0">Edit Kriteria</h1>
                    <hr />
                    <form action="{{ route('/criterias/update', $criterias->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">nama</label>
                                <input type="text" name="name" class="form-control" placeholder="nama" value="{{$criterias->name}}">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">tipe</label>
                                <input type="text" name="type" class="form-control" placeholder="tipe" value="{{$criterias->type}}">
                                @error('type')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <button class="btn btn-warning">Edit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('admin.dashboard.js')
</body>

</html>