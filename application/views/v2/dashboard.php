<header class="animate-up">
    <h1>Project Dashboard </h1>
    <h2>Premium Overview of Training & Hostel Feedback System</h2>
</header>

<div class="stats-grid animate-up">
    <div class="stat-card" style="border-left: 4px solid var(--accent);">
        <div class="stat-label">Total Submissions / कुल जमा</div>
        <div class="stat-value"><?php echo $total_count; ?></div>
        <div class="stat-trend" style="color: var(--accent);">
            <span>System Active</span>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Hostel Feedback / छात्रावास</div>
        <div class="stat-value"><?php echo $hostel_count; ?></div>
        <div class="stat-trend" style="color: var(--success);">
            <span>+ Engagement</span>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Training Evaluation / प्रशिक्षण</div>
        <div class="stat-value"><?php echo $training_count; ?></div>
        <div class="stat-trend" style="color: var(--secondary);">
            <span>Growth Factor</span>
        </div>
    </div>
</div>

<!-- Final Overall Quality Metrics Section -->
<h3 class="animate-up" style="font-size: 16px; margin: 30px 0 15px; color: var(--primary); font-weight: 700; display: flex; align-items: center; gap: 8px;">
    <span style="width: 4px; height: 16px; background: var(--accent); border-radius: 4px;"></span>
    Overall System Quality Scores / कुल गुणवत्ता स्कोर
</h3>

<div class="stats-grid animate-up" style="grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));">
    <div class="stat-card" style="border-bottom: 3px solid var(--success);">
        <div class="stat-label">Overall Training Evaluation / प्रशिक्षण मूल्यांकन</div>
        <div class="stat-value" style="color: var(--success);"><?php echo number_format($train_total_avg, 1); ?><span style="font-size: 14px; color: var(--text-muted);">/100</span></div>
        <div class="stat-trend">Combined program assessment</div>
    </div>
    <div class="stat-card" style="border-bottom: 3px solid #6366f1;">
        <div class="stat-label">Overall Programme / कार्यक्रम रेटिंग</div>
        <div class="stat-value" style="color: #6366f1; font-size: 28px;"><?php echo number_format($prog_avg, 1); ?><span style="font-size: 14px; color: var(--text-muted);">/70</span></div>
        <div class="stat-trend">Section I Metrics</div>
    </div>
    <div class="stat-card" style="border-bottom: 3px solid #ec4899;">
        <div class="stat-label">Trainers of Faculty / संकाय रेटिंग</div>
        <div class="stat-value" style="color: #ec4899; font-size: 28px;"><?php echo number_format($fac_avg, 1); ?><span style="font-size: 14px; color: var(--text-muted);">/30</span></div>
        <div class="stat-trend">Section II Metrics</div>
    </div>
    <div class="stat-card" style="border-bottom: 3px solid var(--accent);">
        <div class="stat-label">Hostel / हॉस्टल रेटिंग</div>
        <div class="stat-value" style="color: var(--accent);"><?php echo number_format($hostel_avg, 1); ?><span style="font-size: 14px; color: var(--text-muted);">/5</span></div>
        <div class="stat-trend">General residential rating</div>
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