<?php

/**
 * Keypair Interface for CloudGarage
 */

namespace CloudGarage\Library;

interface Keypair {
    public function get_keypairs($token);
    public function get_detail($token, $keypair_id);
}
