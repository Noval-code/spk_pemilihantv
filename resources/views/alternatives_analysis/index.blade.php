<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.dashboard.css')
    <title>Analisa Alternatif</title>
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
                <h2 class="mb-4">Analisa Alternatif</h2>
                <div class="shadow p-5">
                    <a href="{{ route('alternative_analysis.reset', ['id_criteria' => $id_criteria]) }}" class="btn btn-primary text-white" onclick="return confirm('Data akan dihapus, lanjutkan?')">Reset Data</a>
                    <hr>
                    @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form action="{{ route('alternative_analysis.index') }}" method="get">
                        <div class="row">
                            <div class="col-xs-12 col-md-3">
                                <div class="form-group pt-3">
                                    <label for="choose_kriteria" class="mb-2">Pilih kriteria</label>
                                    <select name="id_criteria" id="choose_kriteria" class="form-control" onchange="this.form.submit()">
                                        <option value="">Pilih Kriteria</option>
                                        @foreach(App\Models\Criteria::all() as $criteria)
                                        <option value="{{ $criteria->id }}" {{ $id_criteria == $criteria->id ? 'selected' : '' }}>{{ $criteria->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>

                    <h4 class="my-4">Perbandingan Antar Alternatif</h4>
                    <table class="table table-bordered">
                        <tr>
                            <th class="text-center">Alternatif</th>
                            @foreach ($alternatives as $alt)
                            <th class="text-center">{{ $alt->label }}</th>
                            @endforeach
                        </tr>

                        @foreach ($alternatives as $alt1)
                        <tr>
                            <td>{{ $alt1->label }}</td>
                            @foreach ($alternatives as $alt2)
                            <td class="text-center">
                                <form action="{{ route('alternative_analysis.store') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id_criteria" value="{{ $id_criteria }}">
                                    <input type="hidden" name="id_alternative2" value="{{ $alt2->id }}">
                                    <input type="hidden" name="id_alternative1" value="{{ $alt1->id }}">
                                    <input type="text" name="value" class="form-control" onchange="this.form.submit()">
                                </form>
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </table>

                    <h4>Hasil Perbandingan Alternatif</h4>
                    <table class="table table-bordered">
                        <tr>
                            <th class="text-center">Alternatif</th>
                            @foreach ($alternatives as $alt)
                            <th class="text-center">{{ $alt->label }}</th>
                            @endforeach
                        </tr>
                        @foreach ($alternatives as $alt1)
                        <tr>
                            <td>{{ $alt1->label }}</td>
                            @foreach ($alternatives as $alt2)
                            @php
                            $comparison = $comparisons->where('id_alternative1', $alt1->id)->where('id_alternative2', $alt2->id)->first();
                            $value = $comparison ? round($comparison->value, 2) : '';
                            @endphp
                            <td class="text-center">{{ $value }}</td>
                            @endforeach
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="1">Jumlah</td>
                            @foreach ($sum_values as $sum_value)
                            <td class="text-center"><b>{{ $sum_value }}</b></td>
                            @endforeach
                        </tr>
                    </table>

                    <h4>Normalisasi</h4>
                    <table class="table table-bordered">
                        <tr>
                            <th class="text-center">Alternatif</th>
                            @foreach ($alternatives as $alt)
                            <th class="text-center">{{ $alt->label }}</th>
                            @endforeach
                            <th class="text-center">Rata-rata</th>
                        </tr>
                        @foreach ($alternatives as $alt1)
                        <tr>
                            <td>{{ $alt1->label }}</td>
                            @php $sum_nm = 0.0; @endphp
                            @foreach ($alternatives as $alt2)
                            @php
                            $normalisasi = $normalizations[$alt1->id][$alt2->id] ?? 0;
                            $sum_nm += $normalisasi;
                            @endphp
                            <td class="text-center">{{ round($normalisasi,4) }}</td>
                            @endforeach
                            <td class="text-center">{{ round($sum_nm / ($alternatives->count() ?: 1), 6) }}</td>
                        </tr>
                        @endforeach
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