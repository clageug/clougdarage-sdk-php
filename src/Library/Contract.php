<?php

/**
 * Contract Interface for CloudGarage
 */

namespace CloudGarage\Library;

interface Contract {
    public function get_list($token);
    public function get_detail($token, $contract_id);
}
