<?php
/* This file is part of BBClone (A PHP based Web Counter on Steroids)
 * 
 * CVS FILE $$Id: ext_lookup_geoip.php,v 1.11 2011/12/30 23:03:39 joku Exp $$
 *  
 * Copyright (C) 2001-2012, the BBClone Team (see doc/authors.txt for details)
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * See doc/copying.txt for details
 */

/////////////////////////////////////////
// Plug-in: Extension look-up by GeoIP //
/////////////////////////////////////////

function bbc_extension_plugin($host, $addr) {
    global $BBC_GEOIP_PATH, $gi;

    // First of all let's check if the include file exists
    if (!@file_exists($BBC_GEOIP_PATH.'geoip.inc')) {
        bbc_msg('Missing geoip installation');
    }
    include_once($BBC_GEOIP_PATH.'geoip.inc');

    // Bail out if the file exists but does not seem to be geoip
    if (!function_exists('geoip_open')) {
        return "";
    }

if (preg_match('/^.{1,4}:/',$addr)) {
    $gi = geoip_open($BBC_GEOIP_PATH ."GeoIPv6.dat",GEOIP_STANDARD);
    $addr = geoip_country_code_by_addr_v6($gi, $addr);
 } else {
    $gi = geoip_open($BBC_GEOIP_PATH ."GeoIP.dat",GEOIP_STANDARD);
    $addr = geoip_country_code_by_addr($gi, $addr);
 }
    geoip_close($gi);
    return strtolower($addr);
}
?>
