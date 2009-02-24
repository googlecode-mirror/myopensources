<?php
include_once 'Console/Ui.php';
include_once 'Loging/Log.php';
include_once 'Application/Config.php';
include_once 'Database/OracleDriver.php';
include_once 'Database/MysqlDriver.php';

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
	private $logger;
	
	private function __construct() {
		
	}
	
	public static function getInstance() {
		if ( empty(self::$instances) ) {
			self::$instances = new Application_Controller();
		}
		return self::$instances;
	}
	
	public function main() {
		$this->initLog();
		
	    /**
	    * Main loop of program show the menu
	    */
	    while (true) {
	        Console_Ui::clearScreen();
	    	$this->welcome();
	        $id = Console_Ui::showMenu( $this->mainMenu() );
	        
	        if (in_array(strtolower($id), array( '7', 'q') ) ) {
	            exit;
	        }
	    }
	}
	
	private function welcome() {
		Console_Ui::hr(true);
        Console_Ui::message("  ** Wellcome to database migration tool **  ");
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
		
		$this->fetchServers("doMoveStruct");
		
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
	
	private function fetchServers($callback="") {
		$connections = Application_Config::getInstance()->getConnections();
		if (is_array($connections)) {
			foreach ($connections as $name=>$item){
				if ($name) {
					$mesg = "Migrate schema {$name}, please wait... ";
					echo $mesg . "\n";
					$this->logger->log($mesg);
					$source = $item['source'];
					$target = $item['target'];
					call_user_func(array(self::$instances, $callback), $source, $target);
					Console_Ui::message("\nWill do the next, please press enter to continue... [Enter]");
					Console_Ui::pause();
				}
				
			}
		}
		
	}
	
	private function doMoveStruct($source, $target) {
		Console_Ui::clearScreen();
		echo "Migrate struct only\n";
		$source_obj = $this->getDriver($source);
		$target_obj = $this->getDriver($target);
		
		$src_tables = $source_obj->getTables();
		
		if ( count($src_tables) > 0 ) {
			foreach ($src_tables as $table_name) {
				
				$mesg = "Create {$table_name} table, wait...";
				if ( $target_obj->execMulti( $source_obj->toMysqlScript( $table_name ) ) ) {
					$mesg .= "[Done]";
				}
				else 
					$mesg .= "[*False]";
				echo $mesg . "\n";
				$this->logger->log($mesg);
				
			}
			
		}
		$target_tables = $target_obj->getTables();
		
		if ( ($src_total = count($src_tables)) != ($target_total = count($target_tables)) ) {
			$lost_tables = array_diff($src_tables, $target_tables);
			$mesg = "Source tables total: {$src_total} ";
			Console_Ui::message("\n{$mesg}\n");
			$this->logger->log($mesg);
			
			$mesg = "Target tables total: {$target_total} ";
			Console_Ui::message("\n{$mesg}\n");
			$this->logger->log($mesg);
			
			$mesg = "Lost some tables:\n". implode(",", $lost_tables );
			Console_Ui::message("\n{$mesg}\n");
			$this->logger->log($mesg);
			
		}else{
			$mesg = "~~~~ Congratulation, all tables done. ~~~~";
			Console_Ui::message("\n{$mesg}\n");
			$this->logger->log($mesg);
		}
		
//		$create_sql = $source_obj->toMysqlScript('FUNCTIONS');
//		print $create_sql;
//		print_r($src_tables);
//		print_r($target);
	}
	
	private function getDriver($db_config) {
		$connect_type = strtolower( $db_config['type'] );
		if (empty($connect_type)) {
			return false;
		}
		$instance = null;
		switch ($connect_type){
			case 'oracle':
				$instance = new Database_OracleDriver($db_config);
				break;
			case 'mysql':
				$instance = new Database_MysqlDriver($db_config);
				break;
				
		}
		return $instance;
		
	}
	
	private function initLog() {
		$conf = array('mode' => 0600, 'timeFormat' => '%X %x');
		$output_folder = dirname( dirname(__FILE__) ) .DIRECTORY_SEPARATOR.'output';
		if (!file_exists($output_folder)) {
			mkdir($output_folder, 0755);
		}
		
		$this->logger = Loging_Log::singleton('file', $output_folder.DIRECTORY_SEPARATOR.date("Y_m_d_").'database_migration.log', "\t", $conf);
	}
	
	
	
}