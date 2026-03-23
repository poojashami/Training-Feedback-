<?php
$CI = & get_instance();
$CI->lang->load('feedback', 'english');
$en = $CI->lang->language;
$CI->lang->load('feedback', 'hindi');
$hi = $CI->lang->language;
?>

<?php if($this->session->flashdata('success')): ?>
    <div class="glass-card animate-up" style="text-align: center; padding: 80px 40px; max-width: 600px; margin: 40px auto;">
        <div style="width: 80px; height: 80px; background: rgba(16, 185, 129, 0.1); color: #10b981; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 30px; font-size: 40px; border: 2px solid #10b981; box-shadow: 0 0 20px rgba(16, 185, 129, 0.2);">✓</div>
        <h1 style="font-size: 32px; color: #fff; margin-bottom: 10px;">धन्यवाद / Thank You!</h1>
        <h2 style="font-size: 20px; color: var(--accent); margin-bottom: 30px;">प्रतिक्रिया सफलतापूर्वक दर्ज की गई</h2>
        
        <p style="color: var(--text-muted); font-size: 18px; line-height: 1.6; margin-bottom: 40px;">
            Thank you for your valuable feedback regarding our hostel services. It has been recorded successfully.<br><br>
            छात्रावास सेवाओं के संबंध में आपकी बहुमूल्य प्रतिक्रिया के लिए धन्यवाद। इसे सफलतापूर्वक दर्ज किया गया है।
        </p>
        
        <div style="display: flex; gap: 15px; justify-content: center;">
            <a href="<?php echo site_url('feedbackv2'); ?>" class="btn-primary" style="background: #10b981; border: none; padding: 12px 30px;">Go to Portal / पोर्टल पर जाएं</a>
        </div>
    </div>
