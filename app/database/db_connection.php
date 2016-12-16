<?php

	class DatabaseConnection extends mysqli {

		private $DB_HOSTNAME;
		private $DB_USERNAME;
		private $DB_PASSWORD;
		private $DB_NAME;

		public function __construct() {

			$environment = getenv('CLABKI_ENVIRONMENT');
			$this->initializeCredentials( $environment );

			parent::__construct(
				$this->DB_HOSTNAME,
				$this->DB_USERNAME,
				$this->DB_PASSWORD,
				$this->DB_NAME
			);

			if($this->connect_errno){
				$message = 'Connection failed: '.$this->connect_error;
				throw new Exception($message, $this->connect_errno);
			}

			$this->set_charset("utf8");
		}

		private function initializeCredentials( $environment ) {
			if($environment === 'development') {
				echo("Entré aquí");
				$this->DB_HOSTNAME = 'localhost';
				$this->DB_USERNAME = 'root';
				$this->DB_PASSWORD = '@MorionMysql2016';
				$this->DB_NAME = 'clabki';
			}
			elseif ($environment === 'production') {
				echo("Entré acá");
				$this->DB_HOSTNAME = '127.10.170.130';
				$this->DB_USERNAME = 'adminaHzNI42';
				$this->DB_PASSWORD = 'ZD6isAd4gXPA';
				$this->DB_NAME = 'clabki';
			}
		}
	}
?>
