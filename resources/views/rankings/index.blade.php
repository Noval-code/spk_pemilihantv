<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.dashboard.css')
    <title>Perankingan</title>
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
                <h2 class="mb-4">Ranking Alternatif</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Peringkat</th>
                            <th class="text-center">Alternatif</th>
                            <th class="text-center">Bobot</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rankings as $ranking)
                        <tr>
                            <td class="text-center">{{ $ranking->ranking }}</td>
                            <td class="text-center">{{ $ranking->alternative->name }}</td>
                            <td class="text-center">{{ $ranking->weight }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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