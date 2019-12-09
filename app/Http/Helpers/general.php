<?php

/**
 * If form is submitted uses POST while uses Array data if not submitted
 *
 * @param array $data An array pointer with required data
 * @param array $input Posted data
 * @param string $key
 *
 * @return string
 *
 */
function input_array_empty($key, $input)
{
    return (isset($_POST[$input]) != '' ? $_POST[$input] : $key);
}

/**
 * Form date
 */
function format_date($date)
{
    return date('m/d/Y h:i:s', strtotime($date));
}

/**
 * Form date
 */
function format_date_natural($date, $isDateOnly = true)
{
    return date('F d, Y' . ($isDateOnly == true ? ' h:i' : ''), strtotime($date));
}

/**
 * Current User
 */
function curret_user()
{
    return session('id');
}

function unload_message_login($errors)
{
    if (strlen(session("status")) > 5) {
        $messages = "
                <div class=\"m-alert m-alert--icon m-alert--air m-alert--square alert alert-success alert-dismissible show\" role=\"alert\">
                    <div class=\"m-alert__text\">
                        <strong>Success</strong><br />";
        $messages .= "<ul style='list-style-type:none;padding:0;margin:0'>";
        $messages .= "<li style='list-style-type:none;padding:0;margin:0'>" . session("status") . "</li>";
        $messages .= "</ul>";
        $messages .= "
                    </div>
                    <div class=\"m-alert__close\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"></button>
                    </div>
                </div>";
        return $messages;
    }
}

/**
 * take messages from different sources and unload to print
 *
 * @return string
 */
function unload_messages()
{
    if (session('success') !== null) {
        return '<div class="alert alert-success" role="alert">' . session('success') . '</div>';
    } else if (session('error') !== null) {
        return '<div class="alert alert-danger" role="alert">' . session('error') . '</div>';
    } else if (session('resent') !== null) {
        return '<div class="alert alert-success" role="alert">A fresh verification link has been sent to your email address.</div>';
    } else if (session('status') !== null) {
        return '<div class="alert alert-success" role="alert">' . session('status') . '</div>';
    } else if (session('showVerificationErrors') !== null) {
        return '<div class="alert alert-danger" role="alert"><div class="display-4">Your Account is Limited</div>' . implode('<br />', session('showVerificationErrors')['messages']) . '<br /><br /><a href="' . route('studio.get') . '" class="btn btn-brand text-center">Update Studio Information</a> <a href="' . create_support_mailto('Verification Steps Required [' . session('showVerificationErrors')['id'] . ']', implode("%20%0A", session('showVerificationErrors')['messages'])) . '" class="btn btn-primary text-center">Contact Support</a></div>';
    }
}

function unload_toast()
{
    return '<div class="toast rui-toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="8000" data-toast-show-on-startup="true">
    <div class="toast-header">
        <h5 class="mr-auto mnb-2">RootUI</h5>
        <small class="toast-date">15 minutes ago</small>
        <button type="button" class="ml-15 mnt-4 mnr-4 toast-close close" data-dismiss="toast" aria-label="Close">
            <span data-feather="x" class="rui-icon rui-icon-stroke-1_5"></span>
        </button>
    </div>
    <div class="toast-body">
        Hey, this is a demo notice. Click on the close button if you don\'t want to see it again.
    </div>
</div>';
}

function render_message($info)
{
    if (isset($info["status"])) {
        $messages = "
                <div class=\"m-alert m-alert--icon m-alert--air m-alert--square alert alert-" . ($info["status"] == "error" ? "danger" : $info["status"]) . " alert-dismissible show\" role=\"alert\">
                    <div class=\"m-alert__icon\">
                        <i class=\"la la-" . ($info["status"] == "error" ? "warning" : "check") . "\"></i>
                    </div>
                    <div class=\"m-alert__text\">
                        <strong>" . ($info["status"] == "error" ? "Error" : "Success") . "</strong><br />";
        // if more than one message is sent
        if (is_array($info["message"])) {
            $messages .= "<ul>";
            foreach ($info["message"] as $message) {
                $messages .= "<li>" . $message . "</li>";
            }

            $messages .= "</ul>";
        } else {
            $messages .= $info["message"];
        }

        $messages .= "
                    </div>
                    <div class=\"m-alert__close\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"></button>
                    </div>
                </div>";

        return $messages;
    }
}

/**
 * Package Names
 */
