<?php
class MailTemplate extends WebmaillerAppModel {

	var $name = 'MailTemplate';
	var $validate = array(
		'title' => array('notempty'),
		'subject' => array('notempty'),
		'content' => array('notempty')
	);
	
	/**
	 * Send email to all customers according provided template id
	 *
	 * @access	public
	 * @author	John.Meng(孟远螓) arzen1013@gmail.com 2009-4-4
	 * @param	int	$id 	template id
	 * @return	void
	 */
	function sendMail($id) {
		$mail_template = $this->read(null, $id);
		$mail_data = $mail_template['MailTemplate'];
		
		//-- import phpmailer
		App::import("Vendor", "PHPMailer", array('file' => 'PHPMailer'.DS.'class.phpmailer.php') );
		
		//-- get all mail servers 
		App::import('Model', 'Webmailler.MailServer');
		$mail_server_obj = new MailServer();
		$servers_list = $mail_server_obj->find('all');
		$servers = Set::extract($servers_list, '{n}.MailServer');
		
		//--- get all customers by page
		App::import('Model', 'Webmailler.MailCustomer');
		$mail_customer_obj = new MailCustomer();
		
		$limit = count($servers);
		$total = $mail_customer_obj->find('count');
		$pages = ceil($total/$limit);
		
		for ($page=0; $page<$pages; $page++) {
			$conditions = array(
				'fields' => array('MailCustomer.nickname', 'MailCustomer.gender', 'MailCustomer.email'),
				'limit' => $limit,
				'page' => $page, 
			);
			$customers_list = $mail_customer_obj->find('all', $conditions);
			$customers = Set::extract($customers_list, '{n}.MailCustomer');
			if (is_array($customers)) {
				foreach ($customers as $key=>$customer) {
					
					$server = $servers[$key];
					$mail = new PHPMailer();
					if ($server['ssl']) {
						$mail->SMTPSecure = "ssl";
					}
					$mail->IsSMTP();
					$mail->SMTPAuth   = true;
					$mail->Host       = $server['host'];
					if ($server['port']>0) {
						$mail->Port   = $server['port'];
					}
					
					$mail->Username   = $server['account'];
					$mail->Password   = $server['passwd'];
					
					$mail->AddReplyTo($server['account'],"JohnMeng");
					
					$mail->From       = $server['account'];
					$mail->FromName   = "JohnMeng";
					
					$mail->Subject    = $mail_data['subject'];
					$contents = $this->_parseMailContent( $mail_data['content'], $customer );
					if ($mail_data['plain_text']) {
						$mail->Body = $contents;
					} else{
						$mail->MsgHTML($contents);
					}
					
					$mail->AddAddress($customer['email'], $customer['nickname']);
					
					if(!$mail->Send()) {
					  echo "Mailer Error: " . $mail->ErrorInfo . "<br/>";
					} else {
					  echo "Message sent!<br/>";
					}
					
					
				}
				
			}
			
		}
		
	}
	
	/**
	 * Parse mail content's placeholder
	 *
	 * @access	private
	 * @author	John.Meng(孟远螓) arzen1013@gmail.com 2009-4-4
	 * @param	string	$content	mail content
	 * @param 	array	$user_info	user profile infomation
	 * @return	string
	 */
	function _parseMailContent($content, $user_info) {
		$pattern = array(
			"#name", 
			"#gender", 
			"#date"
		);
		$replace = array(
			$user_info['nickname'], 
			$user_info['gender'] == 'M' ? __("Mr.", true) : __("Ms.", true), 
			date("Y/m/d H:i:s") 
		);
		return str_replace($pattern, $replace, $content);
	}
	
	
}
?>