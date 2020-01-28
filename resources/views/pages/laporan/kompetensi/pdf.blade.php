<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Kompetensi Auditor</title>
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
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-header">
                    <div class="report-title">Laporan Kompetensi Auditor</div>
                </h2>
            </div>
        </div>
        {{-- table row --}}
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr bgcolor="#ADADAD">
                            <td>User ID</td>
                            <td>Nama Auditor</td>
                            <td>Pelatihan</td>
                            <td class="text-right">Nilai</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td><strong>{{ $item->id }}</strong></td>
                                <td colspan="3"><strong>{{ $item->nama }}</strong></td>
                            </tr>
                            @foreach ($item->kompetensi_auditors as $kompetensi)
                                <tr>
                                    <td colspan="2"></td>
                                    <td>{{ $kompetensi->pelatihan }}</td>
                                    <td class="text-right">{{ number_format($kompetensi->nilai, 2) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3"><strong>Rata - Rata</strong></td>
                                <td class="text-right"><strong>{{ number_format($item->kompetensi_auditors->avg('nilai'), 2) }}</strong></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