function site_membership_features()
{
    return [
        "Active Campaigns",
        "Push Notifications",
        "Supports Beacons",
        "Support Competitor Locations",
        "Additional Push Notifications (blocks of 100,000/mo)",
    ];
}

function site_membership($selected = "")
{
    $data = [
        "Starter" => [
            "price" => 0,
            "brainTree" => "starter",
            "features" => [
                "Active Campaigns" => "5",
                "Push Notifications" => "500",
                "Supports Beacons" => "<i class=\"ti-close text-danger\"></i>",
                "Support Competitor Locations" => "<i class=\"ti-close text-danger\"></i>",
                "Additional Push Notifications (blocks of 100,000/mo)" => "<i class=\"ti-close text-danger\"></i>",
            ],
        ],
        "Standard" => [
            "price" => 49.00,
            "brainTree" => "standard",
            "features" => [
                "Active Campaigns" => "Unlimited",
                "Push Notifications" => "40,000",
                "Supports Beacons" => "Up to 5",
                "Support Competitor Locations" => "<i class=\"ti-check text-success\"></i>",
                "Additional Push Notifications (blocks of 100,000/mo)" => "<i class=\"ti-close text-danger\"></i>",
            ],
        ],
        "Plus" => [
            "price" => 99.00,
            "brainTree" => "plus",
            "features" => [
                "Active Campaigns" => "Unlimited",
                "Push Notifications" => "100,000",
                "Supports Beacons" => "Up to 10",
                "Support Competitor Locations" => "<i class=\"ti-check text-success\"></i>",
                "Additional Push Notifications (blocks of 100,000/mo)" => "<i class=\"ti-close text-danger\"></i>",
            ],
        ],
        "Premium" => [
            "price" => 189.00,
            "brainTree" => "premium",
            "features" => [
                "Active Campaigns" => "Unlimited",
                "Push Notifications" => "200,000",
                "Supports Beacons" => "Up to 25",
                "Support Competitor Locations" => "<i class=\"ti-check text-success\"></i>",
                "Additional Push Notifications (blocks of 100,000/mo)" => "$25",
            ],
        ],
    ];

    return $selected == "" ? $data : $data[$selected];
}

function site_membership_features_numeric($selected = "")
{
    $data = [
        "Starter" => [
            "campaigns" => 5,
            "push_notifications" => 500,
            "beacons" => 0,
            "competitors" => 0,
            "push_notification_addons" => 0,
            "per_beacon" => 20,
        ],
        "Standard" => [
            "campaigns" => -1,
            "push_notifications" => 40000,
            "beacons" => 5,
            "competitors" => 1,
            "push_notification_addons" => 0,
            "per_beacon" => 20,
        ],
        "Plus" => [
            "campaigns" => -1,
            "push_notifications" => 100000,
            "beacons" => 10,
            "competitors" => 1,
            "push_notification_addons" => 0,
            "per_beacon" => 20,
        ],
        "Premium" => [
            "campaigns" => -1,
            "push_notifications" => 200000,
            "beacons" => 25,
            "competitors" => 1,
            "push_notification_addons" => 25,
            "per_beacon" => 20,
        ],
    ];

    return $selected == "" ? $data : $data[$selected];
}

/**
 * Generate a CURL get call
 *
 * @param $url
 *
 * @return mixed
 *
 * @since   2014-04-03
 * @author  Rizwan Ali <riz@bitspro.com>
 */
function get_curl($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_REFERER, env("APP_URL"));
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    //var_dump($output);
    //echo curl_error($ch);
    curl_close($ch);
    return $output;
}