<?php else: ?>
    <div class="glass-card animate-up" style="position: relative;">
        <header>
            <h1 style="font-size: 24px;">हॉस्टल - गेल ट्रेनिंग इंस्टीट्यूट</h1>
            <h1 style="font-size: 24px;">HOSTEL - GAIL Training Institute</h1>
            <h2 style="font-size: 18px; margin-top: 10px;">गेल (इंडिया) लिमिटेड / GAIL (India) Limited</h2>
            <h3 style="font-size: 16px; color: var(--text-muted); font-weight: 500;">नोएडा / Noida</h3>
            <hr style="border: none; border-top: 1px solid var(--glass-border); margin: 20px 0;">
            <h2 style="font-size: 20px; color: var(--accent);"><?php echo $hi['hostel_title']; ?></h2>
            <h2 style="font-size: 20px; color: var(--accent);"><?php echo $en['hostel_title']; ?></h2>
            <p style="font-size: 14px; margin-top: 5px;"><?php echo $hi['hostel_subtitle']; ?> / <?php echo $en['hostel_subtitle']; ?></p>
        </header>

        <div class="form-header-date">
            <div class="date-label">Date / दिनांक</div>
            <div class="date-value"><?php echo date('d M Y'); ?></div>
        </div>

        <div style="background: rgba(255,255,255,0.03); padding: 20px; border-radius: 12px; margin-bottom: 30px; border-left: 4px solid var(--accent); font-size: 14px;">
            <p><strong><?php echo $hi['dear_colleague']; ?> / <?php echo $en['dear_colleague']; ?></strong></p>
            <p style="margin-top: 8px;"><?php echo $hi['hostel_intro']; ?></p>
            <p><?php echo $en['hostel_intro']; ?></p>
        </div>

        <form action="<?php echo site_url('feedbackv2/submit_hostel'); ?>" method="post">
            <div style="background: rgba(99, 102, 241, 0.03); padding: 20px; border-radius: 12px; margin-bottom: 25px; border: 1px dashed var(--accent-glow);">
                <div class="form-group">
                    <label>Training Program / प्रशिक्षण कार्यक्रम</label>
                    <input type="text" name="training_program" class="form-control" value="<?php echo isset($cal) ? $cal->training_name : ''; ?>" <?php echo isset($cal) ? 'readonly' : ''; ?> style="background: transparent; font-weight: 700; color: var(--accent);">
                </div>
                <div class="form-row-responsive">
                    <div class="form-group">
                        <label>Program ID</label>
                        <input type="text" name="program_id" class="form-control" value="<?php echo isset($cal) ? $cal->program_id : ''; ?>" <?php echo isset($cal) ? 'readonly' : ''; ?> style="background: transparent;">
                    </div>
                    <div class="form-group">
                        <label>From Date</label>
                        <input type="text" class="form-control" value="<?php echo isset($cal) ? date('d M Y', strtotime($cal->start_date)) : ''; ?>" <?php echo isset($cal) ? 'readonly' : ''; ?> style="background: transparent;">
                    </div>
                    <div class="form-group">
                        <label>To Date</label>
                        <input type="text" class="form-control" value="<?php echo isset($cal) ? date('d M Y', strtotime($cal->end_date)) : ''; ?>" <?php echo isset($cal) ? 'readonly' : ''; ?> style="background: transparent;">
                    </div>
                    <div class="form-group">
                        <label>Duration</label>
                        <input type="text" name="duration" class="form-control" value="<?php echo isset($cal) ? $cal->duration . ' Days' : ''; ?>" <?php echo isset($cal) ? 'readonly' : ''; ?> style="background: transparent; font-weight: 700;">
                    </div>
                </div>
            </div>

            <div class="form-row-responsive">
                <div class="form-group">
                    <label>नाम / <?php echo $en['name']; ?></label>
                    <input type="text" name="name" class="form-control" placeholder="Enter name..." required>
                </div>
                <div class="form-group">
                    <label>पदनाम / <?php echo $en['designation']; ?></label>
                    <input type="text" name="designation" class="form-control" placeholder="Enter designation..." required>
                </div>
                <div class="form-group">
                    <label>पहचान सं. / <?php echo $en['id_no']; ?></label>
                    <input type="text" name="id_no" class="form-control" placeholder="Enter ID...">
                </div>
            </div>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 50px;">#</th>
                            <th class="text-left">Description / विवरण</th>
                            <th style="width: 120px; text-align: center;">Rating (1-5)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 1; $i <= 7; $i++): ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td class="text-left">
                                <div style="font-size: 14px; color: #fff;"><?php echo $hi['hostel_q' . $i]; ?></div>
                                <div style="font-size: 12px; color: var(--text-muted);"><?php echo $en['hostel_q' . $i]; ?></div>
                            </td>
                            <td><input type="number" step="0.1" name="q<?php echo $i; ?>" class="form-control" style="text-align: center;" min="1" max="5" value="" required placeholder="0"></td>
                        </tr>
                        <?php endfor; ?>

                        <tr>
                            <td colspan="3" class="text-left" style="background: rgba(255,255,255,0.05); padding: 12px 15px; font-weight: 700; color: var(--accent);">
                                <?php echo $hi['hostel_food_quality']; ?> / <?php echo $en['hostel_food_quality']; ?>
                            </td>
                        </tr>

                        <?php for ($i = 8; $i <= 10; $i++): ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td class="text-left">
                                <div style="font-size: 14px; color: #fff;"><?php echo $hi['hostel_q' . $i]; ?></div>
                                <div style="font-size: 12px; color: var(--text-muted);"><?php echo $en['hostel_q' . $i]; ?></div>
                            </td>
                            <td><input type="number" step="0.1" name="q<?php echo $i; ?>" class="form-control" style="text-align: center;" min="1" max="5" value="" required placeholder="0"></td>
                        </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
            </div>

            <div class="form-group">
                <label><?php echo $hi['suggestion']; ?> / <?php echo $en['suggestion']; ?></label>
                <textarea name="suggestion" class="form-control" rows="3" placeholder="Your feedback here..."></textarea>
            </div>

            <div style="margin-top: 20px;">
                <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>">
            </div>

            <button type="submit" class="btn-primary">
                Submit Feedback — फीडबैक जमा करें
            </button>
        </form>
    </div>

    <script>
        // Validation for rating fields (1-5)
        document.querySelectorAll('input[type="number"]').forEach(input => {
            input.addEventListener('input', function() {
                let val = parseFloat(this.value);
                if (val > 5) {
                    this.value = 5;
                    showToast("Maximum rating is 5 / अधिकतम रेटिंग 5 है");
                } else if (val < 1 && this.value !== "") {
                    this.value = 1;
                    showToast("Minimum rating is 1 / न्यूनतम रेटिंग 1 है");
                }
            });
            
            // Prevent typing non-numeric characters like '-' or '+' or 'e'
            input.addEventListener('keydown', function(e) {
                if (['-', '+', 'e', 'E'].includes(e.key)) {
                    e.preventDefault();
                }
            });
        });

        function showToast(msg) {
            let toast = document.createElement('div');
            toast.innerText = msg;
            toast.style.cssText = "position:fixed;bottom:20px;right:20px;background:#ef4444;color:white;padding:12px 24px;border-radius:8px;box-shadow:0 4px 12px rgba(0,0,0,0.2);z-index:9999;font-weight:700;animation:fadeInUp 0.3s ease;";
            document.body.appendChild(toast);
            setTimeout(() => { 
                toast.style.opacity = '0';
                toast.style.transform = 'translateY(20px)';
                toast.style.transition = 'all 0.5s ease';
                setTimeout(() => toast.remove(), 500); 
            }, 3000);
        }
    </script>
<?php endif; ?>
