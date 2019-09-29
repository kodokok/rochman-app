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
                        @foreach ($auditplans as $ap)
                            <tr>
                                <td>{{ $ap->id }}</td>
                                <td>{{ $ap->departement->name }}</td>
                                <td>{{ $ap->objektif_audit }}</td>
                                <td>{{ $ap->klausul }}</td>
                                <td>{{ $ap->getSchedule() }}</td>
                                <td>
                                    <a href="{{ route('auditplan.show', $ap->id) }}" class="btn btn-sm btn-success float-left"><i class="fas fa-check"></i></a>
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
