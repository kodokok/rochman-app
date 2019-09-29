<!-- small box -->
<div class="small-box bg-warning">
    <div class="inner">
        <h3>{{ isset($temuanaudits) ? $temuanaudits->count() : 0 }}</h3>

        <p>Temuan Audit</p>
    </div>
    <div class="icon">
        <i class="ion ion-create"></i>
    </div>
    <a href="{{ route('temuanaudit.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
