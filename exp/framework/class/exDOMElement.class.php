<?php

class exDOMElement extends DOMElement {
	public function appendNode($name) {
		$elementNode = $this->getDocument()->createElement($name);
		$this->appendChild($elementNode);
		return $elementNode;
	}

	public function appendTextNode($name, $value, $options = array()) {
		$elementNode = $this->appendNode($name);

		if(in_array('cdata', $options)) {
			$textNode = $this->getDocument()->createCDATASection($value);
		}
		else {
			$textNode = $this->getDocument()->createTextNode($value);
		}
		$elementNode->appendChild($textNode);

		return $elementNode;
	}

	public function appendCommentNode($comment) {
		$commentNode = $this->getDocument()->createComment($comment);
		$this->appendChild($commentNode);
		return $commentNode;
	}

	public function appendAttribute($name, $value) {
		// Create the nodes
		$attributeNode = $this->getDocument()->createAttribute($name);
		$this->appendChild($attributeNode);

		$textNode = $this->getDocument()->createTextNode($value);
		$attributeNode->appendChild($textNode);

		return $attributeNode;
	}

	protected function getDocument() {
		return $this->ownerDocument;
	}
}

?>
