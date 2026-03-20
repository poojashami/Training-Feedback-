    <?php
    // Load both languages for bilingual display
    $CI =& get_instance();
    $CI->lang->load('feedback', 'english');
    $en = $CI->lang->language;
    $CI->lang->load('feedback', 'hindi');
    $hi = $CI->lang->language;
    ?>

    <header>
            <h1>हॉस्टल - गेल ट्रेनिंग इंस्टीट्यूट</h1>
            <h1>HOSTEL - GAIL Training Institute</h1>
            <h2>गेल (इंडिया) लिमिटेड / GAIL (India) Limited</h2>
            <h3>नोएडा / Noida</h3>
            <hr>
            <h2><?php echo $hi['hostel_title']; ?></h2>
            <h2><?php echo $en['hostel_title']; ?></h2>
            <p><?php echo $hi['hostel_subtitle']; ?> / <?php echo $en['hostel_subtitle']; ?></p>
        </header>

        <section class="intro">
            <p><strong><?php echo $hi['dear_colleague']; ?> / <?php echo $en['dear_colleague']; ?></strong></p>
            <p><?php echo $hi['hostel_intro']; ?></p>
            <p><?php echo $en['hostel_intro']; ?></p>
        </section>

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

        <form action="<?php echo site_url('feedback/submit_hostel'); ?>" method="POST">
            <!-- Program Context Header (V2 Functionality) -->
            <div style="background: #f8fafc; padding: 20px; border: 1px dashed #cbd5e1; border-radius: 8px; margin-bottom: 30px;">
                <div class="form-group" style="margin-bottom: 15px;">
                    <label style="font-weight: 700; color: #1e293b;">प्रशिक्षण कार्यक्रम् / Training Program:</label>
                    <input type="text" name="training_program" class="form-control" readonly value="<?php echo isset($cal) ? $cal->training_name : ''; ?>" style="background: transparent; border: none; border-bottom: 2px solid #3b82f6; font-weight: 800; font-size: 16px; color: #1e3a8a;">
                </div>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 20px;">
                    <div class="form-group">
                        <label style="font-size: 12px; color: #64748b;">Program ID</label>
                        <input type="text" name="program_id" class="form-control" readonly value="<?php echo isset($cal) ? $cal->program_id : ''; ?>" style="background: transparent; border: none; border-bottom: 1px solid #ccc; font-size: 13px;">
                    </div>
                    <div class="form-group">
                        <label style="font-size: 12px; color: #64748b;">From Date</label>
                        <input type="text" class="form-control" readonly value="<?php echo isset($cal) ? date('d M Y', strtotime($cal->start_date)) : ''; ?>" style="background: transparent; border: none; border-bottom: 1px solid #ccc; font-size: 13px;">
                    </div>
                    <div class="form-group">
                        <label style="font-size: 12px; color: #64748b;">To Date</label>
                        <input type="text" class="form-control" readonly value="<?php echo isset($cal) ? date('d M Y', strtotime($cal->end_date)) : ''; ?>" style="background: transparent; border: none; border-bottom: 1px solid #ccc; font-size: 13px;">
                    </div>
                    <div class="form-group">
                        <label style="font-size: 12px; color: #64748b;">Duration</label>
                        <input type="text" name="duration" class="form-control" readonly value="<?php echo isset($cal) ? $cal->duration . ' Days' : ''; ?>" style="background: transparent; border: none; border-bottom: 1px solid #ccc; font-weight: 700; color: #3b82f6;">
                    </div>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                <div class="form-group">
                    <label>नाम / <?php echo $en['name']; ?>:</label>
                    <input type="text" name="name" class="form-control" required placeholder="Enter name...">
                </div>
                <div class="form-group">
                    <label>पदनाम / <?php echo $en['designation']; ?>:</label>
                    <input type="text" name="designation" class="form-control" required placeholder="Enter designation...">
                </div>
                <div class="form-group">
                    <label>पहचान सं. / <?php echo $en['id_no']; ?>:</label>
                    <input type="text" name="id_no" class="form-control" placeholder="Enter ID...">
                </div>
            </div>

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th><?php echo $hi['sl_no']; ?><br><?php echo $en['sl_no']; ?></th>
                            <th><?php echo $hi['description']; ?><br><?php echo $en['description']; ?></th>
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
                        <?php for($i=1; $i<=7; $i++): ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td>
                                <div class="bilingual-label">
                                    <span class="hindi"><?php echo $hi['hostel_q'.$i]; ?></span>
                                    <span class="english"><?php echo $en['hostel_q'.$i]; ?></span>
                                </div>
                            </td>
                            <td style="text-align: center;">5</td>
                            <td><input type="number" name="q<?php echo $i; ?>" class="form-control rating-input" min="1" max="5" required></td>
                        </tr>
                        <?php endfor; ?>

                        <tr>
                            <td colspan="4" style="background-color: #f1f1f1; font-weight: bold; text-align: center;">
                                <?php echo $hi['hostel_food_quality']; ?> / <?php echo $en['hostel_food_quality']; ?>
                            </td>
                        </tr>

                        <?php for($i=8; $i<=10; $i++): ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td>
                                <div class="bilingual-label">
                                    <span class="hindi"><?php echo $hi['hostel_q'.$i]; ?></span>
                                    <span class="english"><?php echo $en['hostel_q'.$i]; ?></span>
                                </div>
                            </td>
                            <td style="text-align: center;">5</td>
                            <td><input type="number" name="q<?php echo $i; ?>" class="form-control rating-input" min="1" max="5" required></td>
                        </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
            </div>

            <div class="suggestion-box">
                <label><?php echo $hi['suggestion']; ?> / <?php echo $en['suggestion']; ?> :</label>
                <textarea name="suggestion" class="form-control" rows="4"></textarea>
            </div>

            <div class="footer-section">
                <div>
                    <label><?php echo $hi['date']; ?> / <?php echo $en['date']; ?>:</label>
                    <input type="date" name="date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                </div>
                <div style="text-align: center;">
                    <div class="signature-line"></div>
                    <p><?php echo $hi['signature']; ?> / <?php echo $en['signature']; ?></p>
                </div>
            </div>

    <script>
        document.querySelectorAll('input[type="number"]').forEach(input => {
            input.addEventListener('input', function() {
                let val = parseInt(this.value);
                if (val > 5) this.value = 5;
                else if (val < 1 && this.value !== "") this.value = 1;
            });
            input.addEventListener('keydown', function(e) {
                if (['-', '+', 'e', 'E'].includes(e.key)) e.preventDefault();
            });
        });
    </script>

            <div style="margin-top: 40px;">
                <button type="submit" class="btn-submit">Submit Feedback / फीडबैक जमा करें</button>
            </div>
        </form>
    </div>
