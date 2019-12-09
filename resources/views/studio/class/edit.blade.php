<div class="modal modal-class" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title display-4">Create Class</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ Form::open(['route' => 'class.post', 'method' => 'POST', 'class' => 'form rui-sign-form rui-sign-form-cloud']) }}
                <div class="modal-body">
                    <div class="row vertical-gap sm-gap">
                        {!! field_wrap($errors, "Class Name", "name", "", [], "col-md-12 col-xs-12", $period ?? [], 'name') !!}
                        {!! field_wrap($errors, "Time Starts", "start", "time", [], "col-md-6 col-xs-12", $period ?? [], 'start') !!}
                        {!! field_wrap($errors, "Time Ends", "end", "time", [], "col-md-6 col-xs-12", $period ?? [], 'end') !!}
                        {!! field_wrap($errors, "Branch", "branch", "select", $branches, "col-md-12 col-xs-12", $period ?? [], 'branch') !!}
                        <div class="col-md-12 col-xs-12">
                            <label class="form-control-label">Days Of the Week</label>
                            <div class="row vertical-gap sm-gap" style="padding: 0 26px;">
                                @foreach(config('days') as $key => $val)
                                <div class="col-md-4 col-xs-4">
                                    <div class="custom-control custom-checkbox"></div>
                                    <input type="checkbox" name="days[]" value="{{ $key }}" />
                                    <label>{{ $val }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-brand">
                        Create Class
                    </button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
