<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('dd')) {
  function dd($var)
  {

    if (is_object($var) || is_array($var)) {
      echo '<pre>';
      print_r($var);
      echo '</pre>';
    } else {
      echo $var;
    }
    exit();
  }
}

if (!function_exists('display_404')) {
  function display_404()
  {
    $CI = &get_instance();
    $CI->load->view('404');
  }
}


if (!function_exists('init_view')) {
  function init_view($view, $data = array()){
    $CI = &get_instance();
    $CI->load->view('header.php');
    $CI->load->view($view, $data);
    $CI->load->view('footer.php');
  }
}