<?php
/**
*
* @package MoT Failed Logins v2.1.0
* @copyright (c) 2025 Mike-on-Tour
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace mot\failedlogins\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Event listener
 */
class listener implements EventSubscriberInterface
{
	/** @var \phpbb\db\driver\driver */
	protected $db;

	/** @var \phpbb\log\log */
	protected $log;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user\user */
	protected $user;

	public function __construct(\phpbb\db\driver\driver_interface $db, \phpbb\log\log $log, \phpbb\request\request $request, \phpbb\template\template $template, \phpbb\user $user)
	{
		$this->db = $db;
		$this->log = $log;
		$this->request = $request;
		$this->template = $template;
		$this->user = $user;
	}

	public static function getSubscribedEvents()
	{
		return [
			'core.user_setup'			=> 'load_language_on_setup',
			'core.login_box_failed'		=> 'login_box_failed',
			'core.login_box_redirect'	=> 'login_box_redirect',
			'core.page_footer'			=> 'page_footer',
		];
	}

	/**
	 * Add language on user setup
	 *
	 */
	public function load_language_on_setup(object $event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = array(
			'ext_name' => 'mot/failedlogins',
			'lang_set' => 'mot_fl_common',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}

	/**
	 * If login failed increment the counter
	 *
	 * @param	object	$event	The event object
	 *
	 */
	public function login_box_failed(object $event)
	{
		if ($event['result']['user_row']['user_id'] > 1)
		{
			// Increment counter
			$sql = 'UPDATE ' . USERS_TABLE . '
					SET mot_failed_logins_count = mot_failed_logins_count + 1
					WHERE user_id = ' . (int) $event['result']['user_row']['user_id'];
			$this->db->sql_query($sql);

			// Add to user log
			$this->log->add('user', ANONYMOUS, $this->user->ip, 'MOT_FL_LOG_FAIL', time(), [
				'reportee_id'	=> ANONYMOUS,
				'username'		=> $event['username'],
			]);
		}
	}

	/**
	 * Update failed logins to mot_failed_logins_count_last and clear mot_failed_logins_count on login
	 * NOTE: This event will be triggered with every login, so a message about failed logins will be erased at the next login even if the "Remove message" button has not been activated!!!
	 *
	 */
	public function login_box_redirect()
	{
		$sql = 'UPDATE ' . USERS_TABLE . ' SET mot_failed_logins_count_last = mot_failed_logins_count, mot_failed_logins_count = 0
			WHERE user_id = ' . (int) $this->user->data['user_id'];
		$this->db->sql_query($sql);
	}

	/**
	 * Display message to the user if there were failed login attempts
	 *
	 */
	public function page_footer()
	{
		// clear mot_failed_logins_count_last on user action
		$submit = $this->request->is_set('failedlogins_remove');
		if ($submit)
		{
			if (check_form_key('failedlogins_remove'))
			{
				$sql = 'UPDATE ' . USERS_TABLE . ' SET mot_failed_logins_count_last = 0
					WHERE user_id = ' . (int) $this->user->data['user_id'];
				$this->db->sql_query($sql);
				if ($this->request->is_ajax())
				{
					trigger_error('MOT_FL_REMOVED');
				}
			}
			else
			{
				if ($this->request->is_ajax())
				{
					trigger_error('FORM_INVALID', E_USER_WARNING);
				}
			}
		}

		// Display failed logins
		if ($this->user->data['mot_failed_logins_count_last'])
		{
			add_form_key('failedlogins_remove');
			$this->template->assign_vars([
				'U_REMOVE_MESSAGE'	=> generate_board_url() . '/' . $this->user->page['page'],
				'FAILED_LOGINS'		=> (int) $this->user->data['mot_failed_logins_count_last'],
			]);
		}
	}
}
