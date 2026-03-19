<?php
$CI =& get_instance();
$CI->lang->load('feedback', 'english');
$en = $CI->lang->language;
$CI->lang->load('feedback', 'hindi');
$hi = $CI->lang->language;
?>

<div class="glass-card animate-up" style="position: relative;">
    <div style="position: absolute; top: 24px; right: 24px; text-align: right; z-index: 10;">
        <div style="font-size: 10px; color: var(--text-muted); text-transform: uppercase; font-weight: 700; letter-spacing: 1px;">Date / दिनांक</div>
        <div style="font-size: 16px; color: var(--accent); font-weight: 800;"><?php echo date('d M Y'); ?></div>
    </div>
    <header>
        <h1 style="font-size: 24px;">गेल प्रशिक्षण संस्थान, नोएडा</h1>
        <h1 style="font-size: 24px;">GAIL TRAINING INSTITUTE</h1>
        <h2 style="font-size: 20px; color: var(--accent); margin-top: 10px;">प्रशिक्षण मूल्यांकन प्रपत्र</h2>
        <h2 style="font-size: 20px; color: var(--accent);">Training Evaluation Form</h2>
    </header>

    <form action="<?php echo site_url('feedbackv2/submit_training'); ?>" method="post">
        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px;">
            <div class="form-group">
                <label><?php echo $hi['prog_name']; ?> / <?php echo $en['prog_name']; ?></label>
                <input type="text" name="prog_name" class="form-control" placeholder="Enter program name..." required value="<?php echo isset($cal) ? $cal->training_name : ''; ?>">
            </div>
            <div class="form-group">
                <label>Program ID / प्रोग्राम आईडी</label>
                <input type="text" name="program_id" class="form-control" placeholder="ID..." value="<?php echo isset($cal) ? $cal->program_id : ''; ?>">
            </div>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 20px;">
            <div class="form-group">
                <label>प्रारंभ दिनांक / From Date</label>
                <input type="date" name="date_from" id="v2_date_from" class="form-control" required value="<?php echo isset($cal) ? $cal->start_date : ''; ?>">
            </div>
            <div class="form-group">
                <label>समाप्ति दिनांक / To Date</label>
                <input type="date" name="date_to" id="v2_date_to" class="form-control" required value="<?php echo isset($cal) ? $cal->end_date : ''; ?>">
            </div>
            <div class="form-group">
                <label><?php echo $hi['duration']; ?> / <?php echo $en['duration']; ?></label>
                <input type="text" name="duration" id="v2_duration" class="form-control" readonly style="background: rgba(255,255,255,0.05); font-weight: 700;" value="<?php echo isset($cal) ? $cal->duration . ' Days' : ''; ?>">
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px;">
            <div class="form-group">
                <label><?php echo $hi['conducted_by']; ?> / <?php echo $en['conducted_by']; ?></label>
                <input type="text" name="conducted_by" class="form-control" placeholder="Instructor name..." value="<?php echo isset($cal) ? $cal->conducted_by : ''; ?>">
            </div>
            <div class="form-group">
                <label><?php echo $hi['organization']; ?> / <?php echo $en['organization']; ?></label>
                <input type="text" name="organization" class="form-control" placeholder="Organization name..." value="<?php echo isset($cal) ? $cal->organization : ''; ?>">
            </div>
            <div class="form-group">
                <label>Coordinator / समन्वयक</label>
                <input type="text" name="coordinator" class="form-control" placeholder="Coordinator name..." value="<?php echo isset($cal) ? $cal->coordinator : ''; ?>">
            </div>
        </div>

        <div class="form-group">
            <label>Location & Room / स्थान और कमरा</label>
            <input type="text" name="location_room" class="form-control" placeholder="Location..." value="<?php echo isset($cal) ? $cal->location . ' (' . $cal->room_booked . ')' : ''; ?>">
        </div>

        <h4 style="color: var(--accent); margin: 30px 0 15px; border-bottom: 1px solid var(--glass-border); padding-bottom: 8px;">
            I. <?php echo $hi['overall_prog_rating']; ?> / <?php echo $en['overall_prog_rating']; ?>
        </h4>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th style="width: 50px;">#</th>
                        <th>Parameters / मापदंड</th>
                        <th style="width: 80px; text-align: center;">Max</th>
                        <th style="width: 120px; text-align: center;">Score</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $pArr = [20, 20, 15, 10, 5];
                    for($i=1; $i<=5; $i++): ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td>
                            <div style="font-size: 13px; color: var(--primary);"><?php echo $hi['train_q'.$i]; ?></div>
                            <div style="font-size: 11px; color: var(--text-muted);"><?php echo $en['train_q'.$i]; ?></div>
                        </td>
                        <td style="text-align: center; color: var(--text-muted);"><?php echo $pArr[$i-1]; ?></td>
                        <td><input type="number" name="t_q<?php echo $i; ?>" class="form-control prog-score" style="text-align: center;" min="0" max="<?php echo $pArr[$i-1]; ?>" value="" required placeholder="0"></td>
                    </tr>
                    <?php endfor; ?>
                    <tr style="background: rgba(99, 102, 241, 0.08); font-weight: 700;">
                        <td colspan="2" style="color: var(--primary);"><?php echo $hi['total']; ?> / Total</td>
                        <td style="text-align: center; color: var(--text-muted);">70</td>
                        <td><input type="number" id="v2_total_prog" class="form-control" style="text-align: center; background: transparent; border: none; color: var(--accent); font-weight: 800;" readonly value="0"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h4 style="color: var(--secondary); margin: 30px 0 15px; border-bottom: 1px solid var(--glass-border); padding-bottom: 8px;">
            II. <?php echo $hi['trainer_rating']; ?> / <?php echo $en['trainer_rating']; ?>
        </h4>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th style="width: 50px;">#</th>
                        <th>Faculty Criteria / संकाय मानदंड</th>
                        <th style="width: 80px; text-align: center;">Max</th>
                        <th style="width: 120px; text-align: center;">Score</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for($i=1; $i<=3; $i++): ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td>
                            <div style="font-size: 13px; color: var(--primary);"><?php echo $hi['faculty_q'.$i]; ?></div>
                            <div style="font-size: 11px; color: var(--text-muted);"><?php echo $en['faculty_q'.$i]; ?></div>
                        </td>
                        <td style="text-align: center; color: var(--text-muted);">10</td>
                        <td><input type="number" name="f_q<?php echo $i; ?>" class="form-control faculty-score" style="text-align: center;" min="0" max="10" value="" required placeholder="0"></td>
                    </tr>
                    <?php endfor; ?>
                    <tr style="background: rgba(236, 72, 153, 0.08); font-weight: 700;">
                        <td colspan="2" style="color: var(--primary);"><?php echo $hi['total']; ?> / Total</td>
                        <td style="text-align: center; color: var(--text-muted);">30</td>
                        <td><input type="number" id="v2_total_faculty" class="form-control" style="text-align: center; background: transparent; border: none; color: var(--secondary); font-weight: 800;" readonly value="0"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="form-group" style="margin-top: 20px;">
            <label>IV. <?php echo $hi['general_remarks']; ?> / <?php echo $en['general_remarks']; ?> :-</label>
            <textarea name="general_remarks" class="form-control" rows="3" placeholder="Additional comments..."></textarea>
        </div>

        <div style="margin-top: 20px;"></div>

        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px; margin-top: 0px;">
            <div class="form-group">
                <label><?php echo $hi['name']; ?> / <?php echo $en['name']; ?> :-</label>
                <input type="text" name="participant_name" class="form-control" placeholder="Enter participant name..." required>
            </div>
            <div class="form-group">
                <label><?php echo $hi['cpf_no']; ?> :-</label>
                <input type="text" name="cpf_no" class="form-control" placeholder="Enter CPF No..." required>
            </div>
        </div>

        <button type="submit" class="btn-primary">
            Submit Evaluation — मूल्यांकन जमा करें
        </button>
    </form>
