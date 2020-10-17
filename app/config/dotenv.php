<?php
use Symfony\Component\Dotenv\Dotenv;

/*
 * instantiate from Dotenv and load .env file
 *
 */
$dotenv = new Dotenv(true);
$dotenv->load('./../.env');
