<?php
class PlanDb {
    var $delimiter = " ";
    var $enclosure = '"';
    var $filename = 'plain_db';
    var $line = array();
    var $buffer;

    function PlanDb() {
        $this->clear();
    }

    function clear() {
        $this->line = array();
        $this->buffer = fopen('php://temp/maxmemory:'. (5*1024*1024), 'r+');
    }

    function addField($value) {
        $this->line[] = $value;
    }

    function endRow() {
        $this->addRow($this->line);
        $this->line = array();
    }

    function addRow($row) {
        fputcsv($this->buffer, $row, $this->delimiter, $this->enclosure);
    }

    function setFilename($filename) {
        $this->filename = $filename;
    }

    function getBuffer() {
        rewind($this->buffer);
        return stream_get_contents($this->buffer);
    }

    function getExistData() {
    	return file_get_contents($this->filename);
    }

    function toArray() {
		$row = 1;
		$handle = fopen($this->filename,"r");
		$result = null;
		while ($data = fgetcsv($handle, 1000, $this->delimiter)) {
			$result[$row] = $data;
		    $row++;
		}
		fclose($handle);
		return $result;
    }

    function append() {
    	$data = $this->getExistData();
    	$data .= $this->getBuffer();
    	file_put_contents($this->filename, $data);
    }

    function save() {
    	$output = $this->getBuffer();
        file_put_contents($this->filename, $output);
    }


}