<?php
$CI = &get_instance();
$CI->lang->load('feedback', 'english');
$en = $CI->lang->language;
$CI->lang->load('feedback', 'hindi');
$hi = $CI->lang->language;
?>

<?php if ($this->session->flashdata('success')): ?>
    <div class="glass-card animate-up" style="text-align: center; padding: 80px 40px; max-width: 600px; margin: 40px auto;">
        <div style="width: 80px; height: 80px; background: rgba(16, 185, 129, 0.1); color: #10b981; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 30px; font-size: 40px; border: 2px solid #10b981; box-shadow: 0 0 20px rgba(16, 185, 129, 0.2);">✓</div>
        <h1 style="font-size: 32px; color: #fff; margin-bottom: 10px;">धन्यवाद / Thank You!</h1>
        <h2 style="font-size: 20px; color: var(--accent); margin-bottom: 30px;">प्रतिक्रिया सफलतापूर्वक दर्ज की गई</h2>

        <p style="color: var(--text-muted); font-size: 18px; line-height: 1.6; margin-bottom: 40px;">
            Your training evaluation has been submitted. We appreciate your time and feedback to help us improve our programs.<br><br>
            आपका प्रशिक्षण मूल्यांकन जमा कर दिया गया है। हम अपने कार्यक्रमों को बेहतर बनाने में मदद करने के लिए आपके समय और प्रतिक्रिया की सराहना करते हैं।
        </p>

        <div style="display: flex; gap: 15px; justify-content: center;">
            <a href="<?php echo site_url('feedbackv2'); ?>" class="btn-primary" style="background: #10b981; border: none; padding: 12px 30px;">Go to Portal / पोर्टल पर जाएं</a>
        </div>
    </div>
