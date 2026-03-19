    <?php
    // Load both languages for bilingual display
    $CI =& get_instance();
    $CI->lang->load('feedback', 'english');
    $en = $CI->lang->language;
    $CI->lang->load('feedback', 'hindi');
    $hi = $CI->lang->language;
    ?>

    <header>
            <h1>गेल प्रशिक्षण संस्थान, नोएडा</h1>
            <h1>GAIL TRAINING INSTITUTE</h1>
            <h2>प्रशिक्षण मूल्यांकन प्रपत्र</h2>
            <h2>Training Evaluation Form</h2>
        </header>

        <?php if($this->session->flashdata('success')): ?>
            <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php if($this->session->flashdata('error')): ?>
            <div style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
                <strong>Error: </strong> <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form action="<?php echo site_url('feedback/submit_training'); ?>" method="POST">
            <div class="form-group">
                <label><?php echo $hi['prog_name']; ?> / <?php echo $en['prog_name']; ?>:</label>
                <input type="text" name="prog_name" class="form-control" required style="border-bottom: 2px dotted #ccc; border-top:none; border-left:none; border-right:none;">
            </div>

            <div style="display: flex; gap: 20px; flex-wrap: wrap;">
                <div class="form-group" style="flex: 1;">
                    <label>कब से / From Date:</label>
                    <input type="date" name="date_from" id="date_from" class="form-control" required style="border-bottom: 2px dotted #ccc; border-top:none; border-left:none; border-right:none;">
                </div>
                <div class="form-group" style="flex: 1;">
                    <label>कब तक / To Date:</label>
                    <input type="date" name="date_to" id="date_to" class="form-control" required style="border-bottom: 2px dotted #ccc; border-top:none; border-left:none; border-right:none;">
                </div>
                <div class="form-group" style="flex: 1;">
                    <label><?php echo $hi['duration']; ?> / <?php echo $en['duration']; ?> (Days):</label>
                    <input type="text" name="duration" id="duration" class="form-control" readonly style="border-bottom: 2px dotted #ccc; border-top:none; border-left:none; border-right:none; background: #f8f9fa;">
                </div>
            </div>

            <div class="form-group">
                <label><?php echo $hi['conducted_by']; ?> / <?php echo $en['conducted_by']; ?>:</label>
                <input type="text" name="conducted_by" class="form-control" style="border-bottom: 2px dotted #ccc; border-top:none; border-left:none; border-right:none;">
            </div>

            <div class="form-group">
                <label><?php echo $hi['organization']; ?> / <?php echo $en['organization']; ?>:</label>
                <input type="text" name="organization" class="form-control" style="border-bottom: 2px dotted #ccc; border-top:none; border-left:none; border-right:none;">
            </div>

            <h4 style="background: #e9ecef; padding: 10px; margin-top: 30px;">I. <?php echo $hi['overall_prog_rating']; ?> / <?php echo $en['overall_prog_rating']; ?>:</h4>
            
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th ><?php echo $hi['sl_no']; ?><br><?php echo $en['sl_no']; ?></th>
                            <th><?php echo $hi['parameters']; ?> / <?php echo $en['parameters']; ?></th>
                            <th colspan="2" style="text-align: center;"><?php echo $hi['rating']; ?> / <?php echo $en['rating']; ?></th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th><?php echo $hi['max']; ?> / <?php echo $en['max']; ?></th>
                            <th><?php echo $hi['score']; ?><br><?php echo $en['score']; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $pArr = [20, 20, 15, 10, 5];
                        for($i=1; $i<=5; $i++): ?>
                        <tr>
                            <td><?php echo $i; ?>.</td>
                            <td>
                                <div class="bilingual-label">
                                    <span class="hindi"><?php echo $hi['train_q'.$i]; ?></span>
                                    <span class="english"><?php echo $en['train_q'.$i]; ?></span>
                                </div>
                            </td>
                            <td style="text-align: center;"><?php echo sprintf('%02d', $pArr[$i-1]); ?></td>
                            <td><input type="number" name="t_q<?php echo $i; ?>" class="form-control rating-input" min="0" max="<?php echo $pArr[$i-1]; ?>" required></td>
                        </tr>
                        <?php endfor; ?>
                        <tr style="font-weight: bold;">
                            <td colspan="2"><?php echo $hi['total']; ?> / Total :</td>
                            <td style="text-align: center;">70</td>
                            <td><input type="number" id="total_prog" class="form-control rating-input" readonly></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h4 style="background: #e9ecef; padding: 10px; margin-top: 30px;">II. <?php echo $hi['trainer_rating']; ?> / <?php echo $en['trainer_rating']; ?>:</h4>

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th ><?php echo $hi['sl_no']; ?><br><?php echo $en['sl_no']; ?></th>
                            <th><?php echo $hi['parameters']; ?> / <?php echo $en['parameters']; ?></th>
                            <th colspan="2" style="text-align: center;"><?php echo $hi['rating']; ?> Score</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th><?php echo $hi['max']; ?> / <?php echo $en['max']; ?></th>
                            <th><?php echo $hi['score']; ?><br><?php echo $en['score']; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i=1; $i<=3; $i++): ?>
                        <tr>
                            <td><?php echo $i; ?>.</td>
                            <td>
                                <div class="bilingual-label">
                                    <span class="hindi"><?php echo $hi['faculty_q'.$i]; ?></span>
                                    <span class="english"><?php echo $en['faculty_q'.$i]; ?></span>
                                </div>
                            </td>
                            <td style="text-align: center;">10</td>
                            <td><input type="number" name="f_q<?php echo $i; ?>" class="form-control rating-input faculty-input" min="0" max="10" required></td>
                        </tr>
                        <?php endfor; ?>
                        <tr style="font-weight: bold;">
                            <td colspan="2"><?php echo $hi['total']; ?> / Total :</td>
                            <td style="text-align: center;">30</td>
                            <td><input type="number" id="total_faculty" class="form-control rating-input" readonly></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="suggestion-box">
                <label>IV. <?php echo $hi['general_remarks']; ?> / <?php echo $en['general_remarks']; ?>:</label>
                <textarea name="general_remarks" class="form-control" rows="4"></textarea>
            </div>

            <div style="margin-top: 40px; display: flex; flex-direction: column; align-items: flex-end;">
                <div style="text-align: center;">
                    <div class="signature-line"></div>
                    <p><?php echo $hi['sign_participant']; ?> / <?php echo $en['sign_participant']; ?></p>
                </div>
            </div>

            <div style="display: flex; gap: 20px; margin-top: 20px;">
                <div class="form-group" style="flex: 2;">
                    <label><?php echo $hi['name']; ?> / <?php echo $en['name']; ?>:-</label>
                    <input type="text" name="participant_name" class="form-control" style="border-bottom: 2px dotted #ccc; border-top:none; border-left:none; border-right:none;" required>
                </div>
                <div class="form-group" style="flex: 1;">
                    <label><?php echo $hi['cpf_no']; ?>:-</label>
                    <input type="text" name="cpf_no" class="form-control" style="border-bottom: 2px dotted #ccc; border-top:none; border-left:none; border-right:none;" required>
                </div>
            </div>

            <div style="margin-top: 40px;">
                <button type="submit" class="btn-submit">Submit Evaluation / मूल्यांकन जमा करें</button>
            </div>
        </form>
    </div>

    <script>
        // Simple client-side auto-sum for totals
        document.querySelectorAll('input[type="number"]').forEach(input => {
            input.addEventListener('input', () => {
                let max = parseInt(input.getAttribute('max')) || 100;
                let val = parseInt(input.value);
                if (val > max) input.value = max;
                if (val < 0 && input.value !== "") input.value = 0;

                let progTotal = 0;
                let t_qs = document.querySelectorAll('input[name^="t_q"]');
                t_qs.forEach(q => progTotal += parseInt(q.value) || 0);
                document.getElementById('total_prog').value = progTotal;

                let facultyTotal = 0;
                let f_qs = document.querySelectorAll('input[name^="f_q"]');
                f_qs.forEach(q => facultyTotal += parseInt(q.value) || 0);
                document.getElementById('total_faculty').value = facultyTotal;
            });
            input.addEventListener('keydown', function(e) {
                if (['-', '+', 'e', 'E'].includes(e.key)) e.preventDefault();
            });
        });

        // Duration calculation
        const dateFrom = document.getElementById('date_from');
        const dateTo = document.getElementById('date_to');
        const duration = document.getElementById('duration');

        function calculateDuration() {
            if (dateFrom.value && dateTo.value) {
                const start = new Date(dateFrom.value);
                const end = new Date(dateTo.value);
                if (end >= start) {
                    const diffTime = Math.abs(end - start);
                    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1; 
                    duration.value = diffDays;
                } else {
                    duration.value = "Invalid Range";
                }
            }
        }

        dateFrom.addEventListener('change', calculateDuration);
        dateTo.addEventListener('change', calculateDuration);
    </script>
