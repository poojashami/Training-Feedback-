<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> | GTI Feedback V2</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style-v2.css'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <style>
        .select2-container--default .select2-selection--single {
            background-color: #f8fafc;
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            height: 40px;
            display: flex;
            align-items: center;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: var(--primary);
            font-size: 14px;
        }
        .select2-container { width: 100% !important; }
    </style>
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
        <?php /* Success handled via dedicated Thank You screen in views */ ?>
        
        <?php if($this->session->flashdata('error')): ?>
            <div class="badge badge-error animate-up" style="margin-bottom: 20px; display: block; text-align: center; padding: 12px; background: rgba(239, 68, 68, 0.2); color: #f87171;">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>
