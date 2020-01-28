<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Temuan Audit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
table thead tr td {
    font-weight: bold;
}
table tr td {
    font-size: 10px;
}
</style>
<body>
    <div class="container-fluid">
        {{-- title row --}}
        <div class="row text-center">
            <h2 class="page-header">
                <div class="report-title">Laporan Temuan Audit</div>
            </h2>
        </div>
        <div class="row text-center">
            <small>{{ $week != null ? $week : 'Semua'}}</small>
        </div>
        {{-- table row --}}
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr bgcolor="#ADADAD">
                            <td rowspan="2">No. Audit</td>
                            <td rowspan="2">Rincian Ketidaksesuaian</td>
                            <td rowspan="2">Klausul/Elemen</td>
                            <td rowspan="2">Deskripsi Pasal</td>
                            <td colspan="2">Status Temuan</td>
                            <td rowspan="2">Observasi</td>
                            <td rowspan="2">Temuan Positif</td>
                            <td colspan="3">Bukti</td>
                            <td rowspan="2">Keterangan</td>
                        </tr>
                        <tr bgcolor="#ADADAD">

                            <td>Mayor</td>
                            <td>Minor</td>

                            <td>A</td>
                            <td>B</td>
                            <td>C</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $dept)
                            <tr>
                                <td colspan="12" class="text-center">{{ $dept->kode }}</td>
                            </tr>
                            @foreach ($dept->auditplans as $auditplans)
                                @foreach ($auditplans->temuanAudits as $ta)
                                    <tr>
                                        <td>{{ $ta->audit_plan_id }}</td>
                                        <td>{{ $ta->ketidaksesuaian }}</td>
                                        <td>{{ $ta->klausul->objektif_audit }}</td>
                                        <td>{{ $ta->klausul->nama }}</td>
                                        <td>{{ $ta->klasifikasi_temuan == 0 ? 'X' : '' }}</td>
                                        <td>{{ $ta->klasifikasi_temuan == 1 ? 'X' : '' }}</td>
                                        <td></td>
                                        <td></td>
                                        <td>{{ $ta->approval_kadept > 0 ? 'X' : '' }}</td>
                                        <td>{{ $ta->approval_auditor > 0 ? 'X' : '' }}</td>
                                        <td>{{ $ta->approval_auditor_lead > 0 ? 'X' : '' }}</td>
                                        <td>{{ $ta->review }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
