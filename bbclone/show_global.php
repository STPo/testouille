<?php
/* This file is part of BBClone (A PHP based Web Counter on Steroids)
 * 
 * CVS FILE $Id: show_global.php,v 1.108 2011/12/30 23:02:10 joku Exp $
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
if(!defined("_BBC_PAGE_NAME")){define("_BBC_PAGE_NAME", "Show Global");}
///////////////////////
// Show Global Stats //
///////////////////////

// START Time Measuring, load-time of the page (see config)
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;

// Read constants
if (is_readable("constants.php")) require_once("constants.php");
else exit("ERROR: Unable to open constants.php");

foreach (array($BBC_CONFIG_FILE, $BBC_LIB_PATH."selectlang.php", $BBC_ACCESS_FILE) as $i) {
  if (is_readable($i)) require_once($i);
  else exit(bbc_msg($i));
}

// Functions to calculate Stats
function bbc_histcalc($array) {
  $result = 0;

  if (is_array($array)) {
    foreach ($array as $val) $result += $val;
  }
  return $result;
}

function bbc_rank_head($cat, $i18n, $flag = 0) {
  global $translation;

  return "<table class=\"centerdata\">\n"
        ."<tr>\n"
        ."<td colspan=\"".(!empty($flag) ? 3 : 4)."\" class=\"label\">".sprintf($translation[$i18n], $cat)."</td>\n"
        ."</tr>\n";
}

function bbc_list_item($icon, $item, $item_score, $total_score) {
  global $BBC_IMAGES_PATH;

  return "<tr>\n"
        .(!empty($icon) ? "<td align=\"left\"><img src=\"".$BBC_IMAGES_PATH.$icon
        ."\" class=\"icon\" alt=\"$item\" title=\"$item\" />&nbsp;&nbsp;</td>\n" : "")
        ."<td align=\"left\">$item&nbsp;</td>\n"
        ."<td align=\"right\">&nbsp;$item_score</td>\n"
        ."<td align=\"right\">&nbsp;".sprintf("%.2f%%", (round(10000 * $item_score / $total_score) / 100))."</td>\n"
        ."</tr>\n";
}

function bbc_rank_sum($cat, $flag = 0) {
  global $translation;

  return "<tr>\n"
        .(!empty($flag) ? "" : "<td>&nbsp;</td>\n")
        ."<td align=\"left\"><b>".$translation['gstat_total']."</b>&nbsp;</td>\n"
        ."<td align=\"right\">&nbsp;<b>$cat</b></td>\n"
        ."</tr></table>\n";
}

function bbc_refgen($ref) {
  global $translation;

  if ($ref == "not_specified") return "<i>".$translation['misc_ignored']."</i>";
  $ref_name = (($slash = strpos($ref, "/")) !== false) ? substr($ref, 0, $slash) : $ref;

  return "<script type=\"text/javascript\">\n"
        ."<!--\n"
        ."document.write('<a href=\"http://$ref\" rel=\"nofollow\" title=\"$ref_name\">$ref_name<\/a>');\n"
        ."-->\n"
        ."</script>\n"
        ."<noscript><span title=\"$ref_name\">$ref_name</span></noscript>\n";
}

function bbc_sort_page_count($page_a, $page_b) {
  if ($page_a['count'] === $page_b['count']) return 0;
  return (($page_a['count'] > $page_b['count']) ? -1 : 1);
}

// Main functions to generate Stats
function bbc_show_browser() {
  global $BBC_IMAGES_PATH, $BBC_LIB_PATH, $BBC_MAXBROWSER, $translation, $access;

  if (is_readable($BBC_LIB_PATH."browser.php")) require($BBC_LIB_PATH."browser.php");
  else return bbc_msg($BBC_LIB_PATH."browser.php");

  $browser_tab = isset($access['stat']['browser']) ? $access['stat']['browser'] : array();

  for ($browser_total = 0; list(, $browser_score) = each($browser_tab); $browser_total += $browser_score);

  arsort($browser_tab);
  reset($browser_tab);

  $str = bbc_rank_head($BBC_MAXBROWSER, "gstat_browsers");

  for ($k = 0; (list($browser_type, $browser_score) = each($browser_tab)) && ($k < $BBC_MAXBROWSER); $k++) {
    if (!isset($browser[$browser_type])) {
      $str.= bbc_list_item("browser/question.png", $browser_type, $browser_score, $browser_total, 'browser');
      continue;
    }

    $browser[$browser_type]['title'] = str_replace("other", $translation['misc_other'], $browser[$browser_type]['title']);

    $str.= bbc_list_item("browser/".$browser[$browser_type]['icon'].".png", $browser[$browser_type]['title'],
                     $browser_score, $browser_total, 'browser');
  }

  $str .= bbc_rank_sum($browser_total);
  return $str;
}

function bbc_show_os() {
  global $BBC_IMAGES_PATH, $BBC_LIB_PATH, $BBC_MAXOS, $translation, $access;

  if (is_readable($BBC_LIB_PATH."os.php")) require($BBC_LIB_PATH."os.php");
  else return bbc_msg($BBC_LIB_PATH."os.php");

  $os_tab = isset($access['stat']['os']) ? $access['stat']['os'] : array();

  for ($os_total = 0; list(, $os_score) = each($os_tab); $os_total += $os_score);

  arsort($os_tab);
  reset($os_tab);

  $str = bbc_rank_head($BBC_MAXOS, "gstat_operating_systems");

  for ($k = 0; (list($os_type, $os_score) = each($os_tab)) && ($k < $BBC_MAXOS); $k++) {
    if (!isset($os[$os_type])) {
      $str.= bbc_list_item("os/question.png", $os_type, $os_score, $os_total, 'os');
      continue;
    }

    $os[$os_type]['title'] = str_replace("other", $translation['misc_other'], $os[$os_type]['title']);

    $str .= bbc_list_item("os/".$os[$os_type]['icon'].".png", $os[$os_type]['title'], $os_score, $os_total, 'os');
  }

  $str .= bbc_rank_sum($os_total);
  return $str;
}

function bbc_show_extension() {
  global $access, $BBC_IMAGES_PATH, $BBC_MAXEXTENSION, $extensions, $translation;

  $ext_tab = isset($access['stat']['ext']) ? $access['stat']['ext'] : array();

  for ($ext_total = 0; list(, $ext_score) = each($ext_tab); $ext_total += $ext_score);

  arsort($ext_tab);
  reset($ext_tab);

  $str = bbc_rank_head($BBC_MAXEXTENSION, "gstat_extensions");

  for ($k = 0; (list($ext, $ext_score) = each($ext_tab)) && ($k < $BBC_MAXEXTENSION); $k++) {
    if (isset($extensions[$ext])) $label = $extensions[$ext];
    else $label = $ext;
    $str .= bbc_list_item("ext/".$ext.".png", $label, $ext_score, $ext_total, 'ext');
  }

  $str .= bbc_rank_sum($ext_total);
  return $str;
}

function bbc_show_robot() {
  global $access, $BBC_IMAGES_PATH, $BBC_LIB_PATH, $BBC_MAXROBOT, $translation;

  if (is_readable($BBC_LIB_PATH."robot.php")) require($BBC_LIB_PATH."robot.php");
  else return bbc_msg($BBC_LIB_PATH."robot.php");

  $robot_tab = isset($access['stat']['robot']) ? $access['stat']['robot'] : array();

  for ($robot_total = 0; list(,$robot_score) = each($robot_tab); $robot_total += $robot_score);

  arsort($robot_tab);
  reset($robot_tab);

  $str = bbc_rank_head($BBC_MAXROBOT, "gstat_robots");

  for ($k = 0; (list($robot_type, $robot_score) = each($robot_tab)) && ($k < $BBC_MAXROBOT); $k++) {
    if (!isset($robot[$robot_type])) {
      $str.= bbc_list_item("robot/robot.png", $robot_type, $robot_score, $robot_total, 'robot');
      continue;
    }

    $str .= bbc_list_item("robot/".$robot[$robot_type]['icon'].".png", $robot[$robot_type]['title'], $robot_score, $robot_total, 'robot');
  }

  $str .= bbc_rank_sum($robot_total);
  return $str;
}

function bbc_show_top_hosts() {
  global $access, $BBC_MAXHOST;

  $host_tab = isset($access['host']) ? $access['host'] : array();

  for ($host_total = 0; list(, $host_score) = each($host_tab); $host_total += $host_score);

  arsort($host_tab);
  reset($host_tab);

  $str = bbc_rank_head($BBC_MAXHOST, "gstat_hosts", 1);

  for ($k = 0; ($k < $BBC_MAXHOST) && (list($host_name, $host_score) = each($host_tab)); $k++) {
    $str .= bbc_list_item("", $host_name, $host_score, $host_total, 'hosts');
  }

  $str .= bbc_rank_sum($host_total, 1);
  return $str;
}

function bbc_show_top_pages() {
  global $BBC_MAXPAGE, $translation, $access;

  $page_tab = isset($access['page']) ? $access['page'] : array();

  for ($page_total = 0; list(, $page_elem) = each($page_tab); $page_total += $page_elem['count']);

  uasort($page_tab, "bbc_sort_page_count");
  reset($page_tab);

  $str = bbc_rank_head($BBC_MAXPAGE, "gstat_pages", 1);

  for ($k = 0; (list($page_name, $page_elem) = each($page_tab)) && ($k < $BBC_MAXPAGE); $k++) {
    $page_name = ($page_name == "index") ? $translation['navbar_main_site'] : $page_name;

    $str .= bbc_list_item("", "<a href=\"".$page_elem['uri']."\">$page_name</a>", $page_elem['count'], $page_total, 'pages');
  }

  $str .= bbc_rank_sum($page_total, 1);
  return $str;
}

function bbc_show_top_origins() {
  global $BBC_MAXORIGIN, $translation, $access;

  $referer_tab = isset($access['referer']) ? $access['referer'] : array();

  for ($referer_total = 0; list(, $referer_score) = each($referer_tab); $referer_total += $referer_score);

  arsort($referer_tab);
  reset($referer_tab);

  $str = bbc_rank_head($BBC_MAXORIGIN, "gstat_origins", 1);

  for ($k = 0; ($k < $BBC_MAXORIGIN) && (list($referer_name, $referer_score) = each($referer_tab)); $k++) {
    $str .= bbc_list_item("", bbc_refgen($referer_name), $referer_score, $referer_total, 'origins');
  }

  $str .= bbc_rank_sum($referer_total, 1);
  return $str;
}

function bbc_show_top_keys() {
  global $BBC_MAXKEY, $translation, $access;

  $key_tab = isset($access['key']) ? $access['key'] : array();

  for ($key_total = 0; list(, $key_score) = each($key_tab); $key_total += $key_score);

  arsort($key_tab);
  reset($key_tab);

  $str = bbc_rank_head($BBC_MAXKEY, "gstat_keys", 1);

  for ($k = 0; ($k < $BBC_MAXKEY) && (list($key_name, $key_score) = each($key_tab)); $k++) {
    $str .= bbc_list_item("", $key_name, $key_score, $key_total, 'keys');
  }

  $str .= bbc_rank_sum($key_total, 1);
  return $str;
}

function bbc_show_access() {
  global $translation, $access;

  return "<table class=\"center\">\n"
        ."<tr>\n"
        ."<td colspan=\"11\" class=\"label\">".$translation['gstat_accesses']."</td></tr>\n"
        ."<tr>\n"
        ."<td align=\"left\">".$translation['tstat_last_year']."&nbsp;&nbsp;</td>\n"
        ."<td align=\"right\">".(!empty($access['time']['month']) ? bbc_histcalc($access['time']['month']) : "0")
        ."</td>\n"
        ."<td>".str_repeat("&nbsp;", 6)."</td>\n"
        ."<td align=\"left\">".$translation['tstat_last_month']."&nbsp;&nbsp;</td>\n"
        ."<td align=\"right\">".((!empty($access['time']['month'])) ? bbc_histcalc($access['time']['day']) : "0")
        ."</td>\n"
        ."<td>".str_repeat("&nbsp;", 6)."</td>\n"
        ."<td align=\"left\">".$translation['tstat_last_week']."&nbsp;&nbsp;</td>\n"
        ."<td align=\"right\">".(!empty($access['time']['wday']) ? bbc_histcalc($access['time']['wday']) : "0")
        ."</td>\n"
        ."<td>".str_repeat("&nbsp;", 6)."</td>\n"
        ."<td align=\"left\">".$translation['tstat_last_day']."&nbsp;&nbsp;</td>\n"
        ."<td align=\"right\">".(!empty($access['time']['wday']) ? bbc_histcalc($access['time']['hour']) : "0")
        ."</td></tr>\n"
        ."<tr>\n"
        ."<td colspan=\"3\">&nbsp;</td>\n"
        ."<td align=\"left\"><b>".$translation['gstat_total_visits']."</b>&nbsp;&nbsp;"."</td>\n"
        ."<td align=\"right\">"
        ."<b>".(!empty($access['stat']['totalvisits']) ? $access['stat']['totalvisits'] : "0")."</b>"
        ."</td>\n"
        ."<td>".str_repeat("&nbsp;", 6)."</td>\n"
        ."<td align=\"left\"><b>".$translation['gstat_total_unique']."</b>&nbsp;&nbsp;</td>\n"
        ."<td align=\"right\">"
        ."<b>".(!empty($access['stat']['totalcount']) ? $access['stat']['totalcount'] : "0")."</b>"
        ."</td>\n"
        ."<td colspan=\"3\">&nbsp;</td>\n"
        ."</tr></table>\n";
}

// Generate page (with use of the functions above)
echo $BBC_HTML->html_begin()
    .$BBC_HTML->topbar()
//  .$BBC_HTML->last_reset()
    ."<table class=\"center\">\n"
    ."<tr><td class=\"padding\">\n"
    ."<table class=\"centerbox\">\n"
    ."<tr>\n"
    ."<td class=\"padding top\">\n"
    .bbc_show_browser()
    ."</td>\n"
    ."<td class=\"padding top\">\n"
    .bbc_show_os()
    ."</td>\n"
    ."<td class=\"padding top\">\n"
    .bbc_show_extension()
    ."</td>\n";

    if (!empty($BBC_IGNORE_BOTS) && ($BBC_IGNORE_BOTS == 2)) {
      echo "</tr></table>\n"
          ."</td>\n";
    }
    else {
      echo "<td class=\"padding top\">\n"
          .bbc_show_robot()
          ."</td></tr></table>\n"
          ."</td>\n";
    }

echo "</tr>\n"
    ."<tr>\n"
    ."<td class=\"padding\">\n"
    ."<table class=\"centerbox\">\n"
    ."<tr>\n"
    ."<td class=\"padding top\">\n"
    .bbc_show_top_hosts()
    ."</td>\n"
    ."<td class=\"padding top\">\n"
    .bbc_show_top_pages()
    ."</td>\n"
    ."<td class=\"padding top\">\n"
    .bbc_show_top_origins()
    ."</td>\n"
    ."<td class=\"padding top\">\n"
    .bbc_show_top_keys()
    ."</td></tr></table>\n"
    ."</td></tr>\n"
    ."<tr>\n"
    ."<td class=\"padding\">\n"
    ."<table class=\"centerbox\">\n"
    ."<tr>\n"
    ."<td class=\"padding\">\n"
    .bbc_show_access()
    ."</td></tr></table>\n"
    ."</td></tr></table>\n"
    .$BBC_HTML->copyright()
    .$BBC_HTML->topbar(0, 1);

// END + DISPLAY Time Measuring, load-time of the page (see config)
global $BBC_LOADTIME;

if (!empty($BBC_LOADTIME)) {
	$time = microtime();
	$time = explode(' ', $time);
	$time = $time[1] + $time[0];
	$finish = $time;
	$total_time = round(($finish - $start), 4);
	echo "<div class=\"loadtime\">".$translation['generated'].$total_time.$translation['seconds']."</div>\n";
}

// End of HTML
echo $BBC_HTML->html_end()
?>
