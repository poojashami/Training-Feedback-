<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> | GTI Feedback V2</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style-v2.css'); ?>">
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <a href="<?php echo site_url('feedbackv2'); ?>" class="nav-brand">
                <i>G</i> GTI Portal <sup>V2</sup>
            </a>
            <div class="nav-menu">
                <a href="<?php echo site_url('feedbackv2'); ?>" class="nav-item <?php echo ($this->uri->segment(2) == '' || $this->uri->segment(2) == 'index') ? 'active' : ''; ?>">Training Calendar</a>
                <a href="<?php echo site_url('feedbackv2/dashboard'); ?>" class="nav-item <?php echo ($this->uri->segment(2) == 'dashboard') ? 'active' : ''; ?>">Dashboard</a>
                <a href="<?php echo site_url('feedbackv2/hostel'); ?>" class="nav-item <?php echo ($this->uri->segment(2) == 'hostel') ? 'active' : ''; ?>">Hostel</a>
                <a href="<?php echo site_url('feedbackv2/training'); ?>" class="nav-item <?php echo ($this->uri->segment(2) == 'training') ? 'active' : ''; ?>">Training</a>
                <a href="<?php echo site_url('feedbackv2/reports'); ?>" class="nav-item <?php echo ($this->uri->segment(2) == 'reports') ? 'active' : ''; ?>">Reports</a>
                <a href="<?php echo site_url('feedback'); ?>" class="nav-item">Switch to V1</a>
            </div>
        </div>
    </nav>

    <div class="main-content">
        <?php if($this->session->flashdata('success')): ?>
            <div class="badge badge-success animate-up" style="margin-bottom: 20px; display: block; text-align: center; padding: 12px;">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>
        
        <?php if($this->session->flashdata('error')): ?>
            <div class="badge badge-error animate-up" style="margin-bottom: 20px; display: block; text-align: center; padding: 12px; background: rgba(239, 68, 68, 0.2); color: #f87171;">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>
