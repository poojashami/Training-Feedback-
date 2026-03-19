<header class="animate-up">
    <h1>Project Dashboard <sup>V2</sup></h1>
    <h2>Premium Overview of Training & Hostel Feedback System</h2>
</header>

<div class="stats-grid animate-up">
    <div class="stat-card">
        <div class="stat-label">Total Submissions</div>
        <div class="stat-value"><?php echo $total_count; ?></div>
        <div class="stat-trend" style="color: var(--accent);">
            <span>System Active</span>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Hostel Feedback</div>
        <div class="stat-value"><?php echo $hostel_count; ?></div>
        <div class="stat-trend" style="color: var(--success);">
            <span>+ Engagement</span>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Training Evaluation</div>
        <div class="stat-value"><?php echo $training_count; ?></div>
        <div class="stat-trend" style="color: var(--secondary);">
            <span>Growth Factor</span>
        </div>
    </div>
</div>

<div class="action-grid animate-up" style="animation-delay: 0.1s;">
    <a href="<?php echo site_url('feedbackv2/hostel'); ?>" class="action-card">
        <h3>Hostel Feedback Form</h3>
        <p>Premium bilingual form for residential facilities evaluation.</p>
        <div class="badge badge-accent" style="margin-top: 12px; display: inline-block;">HINDI / ENGLISH</div>
    </a>
    <a href="<?php echo site_url('feedbackv2/training'); ?>" class="action-card">
        <h3>Training Evaluation</h3>
        <p>Advanced metrics and feedback for training sessions.</p>
        <div class="badge badge-success" style="margin-top: 12px; display: inline-block;">ANALYTICS READY</div>
    </a>
</div>

<div class="glass-card animate-up" style="margin-top: 30px; padding: 30px; animation-delay: 0.2s;">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <div>
            <h3 style="color: #fff; font-size: 20px;">System Intelligence</h3>
            <p style="color: var(--text-muted); font-size: 14px; margin-top: 4px;">Real-time connectivity and environment monitoring.</p>
        </div>
        <div class="badge" style="background: rgba(16, 185, 129, 0.1); color: var(--success); padding: 8px 16px; border: 1px solid rgba(16, 185, 129, 0.3);">
            ● LIVE STATUS
        </div>
    </div>
    
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; margin-top: 24px;">
        <div style="background: rgba(255,255,255,0.02); padding: 15px; border-radius: 12px;">
            <span style="font-size: 11px; color: var(--text-muted); text-transform: uppercase;">Database</span>
            <div style="color: #fff; font-weight: 600; margin-top: 4px;">Connected (Safe Mode)</div>
        </div>
        <div style="background: rgba(255,255,255,0.02); padding: 15px; border-radius: 12px;">
            <span style="font-size: 11px; color: var(--text-muted); text-transform: uppercase;">UI Engine</span>
            <div style="color: #fff; font-weight: 600; margin-top: 4px;">V2 Alpha (Premium)</div>
        </div>
    </div>
</div>