function get_geocode($query)
{
    return json_decode(get_curl('https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($query) . '&key=AIzaSyCbx631D675y4g-0uEnHBpEq6UNS3KJhis'), true);
}

/**
 * If form is submitted uses POST while uses Array data if not submitted
 *
 * @param array $data An array pointer with required data
 * @param array $input Posted data
 * @param string $key
 *
 * @return string
 *
 */
function fetch_from_data(array $data, $key, $input = "")
{
    // if we dont have to check the POST data then
    if ($key == "") {
        return (isset($data[$key]) && $data[$key] != null ? $data[$key] : "");
    } else {
        return ((isset($_POST[$input]) != "" ? $_POST[$input] : (isset($data[$key]) && $data[$key] != null ? $data[$key] : "")));
    }
}

/**
 * If form is submitted uses POST while uses Array data if not submitted
 *
 * @param array $data An array pointer with required data
 * @param array $input Posted data
 * @param string $key
 *
 * @return string
 *
 */
function fetch_from_date_data(array $data, $key, $input = "")
{
    // if we dont have to check the POST data then
    if ($key == "") {
        return isset($data[$key]) && $data[$key] != null ? date("m/d/Y", $data[$key]) : "";
    } else {
        return (isset($_POST[$input]) != "" ? $_POST[$input] : (isset($data[$key]) && $data[$key] != null ? date("m/d/Y", $data[$key]) : ""));
    }
}

function nice_number($n)
{
    // first strip any formatting;
    $n = (0 + str_replace(",", "", $n));

    // is this a number?
    if (!is_numeric($n)) {
        return false;
    }

    // now filter it;
    if ($n > 1000000000000) {
        return round(($n / 1000000000000), 2) . ' Tril';
    } elseif ($n > 1000000000) {
        return round(($n / 1000000000), 2) . ' Bil';
    } elseif ($n > 1000000) {
        return round(($n / 1000000), 2) . ' Mil';
    } elseif ($n > 1000) {
        return round(($n / 1000), 2) . ' K';
    }

    return number_format($n, 2);
}

function get_states()
{
    return array(
        'AL' => 'ALABAMA',
        'AK' => 'ALASKA',
        'AS' => 'AMERICAN SAMOA',
        'AZ' => 'ARIZONA',
        'AR' => 'ARKANSAS',
        'CA' => 'CALIFORNIA',
        'CO' => 'COLORADO',
        'CT' => 'CONNECTICUT',
        'DE' => 'DELAWARE',
        'DC' => 'DISTRICT OF COLUMBIA',
        'FM' => 'FEDERATED STATES OF MICRONESIA',
        'FL' => 'FLORIDA',
        'GA' => 'GEORGIA',
        'GU' => 'GUAM GU',
        'HI' => 'HAWAII',
        'ID' => 'IDAHO',
        'IL' => 'ILLINOIS',
        'IN' => 'INDIANA',
        'IA' => 'IOWA',
        'KS' => 'KANSAS',
        'KY' => 'KENTUCKY',
        'LA' => 'LOUISIANA',
        'ME' => 'MAINE',
        'MH' => 'MARSHALL ISLANDS',
        'MD' => 'MARYLAND',
        'MA' => 'MASSACHUSETTS',
        'MI' => 'MICHIGAN',
        'MN' => 'MINNESOTA',
        'MS' => 'MISSISSIPPI',
        'MO' => 'MISSOURI',
        'MT' => 'MONTANA',
        'NE' => 'NEBRASKA',
        'NV' => 'NEVADA',
        'NH' => 'NEW HAMPSHIRE',
        'NJ' => 'NEW JERSEY',
        'NM' => 'NEW MEXICO',
        'NY' => 'NEW YORK',
        'NC' => 'NORTH CAROLINA',
        'ND' => 'NORTH DAKOTA',
        'MP' => 'NORTHERN MARIANA ISLANDS',
        'OH' => 'OHIO',
        'OK' => 'OKLAHOMA',
        'OR' => 'OREGON',
        'PW' => 'PALAU',
        'PA' => 'PENNSYLVANIA',
        'PR' => 'PUERTO RICO',
        'RI' => 'RHODE ISLAND',
        'SC' => 'SOUTH CAROLINA',
        'SD' => 'SOUTH DAKOTA',
        'TN' => 'TENNESSEE',
        'TX' => 'TEXAS',
        'UT' => 'UTAH',
        'VT' => 'VERMONT',
        'VI' => 'VIRGIN ISLANDS',
        'VA' => 'VIRGINIA',
        'WA' => 'WASHINGTON',
        'WV' => 'WEST VIRGINIA',
        'WI' => 'WISCONSIN',
        'WY' => 'WYOMING',
        'AE' => 'ARMED FORCES AFRICA \ CANADA \ EUROPE \ MIDDLE EAST',
        'AA' => 'ARMED FORCES AMERICA (EXCEPT CANADA)',
        'AP' => 'ARMED FORCES PACIFIC',
    );
}

function sentry_hash($string)
{
    // Usually caused by an old PHP environment, see
    // https://github.com/cartalyst/sentry/issues/98#issuecomment-12974603
    // and https://github.com/ircmaxell/password_compat/issues/10
    if (!function_exists('password_hash')) {
        throw new \RuntimeException('The function password_hash() does not exist, your PHP environment is probably incompatible. Try running [vendor/ircmaxell/password-compat/version-test.php] to check compatibility or use an alternative hashing strategy.');
    }

    if (($hash = password_hash($string, PASSWORD_DEFAULT)) === false) {
        throw new \RuntimeException('Error generating hash from string, your PHP environment is probably incompatible. Try running [vendor/ircmaxell/password-compat/version-test.php] to check compatibility or use an alternative hashing strategy.');
    }

    return $hash;
}

function generate_code()
{
    $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $res = "";
    for ($i = 0; $i < 10; $i++) {
        $res .= $chars[mt_rand(0, strlen($chars) - 1)];
    }
    return $res;
}

function apply_discount($amount, $percent)
{
    $percent = $percent == "" ? 0 : $percent;
    return $amount - ($amount * ($percent / 100));
}

function total_discount($amount, $percent)
{
    $percent = $percent == "" ? 0 : $percent;
    return ($amount * ($percent / 100));
}

function get_sub_array($array, $field)
{
    if (isset($array[$field])) {
        return $array[$field];
    }
    return [];
}

function get_status($value, $type)
{
    $statusList = [
        "campaign" => [
            "u" => ["color" => "info", "title" => "Starts On"],
            "a" => ["color" => "success", "title" => "Ends On"],
            "e" => ["color" => "danger", "title" => "Ended On"],
        ],
    ];

    return $statusList[$type][$value];
}

function field_wrap($errors, $label, $name, $type = "", $options = [], $class = "col-4", $data = null, $dataName = null)
{

    $tmp = [
        "class" => "form-control m-input ",
    ];

    $value = isset($data[$dataName]) ? $data[$dataName] : old($name);

    if ($type == "select") {
        $options = $options;
        $input = Form::select($name, $options, $value, $tmp);
    } else if ($type == "textarea") {
        $input = Form::textarea($name, $value, $tmp);
    } else if ($type == "wysiwyg") {
        $tmp["class"] = "summernote";
        $input = Form::textarea($name, $value, $tmp);
    } else if ($type == "daterange") {
        $tmp["class"] .= "daterange-picker";
        $input = Form::text($name, $value, $tmp);
    } else if ($type == "date") {
        $input = Form::date($name, $value, $tmp);
    } else if ($type == "password") {
        $input = Form::password($name, $tmp);
    } else if ($type == "file") {
        $input = Form::file($name, $tmp);
    } else if ($type == "phone") {
        $tmp['data-inputmask'] = "'mask': '(999) 999-9999'";
        $input = Form::text($name, $value, $tmp);
    } else if ($type == "time") {
        $tmp['data-inputmask'] = "'mask': '99:99'";
        $input = Form::text($name, $value, $tmp);
    } else if ($type == "tax") {
        $tmp['data-inputmask'] = "'mask': '999-99-9999'";
        $input = Form::text($name, $value, $tmp);
    } else {
        $input = Form::text($name, $value, $tmp);
    }

    $errorName = $name;
    if (strpos($name, '[') >= 0) {
        $errorName = str_replace(']', '', str_replace('[', '.', $name));
    }

    return '
    <div class="' . $class . ($errors->has($errorName) ? " has-danger" : "") . '">
        ' . ($label != '' ? '<label class="form-control-label">' . $label . '</label>' : '') .
    $input . '
        <div class="form-control-feedback">' . str_replace('.', ' ', $errors->first($errorName)) . '</div>
    </div>';
}

function field_wrap_edit($data, $dataName, $errors, $label, $name, $type = "", $options = [], $class = "col-lg-4")
{

    $tmp = [
        "class" => "form-control m-input ",
    ];

    $value = isset($data[$dataName]) ? $data[$dataName] : old($name);

    if ($type == "select") {
        $options = $options;
        $input = Form::select($name, $options, $value, $tmp);
    } else if ($type == "textarea") {
        $input = Form::textarea($name, $value, $tmp);
    } else if ($type == "daterange") {
        $names = explode("-", $dataName);
        if (count($names) > 0) {
            if (isset($data[$names[0]])) {
                $value = date("m/d/Y", strtotime($data[$names[0]])) . " - " . date("m/d/Y", strtotime($data[$names[1]]));
            }
        }
        $tmp["class"] .= "daterange-picker";
        $input = Form::text($name, $value, $tmp);
    } else if ($type == "vue") {
        $input = $label;
    } else {
        $input = Form::text($name, $value, $tmp);
    }

    return '

    <div class="form-group ' . $class . ($errors->has($name) ? " has-danger" : "") . '">
        ' .
    $input . '
        <div class="form-control-feedback">' . $errors->first($name) . '</div>
    </div>';
}

function field_wrap_no_label($errors, $label, $name, $type = "", $options = [], $class = "col-lg-4", $vmodel = "")
{
    $tmp = [
        "class" => " form-control m-input input-text c-square c-theme",
        "placeholder" => $label,
    ];
    if ($vmodel != "") {
        $tmp["v-model"] = $vmodel;
    }

    if ($type == "select") {
        $options = array_merge(["" => "Select an option"], $options);
        $input = Form::select($name, $options, old($name), $tmp);
    } else if ($type == "textarea") {
        $input = Form::textarea($name, old($name), $tmp);
    } else if ($type == "daterange") {
        $input = Form::text($name, old($name), $tmp);
    } else {
        $input = Form::text($name, old($name), $tmp);
    }

    return '
    <div class="' . $class . ' ' . ($errors->has($name) ? "has-danger" : "") . '">' . $input . '<div class="help-block form-control-feedback">' . $errors->first($name) . '</div></div>';
}

define('ROO_EXPOSURE_IMPRESSIONS', 'i');
define('ROO_EXPOSURE_CLICKS', 'c');
define('ROO_EXPOSURE_REDEEMEDS', 'r');
define('ROO_EXPOSURE_SHAREDS', 's');
define('ROO_EXPOSURE_FAVORITES', 'f');
define('ROO_EXPOSURE_NOTIFICATIONS', 'p');

define('ROO_MEDIA_TYPE_IMAGE', 'i');
define('ROO_MEDIA_TYPE_VIDEO', 'v');

define('ROO_CAMPAIGN_UPCOMING', "u");
define('ROO_CAMPAIGN_ACTIVE', "a");
define('ROO_CAMPAIGN_ENDED', "e");

define('ROO_LOCATION_GEOFENCE', "g");
define('ROO_LOCATION_BEACON', "b");

define('ROO_LOCATION_ACTIVATED', "a");
define('ROO_LOCATION_PURCHASED', "p");
define('ROO_LOCATION_DELIVERED', "d");
define('ROO_LOCATION_INACTIVE', "i");

define('ROO_ORDER_ACTIVATED', "a");
define('ROO_ORDER_CREATED', "c");
define('ROO_ORDER_PURCHASED', "p");
define('ROO_ORDER_DELIVERED', "d");
define('ROO_ORDER_INACTIVE', "i");

define('ROO_AGENCY_ACCEPTED', "a");
define('ROO_AGENCY_REJECTED', "r");
define('ROO_AGENCY_PENDING', "p");

define('ROO_AGENCY_MAIL_PENDING', "p");
define('ROO_AGENCY_MAIL_SEND', "s");

define('ROO_BILL_PENDING', "p");
define('ROO_BILL_INVOICED', "i");
define('ROO_BILLL_PAID', "c");

define('ROO_UNEXPECTED_ERROR', -1);
define('ROO_NOT_FOUND', 0);
define('ROO_FOUND', 0);
define('ROO_SUCCESS', 1);
define('ROO_INVALID_USER', -2);

// Advertiser
define('ROO_USER_SINGLE', 's');
// Reseller with multiple clients
define('ROO_USER_RESELLER', 'r');
// Partner with multiple brands
define('ROO_USER_AGENCEY', 'a');

define('ROO_CLIENT_STATUS_INVITED', 'i');
define('ROO_CLIENT_STATUS_ACCEPTED', 'a');
define('ROO_CLIENT_STATUS_REJECTED', 'r');

define('ROO_NOT_FOUND_OBJECT', []);

define('ROO_FREE_PLAN', 'Starter');
define('ROO_RESELLER_STARTER_PLAN', 'Starter');
define('ROO_AGENCY_STARTER_PLAN', 'Starter');

function campaign_exposure_types($type, $isReverse = false)
{
    $exposure = [
        "Impressions" => "i",
        "Clicks" => "c",
        "Redeemeds" => "r",
        "Shareds" => "s",
        "Favorites" => "f",
        "Push Notifications" => "p",
    ];

    $exposure_reverse = [
        "i" => "Impressions",
        "c" => "Clicks",
        "r" => "Redeemeds",
        "s" => "Shareds",
        "f" => "Favorites",
        "p" => "Push Notifications",
    ];

    if ($isReverse) {
        return $exposure_reverse[$type];
    } else {
        return $exposure[$type];
    }
}

function generate_embed_code($videoUrl, $width, $height)
{

    return '<iframe width="' . $width . '" height="' . $height . '" src="' . generate_embed_url($videoUrl) . '" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
}

function generate_embed_url($videoUrl)
{
    $url = '';
    $splittedUrl = explode("v=", $videoUrl);
    if (count($splittedUrl) > 1) {
        $url = "https://www.youtube.com/embed/" . $splittedUrl[1];
    } else {
        $splittedUrl = explode("/", $videoUrl);
        $url = "https://www.youtube.com/embed/" . $splittedUrl[3];
    }

    return $url;
}

function campaign_photo_or_video($url, $type)
{
    if ($type == ROO_MEDIA_TYPE_VIDEO && $url != "") {
        return '<li>' . generate_embed_code($url, "100%", 240);
    } else {
        return '<li style="background:url(\'' . get_user_logo($url) . '\') no-repeat 50% 50%; background-size:cover;">';
    }
}

function campaign_photo_or_video_single($url, $type)
{
    if ($type == ROO_MEDIA_TYPE_VIDEO && $url != "") {
        return generate_embed_code($url, "100%", 240);
    } else {
        return '<img class="lazy" src="' . get_user_logo($url) . '" />';
    }
}

function no_found_alert($item, $url, $text = "Create")
{
    $text = $text == "Create" ? $text . " " . $item : $text;
    return get_alert("outline", "content.oh-snap", trans("content.no-records-found", ["item" => $item, "url" => $url, "text" => $text]), 'text-center');
}

function get_alert($type = 'outline', $header = '', $message = '', $class = '')
{
    if ($message != '') {
        return '
            <div class="' . $class . ' alert alert-dismissible fade show m-alert m-alert--' . $type . ' alert-' . $type . '" role="alert">
                <strong>' . trans($header) . '</strong>
                ' . $message . '
            </div>';
    }
}

function field_brand($data, $errors, $class = '', $name = 'brand')
{
    $user = auth()->user();
    if (!is_partner($user->type)) {
        return '<input type="hidden" name="' . $name . '" value="' . $user->brands->first()->id . '" v-model="' . $name . '" />';
    } else {
        return field_wrap_edit($data, "brand_id", $errors, "Brand", $name, "select", $user->brands->pluck("name", "id")->all(), $class, $name);
    }
}

function get_prop_value($array, $field)
{
    if (isset($array[$field])) {
        return $array[$field];
    }
    return "";
}

function limitPercentage($limit, $unused)
{
    if ($limit != 0) {
        $expended = $limit - $unused;
        return number_format($limit != -1 ? (($expended / $limit) * 100) : 0, 2);
    } else {
        return "Not allowed";
    }
}

function get_user_logo($path)
{
    if ($path == "" || $path == "undefined" || $path == null) {
        return asset("images/default-logo.png");
    } elseif (strpos($path, "http") !== false) {
        return $path;
    } else {
        return asset("storage/$path");
    }
}

function format_url($string)
{
    $hasHttp = strpos($string, 'http') !== false ? true : false;
    $hasWWW = strpos($string, 'www.') !== false ? true : false;
    $hasCom = strpos($string, '.com') !== false ? true : false;

    if (($hasWWW || $hasCom) && !$hasHttp) {
        return "http://" . $string;
    }

    return $string;
}

function client_status($status)
{
    $statusList = [
        ROO_CLIENT_STATUS_INVITED => "Invitation Pending",
        ROO_CLIENT_STATUS_ACCEPTED => "Invitation Rejected",
        ROO_CLIENT_STATUS_REJECTED => "Accepted",
    ];

    return $statusList[$status];
}

function is_reseller_logged()
{
    return session("reseller") != "" ? true : false;
}

function is_reseller($type)
{
    return $type == ROO_USER_RESELLER ? true : false;
}

function is_advertiser($type)
{
    return $type == ROO_USER_SINGLE ? true : false;
}

function is_partner($type)
{
    return $type == ROO_USER_AGENCEY ? true : false;
}

function get_date_diff($date1, $date2)
{
    return date_diff(date_create($date1), date_create($date2))->format("%a");
}

function get_mcc_dropdown()
{
    $output = [];
    foreach (config('mcc') as $mcc) {
        $output[$mcc['value']] = $mcc['name'];
    }
    return $output;
}

function create_support_mailto($subject, $body)
{
    return 'mailto:support@gymstar.com?subject=' . $subject . '&body=Your Custom Message:%20%0A%20%0A%20%0A%20%0A' . $body;
}

function throw_exception($message)
{
    $error = \Illuminate\Validation\ValidationException::withMessages([
        'message' => $message,
    ]);
    throw $error;
}
