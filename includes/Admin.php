<?php

namespace Multi\Checkout;

/**
 * The Admin Class
 */
class Admin
{

    public function __construct()
    {
        new Admin\Menu();
        new Admin\Ajax();
    }
}