<?php
//include('../studio/includes/config.php');
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
    <title><?php if(isset($page_title)) { echo "$page_title"; } else { echo $name; } ?></title>
    <meta name="description" content="<?php if(isset($meta_description)) { echo '$meta_description'; } ?>" />
    <meta name="keyword" content="<?php if(isset($meta_keyword) ) { echo '$meta_keywords'; } ?>" />
    <link rel="icon" href="<?= base_url('assets/images/Favicon.png') ?>">
    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <link rel="stylesheet" href="<?= base_url('assets/css/google-font.css') ?> ">
    <link rel="stylesheet" href="<?= base_url('mobile/assets/css/home.css') ?>">
</head>
<body>


