<header>
    <h1>Project Dashboard</h1>
    <h2>Overview of Training & Hostel Feedback System</h2>
</header>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-label">Total Submissions</div>
        <div class="stat-value"><?php echo $total_count; ?></div>
        <div class="stat-trend">Overall engagement</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Hostel Feedback</div>
        <div class="stat-value"><?php echo $hostel_count; ?></div>
        <div class="stat-trend" style="color: var(--success); font-weight: 700;">Avg: <?php echo number_format($hostel_avg, 1); ?>/5</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Training Evaluation</div>
        <div class="stat-value"><?php echo $training_count; ?></div>
        <div class="stat-trend" style="color: var(--accent); font-weight: 700;">Avg: <?php echo number_format($train_total_avg, 1); ?>/100</div>
    </div>
</div>

<div class="stats-grid" style="margin-top: 20px;">
    <div class="stat-card">
        <div class="stat-label">Programme Quality</div>
        <div class="stat-value" style="font-size: 24px; color: var(--accent);"><?php echo number_format($prog_avg, 1); ?>/70</div>
        <div class="stat-trend">Rating of Overall Prog.</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Faculty Excellence</div>
        <div class="stat-value" style="font-size: 24px; color: var(--secondary);"><?php echo number_format($fac_avg, 1); ?>/30</div>
        <div class="stat-trend">Rating of Trainer</div>
    </div>
</div>

<hr>

<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-top: 40px;">
    <div class="container" style="padding: 24px; box-shadow: none; border: 1px solid var(--border);">
        <h3 style="margin-bottom: 16px; font-size: 18px;">Quick Actions</h3>
        <ul style="list-style: none;">
            <li style="margin-bottom: 12px;">
                <a href="<?php echo site_url('feedback/hostel'); ?>" class="nav-item" style="display: block; background: #f8fafc; padding: 12px; font-size: 13px;">Generate Hostel Form</a>
            </li>
            <li>
                <a href="<?php echo site_url('feedback/training'); ?>" class="nav-item" style="display: block; background: #f8fafc; padding: 12px; font-size: 13px;">Start Training Evaluation</a>
            </li>
        </ul>
    </div>
    <div class="container" style="padding: 24px; box-shadow: none; border: 1px solid var(--border);">
        <h3 style="margin-bottom: 16px; font-size: 18px;">System Status</h3>
        <p style="font-size: 14px; color: var(--text-muted);">Database: Connected</p>
        <p style="font-size: 14px; color: var(--text-muted); margin-top: 8px;">Environment: Production (Simulated)</p>
        <div style="margin-top: 20px; padding: 10px; background: rgba(16, 185, 129, 0.1); border-radius: 6px; color: var(--success); font-size: 12px; font-weight: 600;">
            ONLINE • ALL SYSTEMS FUNCTIONAL
        </div>
    </div>
</div>
