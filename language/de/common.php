<?php
/**
*
* @package phpBB Extension - tas2580 failed logins
* @copyright (c) 2014 tas2580
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

if (!defined('IN_PHPBB'))
{
    exit;
}

if (empty($lang) || !is_array($lang))
{
    $lang = array();
}

$lang = array_merge($lang, array(
	'FAILED_LOGINS_COUNT'	=> 'Seit deinem letzten Login gab es %d fehlgeschlagene Loginversuche!',
	'TRY_TO_LOGIN_FAIL'		=> 'Die Anmeldung des Benutzers: <b>%s</b> ist fehlgeschlagen.',
));