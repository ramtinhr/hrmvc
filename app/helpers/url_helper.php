<?php
ob_start();
session_start();
// Simple page redirect
function redirect($page) {
  header('Location: ' . APP_URL . '/' . $page);
}
