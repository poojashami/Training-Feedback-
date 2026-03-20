<?php
$CI = &get_instance();
$CI->lang->load('feedback', 'english');
$en = $CI->lang->language;
$CI->lang->load('feedback', 'hindi');
$hi = $CI->lang->language;
?>

<div class="glass-card animate-up" style="margin-bottom: 25px;">
    <header style="margin-bottom: 20px;">
        <h1 style="font-size: 26px; letter-spacing: -0.5px;">Training Calendar</h1>
        <h2 style="font-size: 14px; color: var(--accent); text-transform: uppercase; letter-spacing: 1px;">Initialize New Feedback Links</h2>
    </header>

    <form action="<?php echo site_url('feedbackv2/submit_calendar'); ?>" method="post" id="calendarForm">
        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 15px;">
            <div class="form-group">
                <label>Name of the programme</label>
                <input type="text" name="training_name" class="form-control" placeholder="Enter program name..." required>
            </div>
            <div class="form-group">
                <label>Program ID</label>
                <input type="text" name="program_id" class="form-control" placeholder="e.g. TR-2024-001" required>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 15px;">
            <div class="form-group">
                <label>Start Date</label>
                <input type="date" name="start_date" id="cal_start" class="form-control" required>
            </div>
            <div class="form-group">
                <label>End Date</label>
                <input type="date" name="end_date" id="cal_end" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Duration (Days)</label>
                <input type="text" name="duration" id="cal_duration" class="form-control" readonly style="background: rgba(15,23,42,0.02); font-weight: 700;">
            </div>
            <div class="form-group">
                <label>Co-ordinator / Incharge</label>
                <input type="text" name="coordinator" class="form-control" placeholder="Name">
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; gap: 15px;">
            <div class="form-group">
                <label>Conducted by</label>
                <input type="text" name="conducted_by" class="form-control" placeholder="Instructor">
            </div>
            <div class="form-group">
                <label>Organisation</label>
                <input type="text" name="organization" class="form-control" placeholder="Org name">
            </div>
            <div class="form-group">
                <label>Training Room Booked</label>
                <input type="text" name="room_booked" class="form-control" placeholder="Room no/Name">
            </div>
            <div class="form-group">
                <label>Location</label>
                <input type="text" name="location" class="form-control" value="GTI NOIDA">
            </div>
        </div>

        <input type="hidden" name="feedback_date" value="<?php echo date('Y-m-d'); ?>">
        <input type="hidden" name="create_gen_service" id="create_gen_service" value="No">

        <button type="submit" class="btn-primary" style="margin-top: 20px; font-size: 16px;">
            Initialize Program & Generate Links — प्रोग्राम शुरू करें
        </button>
    </form>
</div>