<?php else: ?>
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
                    <input type="text" name="prog_name" class="form-control" placeholder="Enter program name..." required value="<?php echo isset($cal) ? $cal->training_name : ''; ?>" <?php echo isset($cal) ? 'readonly' : ''; ?>>
                </div>
                <div class="form-group">
                    <label>Program ID / प्रोग्राम आईडी</label>
                    <input type="text" name="program_id" class="form-control" placeholder="ID..." value="<?php echo isset($cal) ? $cal->program_id : ''; ?>" <?php echo isset($cal) ? 'readonly' : ''; ?>>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 20px;">
                <div class="form-group">
                    <label>प्रारंभ दिनांक / From Date</label>
                    <input type="date" name="date_from" id="v2_date_from" class="form-control" required value="<?php echo isset($cal) ? $cal->start_date : ''; ?>" <?php echo isset($cal) ? 'readonly style="pointer-events: none;"' : ''; ?>>
                </div>
                <div class="form-group">
                    <label>समाप्ति दिनांक / To Date</label>
                    <input type="date" name="date_to" id="v2_date_to" class="form-control" required value="<?php echo isset($cal) ? $cal->end_date : ''; ?>" <?php echo isset($cal) ? 'readonly style="pointer-events: none;"' : ''; ?>>
                </div>
                <div class="form-group">
                    <label><?php echo $hi['duration']; ?> / <?php echo $en['duration']; ?></label>
                    <input type="text" name="duration" id="v2_duration" class="form-control" readonly style="background: rgba(255,255,255,0.05); font-weight: 700;" value="<?php echo isset($cal) ? $cal->duration . ' Days' : ''; ?>">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px;">
                <div class="form-group">
                    <label>Coordinator / समन्वयक</label>
                    <input type="text" name="coordinator" class="form-control" placeholder="Coordinator name..." value="<?php echo isset($cal) ? $cal->coordinator : ''; ?>" <?php echo isset($cal) ? 'readonly' : ''; ?>>
                </div>
                <div class="form-group">
                    <label><?php echo $hi['conducted_by']; ?> / <?php echo $en['conducted_by']; ?></label>
                    <input type="text" name="conducted_by" class="form-control" placeholder="Instructor name..." value="<?php echo isset($cal) ? $cal->conducted_by : ''; ?>" <?php echo isset($cal) ? 'readonly' : ''; ?>>
                </div>
                <div class="form-group">
                    <label><?php echo $hi['organization']; ?> / <?php echo $en['organization']; ?></label>
                    <input type="text" name="organization" class="form-control" placeholder="Organization name..." value="<?php echo isset($cal) ? $cal->organization : ''; ?>" <?php echo isset($cal) ? 'readonly' : ''; ?>>
                </div>

            </div>

            <div class="form-group">
                <label>Location & Room / स्थान और कमरा</label>
                <input type="text" name="location_room" class="form-control" placeholder="Location..." value="<?php echo isset($cal) ? $cal->location . ' (' . $cal->room_booked . ')' : ''; ?>" <?php echo isset($cal) ? 'readonly' : ''; ?>>
            </div>

            <h4 style="color: var(--accent); margin: 30px 0 15px; border-bottom: 1px solid var(--glass-border); padding-bottom: 8px;">
                I. <?php echo $hi['overall_prog_rating']; ?> / <?php echo $en['overall_prog_rating']; ?>
            </h4>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 50px;">#</th>
                            <th class="text-left">Parameters / मापदंड</th>
                            <th style="width: 80px; text-align: center;">Max</th>
                            <th style="width: 120px; text-align: center;">Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $pArr = [20, 20, 15, 10, 5];
                        for ($i = 1; $i <= 5; $i++): ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td class="text-left">
                                    <div style="font-size: 14px; color: var(--primary);"><?php echo $hi['train_q' . $i]; ?></div>
                                    <div style="font-size: 12px; color: var(--text-muted);"><?php echo $en['train_q' . $i]; ?></div>
                                </td>
                                <td style="text-align: center; color: var(--text-muted);"><?php echo $pArr[$i - 1]; ?></td>
                                <td><input type="number" step="0.1" name="t_q<?php echo $i; ?>" class="form-control prog-score" style="text-align: center;" min="0" max="<?php echo $pArr[$i - 1]; ?>" value="" required placeholder="0"></td>
                            </tr>
                        <?php
                        endfor; ?>
                        <tr style="background: rgba(99, 102, 241, 0.08); font-weight: 700;">
                            <td colspan="2" class="text-left" style="color: var(--primary);"><?php echo $hi['total']; ?> / Total</td>
                            <td style="text-align: center; color: var(--text-muted);">70</td>
                            <td><input type="number" step="0.1" id="v2_total_prog" class="form-control" style="text-align: center; background: transparent; border: none; color: var(--accent); font-weight: 800;" readonly value="0"></td>
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
                            <th class="text-left">Faculty Criteria / संकाय मानदंड</th>
                            <th style="width: 80px; text-align: center;">Max</th>
                            <th style="width: 120px; text-align: center;">Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 1; $i <= 3; $i++): ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td class="text-left">
                                    <div style="font-size: 14px; color: var(--primary);"><?php echo $hi['faculty_q' . $i]; ?></div>
                                    <div style="font-size: 12px; color: var(--text-muted);"><?php echo $en['faculty_q' . $i]; ?></div>
                                </td>
                                <td style="text-align: center; color: var(--text-muted);">10</td>
                                <td><input type="number" step="0.1" name="f_q<?php echo $i; ?>" class="form-control faculty-score" style="text-align: center;" min="0" max="10" value="" required placeholder="0"></td>
                            </tr>
                        <?php
                        endfor; ?>
                        <tr style="background: rgba(236, 72, 153, 0.08); font-weight: 700;">
                            <td colspan="2" class="text-left" style="color: var(--primary);"><?php echo $hi['total']; ?> / Total</td>
                            <td style="text-align: center; color: var(--text-muted);">30</td>
                            <td><input type="number" step="0.1" id="v2_total_faculty" class="form-control" style="text-align: center; background: transparent; border: none; color: var(--secondary); font-weight: 800;" readonly value="0"></td>
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
        // Unified Score Logic: Validation + Calculation
        function updateAllScores() {
            let progTotal = 0;
            document.querySelectorAll('.prog-score').forEach(input => {
                let max = parseFloat(input.getAttribute('max')) || 100;
                let val = parseFloat(input.value);
                if (val > max) {
                    input.value = max;
                    showToast("Max score for this field is " + max);
                } else if (val < 0 && input.value !== "") {
                    input.value = 0;
                }
                progTotal += parseFloat(input.value) || 0;
            });
            document.getElementById('v2_total_prog').value = progTotal.toFixed(1);

            let facultyTotal = 0;
            document.querySelectorAll('.faculty-score').forEach(input => {
                let val = parseFloat(input.value);
                if (val > 10) {
                    input.value = 10;
                    showToast("Max score for faculty is 10");
                } else if (val < 0 && input.value !== "") {
                    input.value = 0;
                }
                facultyTotal += parseFloat(input.value) || 0;
            });
            document.getElementById('v2_total_faculty').value = facultyTotal.toFixed(1);
        }

        // Attach unified listener to all score inputs
        document.querySelectorAll('.prog-score, .faculty-score').forEach(input => {
            input.addEventListener('input', updateAllScores);
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

        function showToast(msg) {
            let existing = document.querySelector('.v2-toast');
            if (existing) existing.remove();

            let toast = document.createElement('div');
            toast.className = 'v2-toast';
            toast.innerText = msg;
            toast.style.cssText = "position:fixed;bottom:20px;right:20px;background:#ef4444;color:white;padding:12px 24px;border-radius:8px;box-shadow:0 4px 12px rgba(0,0,0,0.2);z-index:9999;font-weight:700;animation:fadeInUp 0.3s ease;";
            document.body.appendChild(toast);
            setTimeout(() => {
                if (toast.parentNode) toast.remove();
            }, 3000);
        }
    </script>
<?php endif; ?>