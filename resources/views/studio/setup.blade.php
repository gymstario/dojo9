@if(session('showSetupModal') === true)
<div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title display-3">Studio Setup</h5>
            </div>
            {{ Form::open(['enctype' => 'multipart/form-data', 'route' => 'studio.post', 'class' => 'form rui-sign-form rui-sign-form-cloud']) }}
            <div class="modal-body">
                @include('studio.partial.studio')
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-brand">
                    Setup Studio
                </button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endif
