<?php

namespace Model;

class DivisionModel extends \W\Model\Model {
    public function __construct() {
        parent::__construct();
        $this->setPrimaryKey('div_id');
    }
}
