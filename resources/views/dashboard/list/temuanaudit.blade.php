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
                        <th>Audit Plan</th>
                        <th>Ketidaksesuaian</th>
                        <th>Akar Masalah</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
        {{ $temuanaudits->appends(request()->query())->links() }}
    </div>
    <!-- /.card-footer -->
</div>
