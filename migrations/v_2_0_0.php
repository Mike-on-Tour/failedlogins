<?php
/**
*
* @package MoT Failed Logins v2.0.0
* @copyright (c) 2025 Mike-on-Tour
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace mot\failedlogins\migrations;

class v_2_0_0 extends \phpbb\db\migration\migration
{
	/**
	* Check for phpBB´s migration v330 (phpBB 3.3.0) to be installed
	*/
	public static function depends_on()
	{
		return ['\phpbb\db\migration\data\v330\v330'];
	}

	/**
	* Check for the existence of one of the columns this ext is inserting into the USERS_TABLE
	*/
	public function effectively_installed()
	{
		return $this->db_tools->sql_column_exists($this->table_prefix . 'users', 'mot_failed_logins_count');
	}

	public function update_schema()
	{
		return [
			'add_columns' => [
				$this->table_prefix . 'users' => [
					'mot_failed_logins_count'		=> ['UINT:2', 0],
					'mot_failed_logins_count_last'	=> ['UINT:2', 0],
				],
			],
		];
	}

	public function revert_schema()
	{
		return [
			'drop_columns' => [
				$this->table_prefix . 'users' => [
					'mot_failed_logins_count',
					'mot_failed_logins_count_last',
				],
			],
		];
	}
}
