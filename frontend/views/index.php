<?php
require_once '../../backend/core/init.php';

DB::getInstance()->query("SELECT Username FROM customer WHERE Username= ?", array('Betsabe'));