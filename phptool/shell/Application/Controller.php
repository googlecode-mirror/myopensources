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
	        
	        if ( strtolower($id) == 0 ) {
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
	    $items[] = array('identifier' => 3, 'text' => 'Migrate views only', 'callback' => array(self::$instances, 'moveViews'));
	    $items[] = array('identifier' => 4, 'text' => 'Migrate struct and data', 'callback' => array(self::$instances, 'moveStructAndData'));
	    $items[] = array('identifier' => 5, 'text' => 'Drop all target database tables', 'callback' => array(self::$instances, 'dropTables'));
	    $items[] = array('identifier' => 6, 'text' => 'Clear target tables data', 'callback' => array(self::$instances, 'clearData'));
	    $items[] = array('identifier' => 7, 'text' => 'Optimize target database', 'callback' => array(self::$instances, 'optimizeDatabase'));
	    $items[] = array('identifier' => 0, 'text' => 'Quit');
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
		
		$this->fetchServers("doMoveData");
		
		Console_Ui::message("\nPlease press enter to continue... [Enter]");
		Console_Ui::pause();
	}
	
	public function moveViews() {
		Console_Ui::message("\nMigrate views, please wait...\n");
		
		$this->fetchServers("doMoveViews");
		
		Console_Ui::message("\nPlease press enter to continue... [Enter]");
		Console_Ui::pause();
	}
	
	public function moveStructAndData() {
		Console_Ui::message("\nMigrate struct and data, please wait...\n");
		
		$this->fetchServers("doMoveStruct");
//		Console_Ui::message("\nPlease press enter to continue... [Enter]");
//		Console_Ui::pause();
		$this->fetchServers("doMoveViews");
		$this->fetchServers("doMoveData");
		
		Console_Ui::message("\nPlease press enter to continue... [Enter]");
		Console_Ui::pause();
	}

	
	public function dropTables() {
		$question = "Are you sure drop all tables ?";
		if ( Console_Ui::confirm($question, TRUE) ) {
			Console_Ui::message("\nDrop all tables, please wait...\n");
		
			$this->fetchServers("doDropTables");
			
			Console_Ui::message("\nPlease press enter to continue... [Enter]");
			Console_Ui::pause();
		}
	}
	
	public function clearData() {
		$question = "Are you sure clear all data ?";
		if ( Console_Ui::confirm($question, FALSE) ) {
			Console_Ui::message("\nClear all tables data, please wait...\n");
		
			$this->fetchServers("doClearData");
			
			Console_Ui::message("\nPlease press enter to continue... [Enter]");
			Console_Ui::pause();
		}
	}
	
	public function optimizeDatabase() {
		Console_Ui::message("\nOptimize database, please wait...\n");
		Console_Ui::message("\n~~~ TO BE DONE LATER ~~~\n");
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
//					Console_Ui::message("\nPlease press enter to continue... [Enter]");
//					Console_Ui::pause();
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
			$log_flag = FALSE;
			foreach ($src_tables as $table_name) {
				
				$mesg = "Create {$table_name} table, wait...";
				if ( $target_obj->execMulti( $source_obj->toMysqlScript( $table_name ) ) ) {
					$mesg .= "[Done]";
					$log_flag = FALSE;
				}
				else {
					$mesg .= "[Fail]";
					$log_flag = TRUE;
				}
				echo $mesg . "\n";
				if (Application_Config::getInstance()->isLogginSuccess() || $log_flag ) {
					$this->logger->log($mesg);
				}
				
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
		
//		$create_sql = $source_obj->toMysqlScript('MARQUEES');
//		print $create_sql;
	}
	
	private function doMoveData($source, $target) {
		$source_obj = $this->getDriver($source);
		$target_obj = $this->getDriver($target);
		
		$src_tables = $source_obj->getTables();
		$target_tables = $target_obj->getTables();
		
		if ( ($src_total = count($src_tables)) > ($target_total = count($target_tables)) ) {
			// if target tables not equal source tables, then break data moving 
			$lost_tables = array_diff($src_tables, $target_tables);
			$mesg = "~~~ Target & Source tables not match , so skip data moving ~~~ ";
			Console_Ui::message("\n{$mesg}\n");
			$mesg = "Source tables total: {$src_total} ";
			Console_Ui::message("\n{$mesg}\n");
			$mesg = "Target tables total: {$target_total} ";
			Console_Ui::message("\n{$mesg}\n");
			
			$mesg = "Lost some tables:\n". implode(",", $lost_tables );
			Console_Ui::message("\n{$mesg}\n");
			
		}else {
			// do data moving
			foreach ($src_tables as $table_name) {
				$source_obj->moveTableRecords($table_name, $target_obj, $this->logger);
			}
//			$table_name = "USERAGENT_MAP";
//			$source_obj->moveTableRecords($table_name, $target_obj, $this->logger);
			
		}
	}
	
	private function doMoveViews($source, $target) {
		
		$mesg = "~~~~ Will be migrate view to target server ~~~~";
		Console_Ui::message("\n{$mesg}\n");
		$this->logger->log($mesg);
		
		$source_obj = $this->getDriver($source);
		$target_obj = $this->getDriver($target);
		
		$src_views = $source_obj->getViews();
		if (is_array($src_views) && (count($src_views) >  0 ) ) {
			
			$i = 0;
			$success = 0;
			$fail = 0;
			$log_flag = FALSE;
			foreach ($src_views as $view) {
				$view_name = $view['VIEW_NAME'];
				$view_text = $view['TEXT'];
				$mysql_view_sql = sprintf("DROP VIEW IF EXISTS `%s`.`%s`;\nCREATE VIEW `%s`.`%s` AS %s ", $target['db'], $view_name, $target['db'], $view_name, strtoupper($view_text) );
				if ( in_array(strtolower($view_name), array('mobilehsdpa', 'mobile3g', 'mobile2g') ) ) {
					$mesg = "[Skip]:[{$view_name}] view..\n";
					$mesg .= "SQL:\n{$mysql_view_sql}\n";
					$fail +=1;
					echo $mesg . "\n";
					$this->logger->log($mesg);
					continue;
				}
				
				$mesg = "Create {$view_name} view, wait...";
				if ( $target_obj->execMulti( $mysql_view_sql ) ) {
					$mesg .= "[Done]";
					$success +=1;
					$log_flag = FALSE;
				}
				else {
					$mesg .= "[Fail]";
					$fail +=1; 
					$log_flag = TRUE;
				}
				echo $mesg . "\n";
				if (Application_Config::getInstance()->isLogginSuccess() || $log_flag ) {
					$this->logger->log($mesg);
				}
				$i++;
			}
			$mesg = "~~~~ Total: [{$i}]. Success: [{$success}]. Fail: [{$fail}] ~~~~";
			Console_Ui::message("\n{$mesg}\n");
			$this->logger->log($mesg);
			
		}else {
			$mesg = "~~~~ NONE VIEW TO BE MIGRATE ~~~~";
			Console_Ui::message("\n{$mesg}\n");
			$this->logger->log($mesg);
		}
					
	}
	
	
	private function doClearData($source, $target) {
		
		$mesg = "~~~~ Will be clear target server tables data ~~~~";
		Console_Ui::message("\n{$mesg}\n");
		$this->logger->log($mesg);
		
		$target_obj = $this->getDriver($target);
		$target_tables = $target_obj->getTables();
		if (($target_total = count($target_tables)) > 0) {
			
			$i = 0;
			$success = 0;
			$fail = 0;
			
			foreach ($target_tables as $table_name) {
				$result = "";
				if ( $target_obj->truncateTable($table_name) ) {
					$result = "Done";
					$success +=1;
				}else {
					$result = "Fail";
					$fail +=1;
				}
				$mesg = "Clear data for: {$table_name} [{$result}].";
				Console_Ui::message("\n{$mesg}\n");
				$this->logger->log($mesg);
				$i++;
				
			}
			$mesg = "~~~~ Total: [{$i}]. Success: [{$success}]. Fail: [{$fail}] ~~~~";
			Console_Ui::message("\n{$mesg}\n");
			$this->logger->log($mesg);
			
		}else {
			$mesg = "~~~~ NONE TABLE NEED TO BE CLEAR ~~~~";
			Console_Ui::message("\n{$mesg}\n");
			$this->logger->log($mesg);
		}
		
	}
	
	private function doDropTables($source, $target) {
		$mesg = "~~~~ Will be drop target server tables ~~~~";
		Console_Ui::message("\n{$mesg}\n");
		$this->logger->log($mesg);
		
		$target_obj = $this->getDriver($target);
		$target_tables = $target_obj->getTables();
		$target_views = $target_obj->getViews();
		if ( is_array($target_tables) && is_array($target_views) ) {
			$target_tables = array_diff($target_tables, $target_views);
		}
		
		
		if (($target_total = count($target_tables)) > 0) {
			
			$i = 0;
			$success = 0;
			$fail = 0;
			
			foreach ($target_tables as $table_name) {
				$result = "";
				if ( $target_obj->dropTable($table_name) ) {
					$result = "Done";
					$success +=1;
				}else {
					$result = "Fail";
					$fail +=1;
				}
				$mesg = "Drop for: {$table_name} [{$result}].";
				Console_Ui::message("\n{$mesg}\n");
				$this->logger->log($mesg);
				$i++;
				
			}
			
			$mesg = "~~~~ Total: [{$i}]. Success: [{$success}]. Fail: [{$fail}] ~~~~";
			Console_Ui::message("\n{$mesg}\n");
			$this->logger->log($mesg);
			
		}else {
			$mesg = "~~~~ NONE TABLE NEED TO BE DROP ~~~~";
			Console_Ui::message("\n{$mesg}\n");
			
		}

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