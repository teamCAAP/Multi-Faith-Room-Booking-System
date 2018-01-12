<div class="prayer-times">
    <p>
        <button aria-controls="prayer-times" aria-expanded="false" class="btn btn-primary" data-target="#prayer-times" data-toggle="collapse" type="button">View prayer times</button>
    </p>
    <div class="collapse" id="prayer-times">
        <div class="card text-center bg-light">
            <div class="card-body">
                <div class="card-header">Prayer Times</div>
                @include('includes.prayer-times-table')
            </div>
        </div>
    </div>
</div>