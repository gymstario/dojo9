<div class="row">
    <div class="col-md-8 col-xs-12 set-col">
        <div class="row vertical-gap sm-gap">
            <div class="col-md-12 col-xs-12 display-4" style="margin-bottom: 0px;">
                Studio Details
            </div>
            <input type="hidden" name="studio[country]" value="US" />
            {!! field_wrap($errors, "Studio Name", "studio[name]", "", [], "col-md-12 col-xs-12", $studio ?? [], 'name') !!}
            {!! field_wrap($errors, "Email Address", "studio[email]", "email", [], "col-md-4 col-xs-12", $studio ?? [], 'email') !!}
            {!! field_wrap($errors, "Phone", "studio[phone]", "phone", [], "col-md-4 col-xs-12", $studio ?? [], 'phone') !!}
            {!! field_wrap($errors, "URL", "studio[url]", "", [], "col-md-4 col-xs-12", $studio ?? [], 'url') !!}
            {!! field_wrap($errors, "Address", "studio[address]", "", [], "col-md-8 col-xs-12", $studio ?? [], 'address') !!}
            {!! field_wrap($errors, "City", "studio[city]", "", [], "col-md-4 col-xs-12", $studio ?? [], 'city') !!}
            {!! field_wrap($errors, "State", "studio[state]", "select", config('state'), "col-md-3 col-xs-6", $studio ?? [], 'state') !!}
            {!! field_wrap($errors, "Zip", "studio[zip]", "", [], "col-md-3 col-xs-6", $studio ?? [], 'zip') !!}
            {!! field_wrap($errors, "Business Type", "studio[mcc]", "select", get_mcc_dropdown(), "col-md-6 col-xs-6", $studio ?? [], 'mcc') !!}
            {!! field_wrap($errors, "Tax ID", "studio[tax]", "tax", [], "col-md-6 col-xs-12", $studio ?? [], 'tax_id') !!}
            {!! field_wrap($errors, "Date Established", "studio[date]", "date", [], "col-md-6 col-xs-12", $studio ?? [], 'date') !!}
            {!! field_wrap($errors, "Description", "studio[description]", "", [], "col-md-12 col-xs-12", $studio ?? [], 'description') !!}
            <div class="col-md-12 col-xs-12 display-4" style="margin-bottom: 18px;margin-top: 17px;">
                Verification Documents
            </div>
            {!! field_wrap($errors, "Front Photo", "front", "file", [], "col-md-6 col-xs-12") !!}
            {!! field_wrap($errors, "Back Photo", "back", "file", [], "col-md-6 col-xs-12") !!}
        </div>
    </div>
    <div class="col-md-4 col-xs-12 set-col">
        <div class="row vertical-gap sm-gap">
            <div class="col-md-12 col-xs-12 display-4" style="margin-bottom: 0px;">
                Owner Details
            </div>
            <input type="hidden" name="owner[country]" value="US" />
            {!! field_wrap($errors, "First Name", "owner[firstName]", "", [], "col-md-12 col-xs-12", $member ?? [], 'first_name') !!}
            {!! field_wrap($errors, "Last Name", "owner[lastName]", "", [], "col-md-12 col-xs-12", $member ?? [], 'last_name') !!}
            {!! field_wrap($errors, "SSN Last 4", "owner[ssn]", "", [], "col-md-6 col-xs-12", $member ?? [], 'ssn_last_4') !!}
            {!! field_wrap($errors, "Job Title", "owner[title]", "", [], "col-md-6 col-xs-12", $member ?? [], 'title') !!}
            {!! field_wrap($errors, "Email Address", "owner[email]", "email", [], "col-md-12 col-xs-12", $member ?? [], 'email') !!}
            {!! field_wrap($errors, "Phone", "owner[phone]", "phone", [], "col-md-12 col-xs-12", $member ?? [], 'phone') !!}
            {!! field_wrap($errors, "Address", "owner[address]", "", [], "col-md-12 col-xs-12", $member ?? [], 'address') !!}
            {!! field_wrap($errors, "City", "owner[city]", "", [], "col-md-12 col-xs-12", $member ?? [], 'city') !!}
            {!! field_wrap($errors, "State", "owner[state]", "select", config('state'), "col-md-6 col-xs-6", $member ?? [], 'state') !!}
            {!! field_wrap($errors, "Zip", "owner[zip]", "", [], "col-md-6 col-xs-6", $member ?? [], 'zip') !!}
            {!! field_wrap($errors, "Date of Birth", "owner[dob]", "date", [], "col-md-12 col-xs-12", $member ?? [], 'dob') !!}
        </div>
    </div>
</div>
