<?php
//
// +----------------------------------------------------------------------+
// | PHP version 4.0                                                      |
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2001 The PHP Group                                |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the PHP license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available at through the world-wide-web at                           |
// | http://www.php.net/license/2_02.txt.                                 |
// | If you did not receive a copy of the PHP license and are unable to   |
// | obtain it through the world-wide-web, please send a note to          |
// | license@php.net so we can mail you a copy immediately.               |
// +----------------------------------------------------------------------+
// | Authors: Martin Jansen <mj@php.net>                                  |
// |          Guido Haeger <gh-lists@ecora.de>                            |
// +----------------------------------------------------------------------+
//
// $Id:

/**
* Class to validate the syntax of IPv4 adresses
*
* Usage:
*   <?php
*     require_once "Net_CheckIP/CheckIP.php";
*     
*     if (Net_CheckIP::check_ip("your_ip_goes_here")) {
*         // Syntax of the IP is ok
*     }
*   ?>
*
* @author  Martin Jansen <mj@php.net>
* @author  Guido Haeger <gh-lists@ecora.de>
* @package Net_CheckIP
* @version 1.0
* @access  public
*/
class Net_CheckIP
{

    /**
    * Validate the syntax of the given IP adress
    *
    * This function splits the IP adress in 4 pieces
    * (separated by ".") and checks for each piece
    * if it's and integer value between 0 and 255.
    * If all 4 parameters pass this test, the function
    * returns true.
    *
    * @param  string IP adress
    * @return bool true if syntax is valid, otherwise false
    */
    function check_ip($ip)
    {
		  
        $count = 0;
        
        $x = explode(".", $ip);
        $max = count($x);
        
        for ($i = 0; $i < $max; $i++) {
            if ($x[$i] >= 0 && $x[$i] <= 255 && preg_match("/^\d{1,3}$/", $x[$i])) {
                $count++;
            }
        }
                              
        if ($count == 4 && $max == 4) {
            return true;
        } else {
            return false;
        }       
    }
}
?>
