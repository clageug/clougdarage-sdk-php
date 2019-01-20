<?php

/**
 * Image Interface for CloudGarage
 */

namespace CloudGarage\Library;

interface Image {
    public function get_images($token);
    public function get_public_images($token);
    public function get_backup_images($token);
}