</div>

<script>
    // Total Score Calculation
    document.querySelectorAll('.prog-score').forEach(input => {
        input.addEventListener('input', () => {
            let total = 0;
            document.querySelectorAll('.prog-score').forEach(i => total += parseInt(i.value) || 0);
            document.getElementById('v2_total_prog').value = total;
        });
    });
    document.querySelectorAll('.faculty-score').forEach(input => {
        input.addEventListener('input', () => {
            let total = 0;
            document.querySelectorAll('.faculty-score').forEach(i => total += parseInt(i.value) || 0);
            document.getElementById('v2_total_faculty').value = total;
        });
    });

    // Duration Calculation
    const v2DateFrom = document.getElementById('v2_date_from');
    const v2DateTo = document.getElementById('v2_date_to');
    const v2Duration = document.getElementById('v2_duration');

    function calculateV2Duration() {
        if (v2DateFrom.value && v2DateTo.value) {
            const start = new Date(v2DateFrom.value);
            const end = new Date(v2DateTo.value);
            if (end >= start) {
                const diffTime = Math.abs(end - start);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
                v2Duration.value = diffDays + " Days";
            } else {
                v2Duration.value = "Invalid Range";
            }
        }
    }

    v2DateFrom.addEventListener('change', calculateV2Duration);
    v2DateTo.addEventListener('change', calculateV2Duration);
    // Validation for program scores
    document.querySelectorAll('.prog-score').forEach(input => {
        input.addEventListener('input', function() {
            let max = parseInt(this.getAttribute('max'));
            let val = parseInt(this.value);
            if (val > max) {
                this.value = max;
                showToast("Max score for this field is " + max);
            } else if (val < 0 && this.value !== "") {
                this.value = 0;
            }
        });
    });

    // Validation for faculty scores
    document.querySelectorAll('.faculty-score').forEach(input => {
        input.addEventListener('input', function() {
            let val = parseInt(this.value);
            if (val > 10) {
                this.value = 10;
                showToast("Max score for faculty is 10");
            } else if (val < 0 && this.value !== "") {
                this.value = 0;
            }
        });
    });

    function showToast(msg) {
        let toast = document.createElement('div');
        toast.innerText = msg;
        toast.style.cssText = "position:fixed;bottom:20px;right:20px;background:#ef4444;color:white;padding:12px 24px;border-radius:8px;box-shadow:0 4px 12px rgba(0,0,0,0.2);z-index:9999;font-weight:700;animation:fadeInUp 0.3s ease;";
        document.body.appendChild(toast);
        setTimeout(() => { toast.remove(); }, 3000);
    }
</script>
