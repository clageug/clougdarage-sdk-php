<?php

/**
 * Curl Interface for CloudGarage
 */

namespace CloudGarage\Library;

interface Curl {
    public function set_auth_token_header($token);
    public function execute_method($method);
    public function post_data($data);
    public function execute();
    public function get_info();
    public function error();
}
