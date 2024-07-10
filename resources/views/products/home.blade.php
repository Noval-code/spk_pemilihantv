<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.dashboard.css')
    <title>Nilai Alternatif</title>
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
                <div class="d-flex align-items-center justify-content-between">

                    <h1 class="mt-20">Daftar Nilai Alternatif</h1>
                    <a href="{{ route('/products/create') }}" class="btn btn-primary">Tambah Nilai Alternatif</a>

                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
                @endif
                <div class="table-responsive"> <!-- Added class here -->
                    <table class="table table-hover w-100"> <!-- Changed class here -->
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Ukuran Layar</th>
                                <th>Resolusi</th>
                                <th>Konsumsi Daya</th>
                                <th>Garansi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $product->name }}</td>
                                <td class="align-middle">{{ $product->price }}</td>
                                <td class="align-middle">{{ $product->screen_size }} inch</td>
                                <td class="align-middle">{{ $product->resolution }}</td>
                                <td class="align-middle">{{ $product->power_consumption }} watt</td>
                                <td class="align-middle">{{ $product->warranty }}</td>
                                <td class="align-middle">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('/products/edit', ['id'=>$product->id]) }}" type="button" class="btn btn-secondary">Edit</a>
                                        <a href="{{ route('/products/delete', ['id'=>$product->id]) }}" type="button" class="btn btn-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="8">Nilai Alternatif Tidak Ada</td> <!-- Changed colspan here -->
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>



    </div>
    <!-- content end -->
    </div>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="admincss/lib/chart/chart.min.js"></script>
    <script src="admincss/lib/easing/easing.min.js"></script>
    <script src="admincss/lib/waypoints/waypoints.min.js"></script>
    <script src="admincss/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="admincss/lib/tempusdominus/js/moment.min.js"></script>
    <script src="admincss/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="admincss/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="admincss/js/main.js"></script>
</body>

</html>