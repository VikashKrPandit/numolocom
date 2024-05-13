<?php

	require_once("Rest.inc.php");
	require_once("db.php");
	require_once("functions.php");

	class API extends REST {

		private $functions = NULL;
		private $db = NULL;

		public function __construct() {
			$this->db = new DB();
			$this->functions = new functions($this->db);
		}

		public function check_connection() {
			$this->functions->checkConnection();
		}

		/*
		 * ALL API Related android client -------------------------------------------------------------------------
		*/
		
        private function user_register() {
	        $this->functions->userRegister();
	    }

	    private function user_login() {
	        $this->functions->userLogin();
	    }
	    
	    private function user_wallet() {
	        $this->functions->userWallet();
	    }
	    
        
        
        private function update_user_profile() {
	        $this->functions->updateUserProfile();
	    }
	    
	    private function update_user_photo() {
	        $this->functions->updateUserPhoto();
	    }
	    
	    private function verify_user_mobile() {
	        $this->functions->verifyUserMobile();
	    }
	    
	    private function forgot_user_password() {
	        $this->functions->forgotUserPassword();
	    }
	    
	    
	    
	    private function get_upcoming_contest() {
			$this->functions->getUpcomingContest();
		}
		
	    private function get_live_contest() {
			$this->functions->getLiveContest();
		}
	    
		private function get_contest_status() {
			$this->functions->getContestStatus();
		}
	    
		private function get_all_contest() {
			$this->functions->getAllContest();
		}
		
		private function get_packages() {
			$this->functions->getPackages();
		}
	    
	    private function get_contest() {
			$this->functions->getContest();
		}
		
		private function get_price_slots() {
			$this->functions->getPriceSlots();
		}
		
		private function get_tickets_sold() {
			$this->functions->getTicketsSold();
		}
		
		
		
		private function add_report_issue() {
			$this->functions->addReportIssue();
		}
		
		private function add_transaction() {
			$this->functions->addTransaction();
		}
		
		private function add_tickets() {
			$this->functions->addTickets();
		}
		
		
		
	    private function get_my_tickets() {
			$this->functions->getMyTickets();
		}
		
		private function get_my_ticket_no() {
			$this->functions->getMyTicketNo();
		}
		
        private function get_history() {
			$this->functions->getHistory();
		}
		
		private function get_my_contests() {
			$this->functions->getMyContests();
		}
		private function get_my_results() {
			$this->functions->getMyResults();
		}
		
		private function get_top_winners() {
			$this->functions->getTopWinners();
		}
	    

	    
	    private function get_transactions() {
			$this->functions->getTransactions();
		}
		
		
		private function get_notification() {
	        $this->functions->getNotification();
	    }
	    
		
		
	    private function get_app_details() {
	        $this->functions->getAppDetails();
	    }
	    
        private function get_about_us() {
	        $this->functions->getAboutUs();
	    }
	    
	    private function get_contact_us() {
	        $this->functions->getContactUs();
	    }

        private function get_faq() {
	        $this->functions->getFAQ();
	    }
	    
	    private function get_privacy_policy() {
	        $this->functions->getPrivacyPolicy();
	    }

        private function get_terms_condition() {
	        $this->functions->getTermsCondition();
	    }
	    
	
		/*
		 * End of API Transactions ----------------------------------------------------------------------------------
		*/

		public function processApi() {
			if(isset($_REQUEST['x']) && $_REQUEST['x']!=""){
				$func = strtolower(trim(str_replace("/","", $_REQUEST['x'])));
				if((int)method_exists($this,$func) > 0) {
					$this->$func();
				} else {
					echo 'processApi - method not exist';
					exit;
				}
			} else {
				echo 'processApi - method not exist';
				exit;
			}
		}

	}

	// Initiiate Library
	$api = new API;
	$api->processApi();

?>