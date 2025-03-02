<?php
/**
*
* @package MoT Failed Logins v2.0.0
* @copyright (c) 2025 Mike-on-Tour
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = [];
}
// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//
$lang = array_merge($lang, [
	'MOT_FL_MSG'			=> [
		1		=> 'There was one failed login attempt since your last visit!',
		2		=> 'There were %1$d failed login attempts since your last visit!',
	],
	'MOT_FL_LOG_FAIL'		=> '<strong>Failed login attempt</strong><br>» Username: %s',
	'MOT_FL_REMOVE_MSG'		=> 'Delete message',
	'MOT_FL_REMOVED'		=> 'The failed login attempts since your your last visit will no longer be displayed.'
]);
