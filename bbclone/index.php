<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * CVS FILE $Id: index.php,v 1.16 2011/12/30 23:02:10 joku Exp $
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
if(!defined("_BBC_PAGE_NAME")){define("_BBC_PAGE_NAME", "BBClone");}
// Show by default the Global Stats
if (is_readable("show_global.php")) include_once("show_global.php");
?>