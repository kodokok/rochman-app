<!-- small box -->
<div class="small-box bg-info">
    <div class="inner">
        <h3>{{ isset($auditplans) ? $auditplans->count() : 0 }}</h3>

        <p>Audit Plan</p>
    </div>
    <div class="icon">
        <i class="ion ion-calendar"></i>
    </div>
    <a href="{{ route('auditplan.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
