<?php

if ( ! defined( 'ABSPATH' ) ) { exit; }

 interface SessionUpdateTimestampHandlerInterface { public function validateId($key); public function updateTimestamp($key, $val); } 