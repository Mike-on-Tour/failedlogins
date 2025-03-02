/**
*
* @package MoT Failed Logins v2.0.0
* @copyright (c) 2025 Mike-on-Tour
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

phpbb.addAjaxCallback('failedlogins.remove', function(data) {
	if (!data.S_USER_WARNING && data.S_USER_NOTICE) {
		$('#failedlogins').remove();
	}
});
/*
phpbb.alert('Failed Logins', 'data: ' + JSON.stringify(data));
data: {"MESSAGE_TITLE":"Information","MESSAGE_TEXT":"Die fehlgeschlagenen Logins seit deinem letzten Besuch werden jetzt nicht mehr angezeigt.","S_USER_WARNING":false,"S_USER_NOTICE":true,"REFRESH_DATA":null}
*/
