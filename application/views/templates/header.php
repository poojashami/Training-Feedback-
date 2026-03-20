<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : 'GTI Feedback'; ?></title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <style>
        .select2-container--default .select2-selection--single {
            border: 1px solid #ced4da;
            border-radius: 4px;
            height: 38px;
            line-height: 38px;
        }
    </style>
</head>
<body>
    <div class="main-wrapper">
        <nav class="navbar">
            <div class="nav-container">
                <a href="<?php echo base_url(); ?>" class="nav-brand">GTI Portal</a>
                <button class="nav-toggle" id="navToggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="nav-menu" id="navMenu">
                    <a href="<?php echo site_url('feedback/index'); ?>" class="nav-item <?php echo ($this->uri->segment(2) == 'index' || $this->uri->segment(2) == '') ? 'active' : ''; ?>">Dashboard</a>
                    <a href="<?php echo site_url('feedback/reports'); ?>" class="nav-item <?php echo ($this->uri->segment(2) == 'reports') ? 'active' : ''; ?>">Reports</a>
                    <a href="<?php echo site_url('feedback/hostel'); ?>" class="nav-item <?php echo ($this->uri->segment(2) == 'hostel') ? 'active' : ''; ?>">Hostel Feedback</a>
                    <a href="<?php echo site_url('feedback/training'); ?>" class="nav-item <?php echo ($this->uri->segment(2) == 'training') ? 'active' : ''; ?>">Training Evaluation</a>
                    <a href="<?php echo site_url('feedbackv2'); ?>" class="nav-item" style="background: var(--accent); color: white; border-radius: 4px; padding: 6px 10px; font-weight: bold; margin-left: 10px;">Try V2 (Premium)</a>
                </div>
            </div>
        </nav>
        <main class="main-content">
            <div class="container">
