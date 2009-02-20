<?php
include_once 'Console/Ui.php';

/**
 *
 * Migration tool application controller
 *
 * @package    App
 * @subpackage Controller
 * @author  John Meng (孟远螓) arzen1013@gmail.com 2009-2-20
 * @version 1.0.0 $id$
 */

class Application_Controller {
	
	private static $instances = null;
	
	private function __construct() {
		
	}
	
	public static function getInstance() {
		if ( empty(self::$instances) ) {
			self::$instances = new Application_Controller();
		}
		return self::$instances;
	}
	
	public function main() {
		
	    /**
	    * Main loop of program show the menu
	    */
	    while (true) {
	        Console_Ui::clearScreen();
	    	$this->welcome();
	        $id = Console_Ui::showMenu( $this->mainMenu() );
	        
	        if ($id == '7') {
	            exit;
	        }
	    }
	}
	
	private function welcome() {
		Console_Ui::hr(true);
        Console_Ui::message("  ** Wellcome to EMOME database migration tool **  ");
        Console_Ui::hr(true);
	}
	
	
	private function mainMenu() {
		$items = array();
	    $items[] = array('identifier' => 1, 'text' => 'Migrate database struct only', 'callback' => array(self::$instances, 'moveStruct'));
	    $items[] = array('identifier' => 2, 'text' => 'Migrate data only', 'callback' => array(self::$instances, 'moveData'));
	    $items[] = array('identifier' => 3, 'text' => 'Migrate struct and data', 'callback' => array(self::$instances, 'moveStructAndData'));
	    $items[] = array('identifier' => 4, 'text' => 'Drop all target database tables', 'callback' => array(self::$instances, 'dropTables'));
	    $items[] = array('identifier' => 5, 'text' => 'Clear target tables data', 'callback' => array(self::$instances, 'clearData'));
	    $items[] = array('identifier' => 6, 'text' => 'Optimize target database', 'callback' => array(self::$instances, 'optimizeDatabase'));
	    $items[] = array('identifier' => 7, 'text' => 'Quit');
	    return $items;
	}
	
	public function moveStruct() {
		Console_Ui::message("\nInit database struct, please wait...\n");
		Console_Ui::message("\nPlease press enter to continue... [Enter]");
		Console_Ui::pause();
	}

	public function moveData() {
		Console_Ui::message("\nMigrate data, please wait...\n");
		Console_Ui::message("\nPlease press enter to continue... [Enter]");
		Console_Ui::pause();
	}
	
	public function moveStructAndData() {
		Console_Ui::message("\nMigrate struct and data, please wait...\n");
		Console_Ui::message("\nPlease press enter to continue... [Enter]");
		Console_Ui::pause();
	}

	
	public function dropTables() {
		$question = "Are you sure drop all tables ?";
		if ( Console_Ui::confirm($question, TRUE) ) {
			Console_Ui::message("\nDrop all tables, please wait...\n");
			Console_Ui::message("\nPlease press enter to continue... [Enter]");
			Console_Ui::pause();
		}
	}
	
	public function clearData() {
		$question = "Are you sure clear all data ?";
		if ( Console_Ui::confirm($question, FALSE) ) {
			Console_Ui::message("\nClear all tables data, please wait...\n");
			Console_Ui::message("\nPlease press enter to continue... [Enter]");
			Console_Ui::pause();
		}
	}
	
	public function optimizeDatabase() {
		Console_Ui::message("\nOptimize database, please wait...\n");
		Console_Ui::message("\nPlease press enter to continue... [Enter]");
		Console_Ui::pause();
	}
	
}