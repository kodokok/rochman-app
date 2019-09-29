<div class="card">
    <div class="card-header border-transparent">
        <h3 class="card-title">Pending Approval</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table m-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Departement</th>
                        <th>Objektif Audit</th>
                        <th>Klausul</th>
                        <th>Schedule</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($auditplans))
                        @foreach ($auditplans as $auditplan)
                        <tr>
                            <td>{{ $auditplan->id }}</td>
                            <td>{{ $auditplan->departement->name }}</td>
                            <td>{{ $auditplan->objektif_audit }}</td>
                            <td>{{ $auditplan->klausul }}</td>
                            <td>{{ $auditplan->getSchedule() }}</td>
                            <td>
                                <a href="{{ route('auditplan.show', $auditplan->id) }}" class="btn btn-sm btn-success float-left"><i class="fas fa-check"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
        <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
        <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
    </div>
    <!-- /.card-footer -->
</div>
