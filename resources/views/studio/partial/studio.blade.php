<div class="row">
    <div class="col-md-6 col-xs-12 set-col">
        <div class="row vertical-gap sm-gap">
            <div class="col-md-12 col-xs-12 display-4"><b>Account</b> | <span class="merchant-service">Merchant Service</span></div>
            <div class="col-md-12 col-xs-12 title-marchant">Merchant Service</div>
            <div class="payment-processing"><p>Payment processing for you account is provided by Stripe.<br>Apply with Stripe to Start accepting credit card payment for you Business</p>
            </div>
            <div class="col-md-12 col-xs-12 display-4" style="margin-bottom: 0px;">
                Business Information
            </div>
            <input type="hidden" name="studio[country]" value="US" />
            {!! field_wrap($errors, "Business Name", "studio[name]", "", [], "col-md-12 col-xs-12", $studio ?? [], 'name') !!}
            {!! field_wrap($errors, "Business Type", "studio[mcc]", "select", get_mcc_dropdown(), "col-md-12 col-xs-6", $studio ?? [], 'mcc') !!}
            {!! field_wrap($errors, "Date Established", "studio[date]", "date", [], "col-md-11 col-xs-12", $studio ?? [], 'date') !!}<i class="far fa-calendar-alt icon-calender"></i>
            {!! field_wrap($errors, "Business Entity", "studio[mcc]", "select", get_mcc_dropdown(), "col-md-12 col-xs-6", $studio ?? [], 'mcc') !!}
            {!! field_wrap($errors, "URL", "studio[url]", "", [], "col-md-12 col-xs-12", $studio ?? [], 'url') !!}
            {!! field_wrap($errors, "Address", "studio[address]", "", [], "col-md-12 col-xs-12", $studio ?? [], 'address') !!}
            {!! field_wrap($errors, "City", "studio[city]", "", [], "col-md-12 col-xs-12", $studio ?? [], 'city') !!}
            {!! field_wrap($errors, "State", "studio[state]", "select", config('state'), "col-md-12 col-xs-6", $studio ?? [], 'state') !!}
            {!! field_wrap($errors, "Zip", "studio[zip]", "", [], "col-md-12 col-xs-6", $studio ?? [], 'zip') !!}
            {!! field_wrap($errors, "Email Address", "studio[email]", "email", [], "col-md-12 col-xs-12", $studio ?? [], 'email') !!}
            {!! field_wrap($errors, "Tax ID", "studio[tax]", "tax", [], "col-md-12 col-xs-12", $studio ?? [], 'tax_id') !!}
            {!! field_wrap($errors, "Phone", "studio[phone]", "phone", [], "col-md-12 col-xs-12", $studio ?? [], 'phone') !!}
            {!! field_wrap($errors, "Description", "studio[description]", "", [], "col-md-12 col-xs-12", $studio ?? [], 'description') !!}
            <div class="col-md-12 col-xs-12 set-col">
                <div class="row vertical-gap sm-gap">
            <div class="col-md-12 col-xs-12 display-4" style="margin-bottom: 0px;">
                Owner Information
            </div>
            <input type="hidden" name="owner[country]" value="US" />
            {!! field_wrap($errors, "First Name", "owner[firstName]", "", [], "col-md-12 col-xs-12", $member ?? [], 'first_name') !!}
            {!! field_wrap($errors, "Last Name", "owner[lastName]", "", [], "col-md-12 col-xs-12", $member ?? [], 'last_name') !!}
            {!! field_wrap($errors, "SSN Last 4", "owner[ssn]", "", [], "col-md-12 col-xs-12", $member ?? [], 'ssn_last_4') !!}
            {!! field_wrap($errors, "Job Title", "owner[title]", "", [], "col-md-12 col-xs-12", $member ?? [], 'title') !!}
            {!! field_wrap($errors, "Email Address", "owner[email]", "email", [], "col-md-12 col-xs-12", $member ?? [], 'email') !!}
            {!! field_wrap($errors, "Phone", "owner[phone]", "phone", [], "col-md-12 col-xs-12", $member ?? [], 'phone') !!}
            {!! field_wrap($errors, "Address", "owner[address]", "", [], "col-md-12 col-xs-12", $member ?? [], 'address') !!}
            {!! field_wrap($errors, "City", "owner[city]", "", [], "col-md-12 col-xs-12", $member ?? [], 'city') !!}
            {!! field_wrap($errors, "State", "owner[state]", "select", config('state'), "col-md-12 col-xs-6", $member ?? [], 'state') !!}
            {!! field_wrap($errors, "Zip", "owner[zip]", "", [], "col-md-12 col-xs-6", $member ?? [], 'zip') !!}
            {!! field_wrap($errors, "Date of Birth", "owner[dob]", "date", [], "col-md-11 col-xs-12", $member ?? [], 'dob') !!}<i class="far fa-calendar-alt icon-calender"></i>
            <div class="col-md-12 col-xs-12 display-4" style="margin-bottom: 18px;margin-top: 17px;">
                Verification Documents
            </div>
            {!! field_wrap($errors, "Front Photo", "owner_front", "file", [], "col-md-12 col-xs-12") !!}
            {!! field_wrap($errors, "Back Photo", "owner_back", "file", [], "col-md-12 col-xs-12") !!}
        </div>
    </div>
            <div class="col-md-12 col-xs-12 display-4" style="margin-bottom: 15px;margin-top: 17px;">
                Bank Information
            </div>
            <div style="width:100%; margin-left:16px; margin-bottom:-30px;">
                <p>Where would your like your money desposited</p>
            </div>

            {!! field_wrap($errors, "Routing Number", "studio[routing]", "", [], "col-md-12 col-xs-12") !!}
            {!! field_wrap($errors, "Account Number", "studio[account]", "", [], "col-md-12 col-xs-12") !!}
            <div class="col-md-12 col-xs-12 display-4" style="margin-bottom: 9px;margin-top: 17px;">
                Verification Documents
            </div>
            {!! field_wrap($errors, "Front Photo", "store_front", "file", [], "col-md-6 col-xs-12") !!}
            {!! field_wrap($errors, "Back Photo", "store_back", "file", [], "col-md-6 col-xs-12") !!} 
        </div>
    </div>
    
    
</div>
