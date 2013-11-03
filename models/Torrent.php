<?php

	class Torrent {

		public $hashString;
		public $name;
		public $downloadDir;
		public $totalSize;
		public $files;

		public $eta;
		public $status;
		public $peersConnected;
		public $peersGettingFromUs;
		public $peersSendingToUs;
		public $percentDone;
		public $rateDownload;
		public $rateUpload;
		public $uploadRatio;

		public $display;

		public function __construct($torrent) {
			foreach($torrent as $property => $value) {
				$this->$property = $value;
			}
			$this->display = array();
			$this->updateDisplay();
		}

		public function updateDisplay() {
			$helper = new Helper();
			$this->display['size'] = $helper->formatBytes($this->totalSize);
			$this->display['downloaded'] = $helper->formatBytes($this->percentDone * $this->totalSize);
			$this->display['timeRemaining'] = $helper->convertSecToStr($this->eta);
			$this->display['rateDownload'] = $helper->formatBytes($this->rateDownload) . "/s";
			$this->display['rateUpload'] = $helper->formatBytes($this->rateUpload) . "/s";
			$this->display['percentDone'] = round($this->percentDone * 100, 2);
		}




	}

?>