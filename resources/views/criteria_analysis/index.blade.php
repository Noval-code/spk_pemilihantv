<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.dashboard.css')
    <title>Analisa Kriteria</title>
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
                <h2 class="mb-4">Analisa Kriteria</h2>
                <div class="shadow p-5">
                    <a href="{{ route('criteria_analysis.reset') }}" class="btn btn-primary text-white" onclick="return confirm('Data akan dihapus, lanjutkan?')">Reset Data</a>
                    <hr>
                    @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <h4>Perbandingan Antar Kriteria</h4>
                    <table class="table table-bordered">
                        <tr>
                            <th class="text-center">Kriteria</th>
                            @foreach ($criterias as $criteria)
                            <th class="text-center">{{ $criteria->name }}</th>
                            @endforeach
                        </tr>
                        @foreach ($criterias as $criteria)
                        <tr>
                            <td>{{ $criteria->name }}</td>
                            @foreach ($criterias as $innerCriteria)
                            <td class="text-center">
                                <form action="{{ route('criteria_analysis.store') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id_criteria2" value="{{ $innerCriteria->id }}">
                                    <input type="hidden" name="id_criteria1" value="{{ $criteria->id }}">
                                    <input type="text" name="value" class="form-control" onchange="this.form.submit()">
                                </form>
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </table>

                    <h4>Hasil Perbandingan Kriteria</h4>
                    <table class="table table-bordered">
                        <tr>
                            <th class="text-center">Kriteria</th>
                            @foreach ($criterias as $criteria)
                            <th class="text-center">{{ $criteria->name }}</th>
                            @endforeach
                        </tr>
                        @foreach ($criterias as $criteria)
                        <tr>
                            <td>{{ $criteria->name }}</td>
                            @foreach ($criterias as $innerCriteria)
                            @php
                            $value = $criteriaAnalysis->where('id_criteria1', $criteria->id)->where('id_criteria2', $innerCriteria->id)->first();
                            $value = $value ? round($value->value, 2) : '';
                            @endphp
                            <td class="text-center">{{ $value }}</td>
                            @endforeach
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="1">Jumlah</td>
                            @foreach ($criterias as $criteria)
                            <td class="text-center"><b>{{ $criteria->total_criterias }}</b></td>
                            @endforeach
                        </tr>
                    </table>

                    <h4>Normalisasi</h4>
                    <table class="table table-bordered">
                        <tr>
                            <th class="text-center">Kriteria</th>
                            @foreach ($criterias as $criteria)
                            <th class="text-center">{{ $criteria->name }}</th>
                            @endforeach
                            <th class="text-center">Rata-rata</th>
                        </tr>
                        @foreach ($criterias as $criteria)
                        <tr>
                            <td>{{ $criteria->name }}</td>
                            @foreach ($criterias as $innerCriteria)
                            <td class="text-center">
                                {{ $normalizations[$criteria->id][$innerCriteria->id] ?? '' }}
                            </td>
                            @endforeach
                            <td class="text-center">{{ $criteria->weight }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="1">Jumlah</td>
                            @foreach (range(0, $criterias->count()) as $i)
                            <td class="text-center"><b>{{ round($criterias->sum('weight'), 2) }}</b></td>
                            @endforeach
                        </tr>
                    </table>

                    <h4>Cek Konsistensi Kriteria</h4>
                    <div style="border: 1px solid; padding: 30px;">
                        <h4 class="mb-2">
                            @if(isset($ci))
                            Eigen Max :
                            {{ $avg_eigen_max }} <br />
                            Random Index (RI) :
                            {{ $ri }} <br />
                            Consistency Index (CI) :
                            {{ $ci }} <br />
                            Consistency Ratio (CR) :
                            {{ $cr }} <br />
                            {{ $consistency_message }}
                            @else
                            {{ $consistency_message }}
                            @endif
                        </h4>
                    </div>
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