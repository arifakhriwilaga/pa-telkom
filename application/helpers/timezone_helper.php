<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if (config_item('app_timezone')) {
    date_default_timezone_set(config_item('app_timezone'));
}
