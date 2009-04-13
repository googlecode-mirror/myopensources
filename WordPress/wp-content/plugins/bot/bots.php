<?php
/*
Plugin Name: Bot Counter
Plugin URI: http://ditio.net/bot-plugin
Description: Plugin is counting bots visits
Author: John.Meng
Version: 1.0
Author URI: http://ditio.net
*/

function bot_install()
{
    global $wpdb;
    $table = $wpdb->prefix."bot_counter";
    $structure = "CREATE TABLE $table (
        id INT(9) NOT NULL AUTO_INCREMENT,
        bot_name VARCHAR(80) NOT NULL,
        bot_mark VARCHAR(20) NOT NULL,
        bot_visits INT(9) DEFAULT 0,
	UNIQUE KEY id (id)
    );";
    $wpdb->query($structure);
 
    // Populate table
    $wpdb->query("INSERT INTO $table(bot_name, bot_mark)
        VALUES('Google Bot', 'googlebot')");
    $wpdb->query("INSERT INTO $table(bot_name, bot_mark)
        VALUES('Yahoo Slurp', 'yahoo')");
}
add_action('activate_bot/bots.php', 'bot_install');

function bot_uninstall() {
	global $wpdb;
	$table = $wpdb->prefix . "bot_counter";
	$sql = "DROP TABLE {$table}";
	$wpdb->query($sql);
}
add_action('deactivate_bot/bots.php', 'bot_uninstall');



function bot()
{
    global $wpdb;
    $browser_name = $_SERVER['HTTP_USER_AGENT'];
    $bots = $wpdb->get_results("SELECT * FROM ".
        $wpdb->prefix."bot_counter");
 
    foreach($bots as $bot)
    {
        if(eregi($bot->bot_mark, $browser_name))
        {
            $wpdb->query("UPDATE ".$wp->prefix."bot_counter 
                SET bot_visits = bot_visits+1 WHERE id = ".$bot->id);
 
            break;
        }
    }
}
add_action('wp_footer', 'bot');

//---------- admin arae ---------
function bot_menu()
{
    global $wpdb;
    include 'bot-admin.php';
}
 
function bot_admin_actions()
{
    // Add a new top-level menu (ill-advised):
    add_menu_page('Test Toplevel', 'Test Toplevel', 1, __FILE__, 'mt_toplevel_page');
    // Add a submenu to the custom top-level menu:
    add_submenu_page(__FILE__, 'Test Sublevel', 'John Test Sublevel', 1, 'sub-page', 'mt_sublevel_page');
    // Add a second submenu to the custom top-level menu:
    add_submenu_page(__FILE__, 'Test Sublevel 2', 'Test Sublevel 2', 8, 'sub-page2', 'mt_sublevel_page2');
    // Add a second submenu to the custom top-level menu:
    add_submenu_page(__FILE__, __('Sub Menu 3'), __('Sub Menu 3'), 8, 'sub-page3', 'mt_options_page');
    
	add_options_page("Bot Counter", "Bot Counter", 1, "Bot-Counter", "bot_menu");
	add_management_page('Test Manage', 'Test User Manage', 1, 'testmanage', 'mt_manage_page');
	
    
}
 
add_action('admin_menu', 'bot_admin_actions');



function mt_toplevel_page() {
	echo "test";
}

// mt_sublevel_page() displays the page content for the first submenu
// of the custom Test Toplevel menu
function mt_sublevel_page() {
    echo "<h2>Test Sublevel</h2>";
}

// mt_sublevel_page2() displays the page content for the second submenu
// of the custom Test Toplevel menu
function mt_sublevel_page2() {
    echo "<h2>Test Sublevel 2</h2>";
}

// mt_options_page() displays the page content for the Test Options submenu
function mt_options_page() {

    // variables for the field and option names 
    $opt_name = 'mt_favorite_food';
    $hidden_field_name = 'mt_submit_hidden';
    $data_field_name = 'mt_favorite_food';

    // Read in existing option value from database
    $opt_val = get_option( $opt_name );

    // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'
    if( $_POST[ $hidden_field_name ] == 'Y' ) {
        // Read their posted value
        $opt_val = $_POST[ $data_field_name ];

        // Save the posted value in the database
        update_option( $opt_name, $opt_val );

        // Put an options updated message on the screen

?>
<div class="updated"><p><strong><?php echo __('Options saved.' ); ?></strong></p></div>
<?php

    }

    // Now display the options editing screen

    echo '<div class="wrap">';

    // header

    echo "<h2>" . __( 'Menu Test Plugin Options' ) . "</h2>";

    // options form
    
    ?>

<form name="form1" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">

<p><?php _e("Favorite Color:" ); ?> 
<input type="text" name="<?php echo $data_field_name; ?>" value="<?php echo $opt_val; ?>" size="20">
</p><hr />

<p class="submit">
<input type="submit" name="Submit" value="<?php _e('Update Options' ) ?>" />
</p>

</form>
</div>

<?php
 
}

// mt_manage_page() displays the page content for the Test Manage submenu
function mt_manage_page() {
    echo "<h2>Test Manage</h2>";
}


//---------- init -------
add_action('init', 'bot_init');

function bot_init() {
	if (function_exists('load_plugin_textdomain')) 
	{
		
		load_plugin_textdomain('default','/wp-content/plugins/bot/langs');
		
	}
	
}


//-------- admin widgets --------
// Create the function to output the contents of our Dashboard Widget

function example_dashboard_widget_function() {
	// Display whatever it is you want to show
	echo "Hello World, I'm a great Dashboard Widget";
} 

// Create the function use in the action hook

function example_add_dashboard_widgets() {
	wp_add_dashboard_widget('example_dashboard_widget', 'Example Dashboard Widget', 'example_dashboard_widget_function');	
	global $wp_meta_boxes;

	// Remove the quickpress widget

	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);

	// Remove the incomming links widget

	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
} 

// Hoook into the 'wp_dashboard_setup' action to register our other functions

add_action('wp_dashboard_setup', 'example_add_dashboard_widgets' );



?>