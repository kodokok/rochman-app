<!-- small box -->
<div class="small-box bg-info">
    <div class="inner">
        <h3>{{ isset($auditplans) ? $auditplans->count() : 0 }}</h3>

        <p>Audit Plan</p>
        <p class="small">Open : <span class="mr-2">{{ $openedAuditplansCount }}</span> Approved: {{ $approvedAuditplansCount }}</p>
    </div>
    <div class="icon">
        <i class="ion ion-md-calendar"></i>
    </div>
    <a href="{{ route('auditplan.index') }}" class="small-box-footer">
        More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