<!-- Links Table / Report -->
<div class="glass-card animate-up" style="padding-top: 20px;">
    <h3 style="font-size: 18px; margin-bottom: 15px; display: flex; align-items: center; gap: 10px;">
        <span style="width: 8px; height: 18px; background: var(--accent); border-radius: 4px;"></span>
        Recent Training Programs & Feedback Links
    </h3>

    <div class="table-container" style="margin-top: 10px;">
        <table>
            <thead>
                <tr>
                    <th>Training Program Details</th>
                    <th>Duration & Venue</th>
                    <th style="text-align: center;">Action Links</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($recent_links)): ?>
                    <tr>
                        <td colspan="4" style="text-align: center; padding: 40px; color: var(--text-muted);">No programs initialized yet. Use the form above to start.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($recent_links as $row): ?>
                        <tr>
                            <td>
                                <div style="font-weight: 700; color: var(--primary); font-size: 14px;"><?php echo $row->training_name; ?></div>
                                <div style="font-size: 11px; color: var(--accent);">ID: <?php echo $row->program_id; ?> | Coordinator: <?php echo $row->coordinator; ?></div>
                            </td>
                            <td>
                                <div style="font-size: 13px;"><?php echo date('d M', strtotime($row->start_date)); ?> - <?php echo date('d M Y', strtotime($row->end_date)); ?></div>
                                <div style="font-size: 11px; color: var(--text-muted);"><?php echo $row->location; ?> (<?php echo $row->room_booked; ?>)</div>
                            </td>
                            <td style="text-align: center; padding: 10px;">
                                <div style="display: flex; flex-direction: column; gap: 5px;">
                                    <a href="<?php echo site_url('feedbackv2/training/' . $row->id); ?>" class="btn-primary" style="padding: 6px 12px; font-size: 11px; margin-top: 0; background: var(--accent);">
                                        Fill Training Evaluation
                                    </a>
                                    <?php if ($row->create_gen_service): ?>
                                        <a href="<?php echo site_url('feedbackv2/hostel/' . $row->id); ?>" class="btn-primary" style="padding: 6px 12px; font-size: 11px; margin-top: 0; background: var(--secondary);">
                                            Fill Hostel Feedback
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Premium Confirmation Modal -->
<div id="confirmModal" class="modal-overlay">
    <div class="modal-content glass-card animate-up">
        <div class="modal-header">
            <div class="modal-icon">?</div>
            <h3>Generate Additional Link?</h3>
        </div>
        <p>Do you want to create the link for <strong>General services (Hostel Feedback)</strong> as well along with Training Evaluation form?</p>
        <div class="modal-actions">
            <button type="button" id="btnYes" class="btn-primary" style="background: var(--success); box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);">Yes, Create Both</button>
            <button type="button" id="btnNo" class="btn-primary" style="background: var(--accent);">No, Training Only</button>
            <button type="button" id="btnCancel" class="btn-text">Cancel</button>
        </div>
    </div>
</div>

<style>
    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(15, 23, 42, 0.6);
        backdrop-filter: blur(8px);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 2000;
        padding: 20px;
    }

    .modal-content {
        max-width: 450px;
        width: 100%;
        margin-bottom: 0;
        text-align: center;
        padding: 40px 30px;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .modal-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--accent) 0%, var(--secondary) 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        color: white;
        font-size: 30px;
        font-weight: 800;
        box-shadow: 0 10px 20px var(--accent-glow);
    }

    .modal-header h3 {
        font-size: 22px;
        color: var(--primary);
        margin-bottom: 12px;
    }

    .modal-content p {
        color: var(--text-muted);
        font-size: 15px;
        line-height: 1.5;
        margin-bottom: 30px;
    }

    .modal-actions {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .btn-text {
        background: transparent;
        border: none;
        color: var(--text-muted);
        font-weight: 600;
        font-size: 13px;
        cursor: pointer;
        padding: 8px;
        margin-top: 5px;
    }

    .btn-text:hover {
        color: var(--danger);
    }
</style>

<script>
    // Duration Calculation
    const calStart = document.getElementById('cal_start');
    const calEnd = document.getElementById('cal_end');
    const calDuration = document.getElementById('cal_duration');

    function updateDuration() {
        if (calStart.value && calEnd.value) {
            const start = new Date(calStart.value);
            const end = new Date(calEnd.value);
            if (end >= start) {
                const diffTime = Math.abs(end - start);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
                calDuration.value = diffDays;
            } else {
                calDuration.value = "!";
            }
        }
    }

    calStart.addEventListener('change', updateDuration);
    calEnd.addEventListener('change', updateDuration);

    // Premium Confirmation Logic
    const form = document.getElementById('calendarForm');
    const modal = document.getElementById('confirmModal');
    const hiddenInput = document.getElementById('create_gen_service');

    const btnYes = document.getElementById('btnYes');
    const btnNo = document.getElementById('btnNo');
    const btnCancel = document.getElementById('btnCancel');

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        modal.style.display = 'flex';
    });

    btnYes.addEventListener('click', function() {
        hiddenInput.value = 'Yes';
        modal.style.display = 'none';
        form.submit();
    });

    btnNo.addEventListener('click', function() {
        hiddenInput.value = 'No';
        modal.style.display = 'none';
        form.submit();
    });

    btnCancel.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    // Close modal on outside click
    window.addEventListener('click', function(e) {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });

    // Go to Home utility (if needed anywhere in scripts)
    function goToHome() {
        window.location.href = "<?php echo site_url('feedbackv2'); ?>";
    }
</script>