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
                    <h1 class="mb-0">Edit Product</h1>
                    <hr />
                    <form action="{{ route('/products/update', $products->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" name="name" class="form-control" placeholder="name" value="{{$products->name}}">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Harga</label>
                                <input type="text" name="price" class="form-control" placeholder="price" value="{{$products->price}}">
                                @error('price')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Ukuran Layar</label>
                                <input type="text" name="screen_size" class="form-control" placeholder="Product Screen Size" value="{{$products->screen_size}}">
                                @error('screen_size')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Resolusi</label>
                                <input type="text" name="resolution" class="form-control" placeholder="Product Resolution" value="{{$products->resolution}}">
                                @error('resolution')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Konsumsi Daya</label>
                                <input type="text" name="power_consumption" class="form-control" placeholder="Product Power Consumption" value="{{$products->power_consumption}}">
                                @error('power_consumption')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Garansi</label>
                                <input type="text" name="warranty" class="form-control" placeholder="Product Warranty" value="{{$products->warranty}}">
                                @error('warranty')
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