<div class="modal modal-plan" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title display-4">Create A Plan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(['route' => 'plans.post', 'method' => 'POST', 'class' => 'form rui-sign-form rui-sign-form-cloud']) }}
            <div class="modal-body">
                <div class="row vertical-gap sm-gap">
                    {!! field_wrap($errors, "Name", "name", "", [], "col-md-12 col-xs-12", $plan ?? [], 'name') !!}
                    {!! field_wrap($errors, "Type", "type", "select", ["day" => "Daily", "week" => "Weekly", "month" => "Monthly", "year" => "Yearly"], "col-md-6 col-xs-12", $plan ?? [], 'type') !!}
                    {!! field_wrap($errors, "Interval", "interval", "number", [], "col-md-6 col-xs-12", $plan ?? [], 'interval') !!}
                    {!! field_wrap($errors, "Amount", "amount", "", [], "col-md-6 col-xs-12", $plan ?? [], 'amount') !!}
                    {!! field_wrap($errors, "Status", "active", "select", [true => "Active", false => "Deactive"], "col-md-6 col-xs-12", $plan ?? [], 'address') !!}
                    {!! field_wrap($errors, "Target", "target", "select", $products, "col-md-12 col-xs-12", $plan ?? [], 'address') !!}
                    <div class="col-md-12 col-xs-12">
                        <label class="form-control-label">Plan Attributes</label>
                        <div class="fields">
                            <div class="input-group" style="margin-bottom: 18px;">
                                <div class="input-group-prepend" onclick="addMore($(this))">
                                    <div class="input-group-text">
                                        <span class="fa fa-plus add-more"></span>
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="attributes[name][]" placeholder="Name" />
                                <input type="text" class="form-control" name="attributes[value][]" placeholder="Value" />
                            </div>
                        </div>
                    </div>
                </div>
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
