<?php
/**
 *
 * File description
 *
 * @package    Core
 * @subpackage Core
 * @author  John Meng (孟远螓) arzen1013@gmail.com 2009-2-19
 * @version 1.0.0 $id$
 */
class Console_Ui {

	public static $stdin;

	function __construct() {
		;
	}

	/**
	 * Returns stdin file pointer
	 *
	 * @return resource STDIN file pointer
	 */
	private static function getStdin()
	{
		if (!self::$stdin) {
			self::$stdin = fopen('php://stdin', 'r');
		}

		return self::$stdin;
	}

	/**
	 * Pauses execution until enter is pressed
	 */
	public static function pause()
	{

		fgets(self::getStdin(), 8192);
	}


	/**
	 * Asks a boolean style yes/no question. Valid input is:
	 *
	 *  o Yes: 1/y/yes/true
	 *  o No:  0/n/no/false
	 *
	 * @param string $question The string to print. Should be a yes/no
	 *                         question the user can answer. The following
	 *                         will be appended to the question:
	 *                         "[Yes]/No"
	 * @param bool   $default  The default answer if only enter is pressed.
	 */
	public static function confirm($question, $default = null)
	{
		if (!is_null($default)) {
			$defaultStr = $default ? '[Yes]/No' : 'Yes/[No]';
		} else {
			$defaultStr = 'Yes/No';
		}

		$fp = self::getStdin();

		while (true) {
			echo $question, " ", $defaultStr, ": ";
			$response = trim(fgets($fp, 8192));

			if (!is_null($default) AND $response == '') {
				return $default;
			}

			switch (strtolower($response)) {
				case 'y':
				case '1':
				case 'yes':
				case 'true':
					return true;

				case 'n':
				case '0':
				case 'no':
				case 'false':
					return false;

				default:
					continue;
			}
		}
	}


	/**
	 * Clears the screen. Specific to Linux (and possibly bash too)
	 */
	public static function clearScreen()
	{
		echo chr(033), "cm";
	}


	/**
	 * Returns a line of input from the screen with the corresponding
	 * LF character appended (if appropriate).
	 *
	 * @param int $buffer Line buffer. Defaults to 8192
	 */
	public static function getInput($buffer = 8192)
	{
		return fgets(self::getStdin(), $buffer);
	}


	/**
	 * Shows a console menu
	 *
	 * @param array $items The menu items. Should be a two dimensional array. 2nd
	 *                     dimensional should be associative containing the following
	 *                     keys:
	 *                      o identifier - The key/combo the user should enter to activate
	 *                                     this menu. Usually a single character or number.
	 *                                     This is lower cased when used for comparison, so
	 *                                     mixing upper/lower case identifiers will not work.
	 *                      o text       - The description associated with this menu item.
	 *                      o callback   - Optional. If specified this callback is called
	 *                                     using call_user_func(). If not specified then the
	 *                                     identifier is returned instead, (after the callback
	 *                                     has run the identifier is returned also). The callback
	 *                                     is given one argument, which is the identifier of the
	 *                                     menu item.
	 * @param bool  $clear Whether to clear the screen before printing the menu.
	 *                     Defaults to false.
	 */
	public static function showMenu($items, $clear = false)
	{
		// Find the longest identifier
		$max_length = 0;
		foreach ($items as $k => $v) {
			$identifiers[strtolower($v['identifier'])] = $k;
			$max_length  = max(strlen($v['identifier']), $max_length);
		}

		while (true) {
			if ($clear) {
				self::clearScreen();
			}

			echo "Please select one of the following options:\n\n";

			// Print the menu
			foreach ($items as $k => $v) {
				echo str_pad($v['identifier'], $max_length, ' ', STR_PAD_LEFT), ") ", $v['text'], "\n";
			}

			echo "\nSelect: ";
			$input = trim(strtolower(self::getInput()));

			// Invalid menu item chosen
			if (!isset($identifiers[$input])) {
				echo "Invalid menu item chosen...\n";
				sleep(1);
				continue;

				// Valid menu item chosen
			} else {
				$item = $items[$identifiers[$input]];
				if (!empty($item['callback']) AND is_callable($item['callback'])) {
					call_user_func($item['callback'], $input);
				}

				return $input;
			}
		}
	}

}