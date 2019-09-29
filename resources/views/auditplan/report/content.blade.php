<div class="card p-3 mb-3">
    <!-- title row -->
    <div class="row">
        <div class="col-12">
            <h4>
                <i class="fas fa-calendar-alt mr-2"></i>Audit Plan Report
                <small class="float-right">Date: {{ date('Y-m-d') }}</small>
            </h4>
        </div>
        <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="report-header row pt-2 my-md-2 pt-md-2 mb-2 border-top">
        <div class="col-sm-4">
            <div class="row">
                <div class="col-sm-4 font-weight-bold">Nomor Audit<span class="float-right">:</span></div>
                <div class="col-sm-8">{{ $auditplan->id }}</div>
            </div>
            <div class="row">
                <div class="col-sm-4 font-weight-bold">Objektif Audit<span class="float-right">:</span></div>
                <div class="col-sm-8">{{ $auditplan->objektif_audit }}</div>
            </div>
            <div class="row">
                <div class="col-sm-4 font-weight-bold">Klausul<span class="float-right">:</span></div>
                <div class="col-sm-8">{{ $auditplan->klausul }}</div>
            </div>
            <div class="row">
                <div class="col-sm-4 font-weight-bold">Tanggal Audit<span class="float-right">:</span></div>
                <div class="col-sm-8">{{ $auditplan->getSchedule() }}</div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="row">
                <div class="col-sm-4 font-weight-bold text-muted">Departement<span class="float-right">:</span></div>
                <div class="col-sm-8">{{ $auditplan->departement->name }}</div>
            </div>
            <div class="row">
                <div class="col-sm-4 font-weight-bold">Kadept<span class="float-right">:</span></div>
                <div class="col-sm-8">{{ $auditplan->departement->user->name }}</div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="row">
                <div class="col-sm-4 font-weight-bold">Auditee<span class="float-right">:</span></div>
                <div class="col-sm-8">{{ $auditplan->auditee->name }}</div>
            </div>
            <div class="row">
                <div class="col-sm-4 font-weight-bold">Auditor<span class="float-right">:</span></div>
                <div class="col-sm-8">{{ $auditplan->auditor->name }}</div>
            </div>
            <div class="row">
                <div class="col-sm-4 font-weight-bold">Auditor Leader<span class="float-right">:</span></div>
                <div class="col-sm-8">{{ $auditplan->auditorLeader->name }}</div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row pt-2 my-md-2 pt-md-2 border-top">
        <div class="col-12">Temuan audit:</div>
    </div>
    <!-- Table row -->
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th rowspan="2">Nomor</th>
                        <th rowspan="2">Ketidaksesuaian</th>
                        <th rowspan="2">Akar Masalah</th>
                        <th colspan="2">Perbaikan</th>
                        <th colspan="2">Pencegahan</th>
                        <th colspan="4">Approve</th>
                        <th rowspan="2">Status</th>
                        <th rowspan="2">Review</th>
                    </tr>
                    <tr>
                        <th>Tindakan</th>
                        <th>Due Date</th>
                        <th>Tindakan</th>
                        <th>Due Date</th>
                        <th>Kadept</th>
                        <th>Auditee</th>
                        <th>Auditor</th>
                        <th>Auditor Leader</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($temuanaudits as $key => $temuanaudit)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $temuanaudit->ketidaksesuaian }}</td>
                            <td>{{ $temuanaudit->akar_masalah }}</td>
                            <td>{{ $temuanaudit->tindakan_perbaikan }}</td>
                            <td>{{ $temuanaudit->duedate_perbaikan }}</td>
                            <td>{{ $temuanaudit->tindakan_pencegahan }}</td>
                            <td>{{ $temuanaudit->duedate_pencegahan }}</td>
                            <td><i class="{{ $temuanaudit->approve_kadept ? 'ion ion-android-done' : '' }}"></i></td>
                            <td><i class="{{ $temuanaudit->approve_auditee ? 'ion ion-android-done' : '' }}"></i></td>
                            <td><i class="{{ $temuanaudit->approve_auditor ? 'ion ion-android-done' : '' }}"></i></td>
                            <td><i class="{{ $temuanaudit->approve_auditor_leader ? 'ion ion-android-done' : '' }}"></i></td>
                            <td>{{ strtoupper($temuanaudit->status) }}</td>
                            <td>{{ $temuanaudit->review }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="report-footer">
        <div class="row pt-2 my-md-2 pt-md-2 mt-2 border-top align-items-end">
            <div class="col-sm-4">
                <div class="row col-sm-4 font-weight-bold">Remarks:</div>
                <div class="row col-sm-8">
                    {{ $auditplan->remarks }}
                </div>
            </div>
            <div class="col-sm-4"></div>
            <div class="col-sm-4"></div>
        </div>
        <div class="row"><div class="col-12"><p></p></div></div>
        <div class="row"><div class="col-12"><p></p></div></div>
        <div class="row"><div class="col-12"><p></p></div></div>
        <div class="row">
            <div class="col-sm-8"></div>
            <div class="col-sm-4">
                    <div class="row justify-content-end text-center">
                        <div class="col-sm-3 border-top border-dark m-2">
                            {{ $auditplan->auditee->name }}
                        </div>
                        <div class="col-sm-3 border-top border-dark m-2">
                            {{ $auditplan->auditor->name }}
                        </div>
                        <div class="col-sm-3 border-top border-dark m-2">
                            {{ $auditplan->auditorLeader->name }}
                        </div>
                    </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
