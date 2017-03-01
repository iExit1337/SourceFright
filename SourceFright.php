<?php

namespace phil\SourceFright;

class SourceFright {

	const REGEX_BODY = '/<body[^>]*>([\s\S.]*)<\/body>/i';

	const ID_PUT_JS_CODE = 0x34af9bb948788a13562cce6d2ba76b3d;

	private static $_instance = null;

	public static function getInstance() {

		if (self::$_instance == null) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}


	private $_alreadyEnded = false;

	public function __construct() {

		ob_start();
	}

	public function end() {

		$content = ob_get_contents();
		$template = $this->getTemplate($content);
		$content = $this->getContent($content);

		$this->resetContent();

		$indexes = $this->getCharIndexes($content);
		$this->writeSafeSource($indexes, $template);

		$this->_alreadyEnded = true;

	}

	private function getContent($source) {

		if (preg_match(self::REGEX_BODY, $source, $matches) !== false && isset($matches[1])) {
			return $matches[1];
		}

		return $source;
	}

	private function getTemplate($source) {

		return preg_replace(self::REGEX_BODY, self::ID_PUT_JS_CODE, $source);
	}

	private function writeSafeSource(array $indexes, $template) {
		
		$script = require_once "SourceFright.tpl.php";
		$html = str_replace(self::ID_PUT_JS_CODE, $script, str_replace(["\n", "\r"], "", $template));
		echo $html;
	}

	private function getCharIndexes($content) {

		$chars = [];
		for ($i = 0; $i < strlen($content); $i++) {
			$char = $content[ $i ];
			$num = ord($char);
			$chars[] = $num;
		}

		return $chars;
	}

	private function resetContent() {

		ob_get_clean();
	}

	public function __destruct() {

		if (!$this->_alreadyEnded) {
			$this->end();
		}
	}

}
