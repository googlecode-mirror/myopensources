<?php
    /**
    * o------------------------------------------------------------------------------o
    * | This package is licensed under the Phpguru license 2008. A quick summary is  |
    * | that the code is free to use for non-commercial purposes. For commercial     |
    * | purposes of any kind there is a small license fee to pay. You can read more  |
    * | at:                                                                          |
    * |                  http://www.phpguru.org/static/license.html                  |
    * o------------------------------------------------------------------------------o
    *
    * � Copyright 2008 Richard Heyes
    */

    /**
    * Console test script
    */

    require_once('Console.php');

    $config = new Config();

    /**
    * Setup the menu items
    */
    $items[] = array('identifier' => 1, 'text' => 'Set email address', 'callback' => array($config, 'SetEmail'));
    $items[] = array('identifier' => 2, 'text' => 'Set forename', 'callback' => array($config, 'SetForename'));
    $items[] = array('identifier' => 3, 'text' => 'Set surname', 'callback' => array($config, 'SetSurname'));
    $items[] = array('identifier' => 4, 'text' => 'Show current configuration', 'callback' => array($config, 'ShowConfig'));
    $items[] = array('identifier' => 5, 'text' => 'Quit');

    /**
    * Main loop of program show the menu
    */
    while (true) {
        Console::ClearScreen();
    
        echo "\n    Simple Configuration Example\n    ============================\n\n";
        $id = Console::ShowMenu($items);
        
        if ($id == '5') {
            exit;
        }
    }
    
    
    
    /**
    * Sample configuration class
    */
    class Config
    {
        private $email;
        private $forename;
        private $surname;
        
        public function __construct()
        {
            $email = $forename = $surname = '';
        }
        
        public function SetEmail()
        {
            Console::ClearScreen();
            
            echo "Please enter your email address: ";
            $this->email = rtrim(Console::GetLine());
        }
        
        public function SetForename()
        {
            Console::ClearScreen();
            
            echo "Please enter your forename: ";
            $this->forename = rtrim(Console::GetLine());
        }
        
        public function SetSurname()
        {
            Console::ClearScreen();
            
            echo "Please enter your surname: ";
            $this->surname = rtrim(Console::GetLine());
        }
        
        public function ShowConfig()
        {
            Console::ClearScreen();
            
            echo "    Current Configuration\n    =====================\n\n";
            
            echo "Email........: ", $this->email, "\n";
            echo "Forename.....: ", $this->forename, "\n";
            echo "Surname......: ", $this->surname, "\n";
            echo "\n\nPlease press enter to continue... [Enter]";
            
            Console::Pause();
        }
    }
?>