<?php
$CI = & get_instance();
$CI->lang->load('feedback', 'english');
$en = $CI->lang->language;
$CI->lang->load('feedback', 'hindi');
$hi = $CI->lang->language;
?>

<div class="glass-card animate-up" style="position: relative;">
    <div style="position: absolute; top: 24px; right: 24px; text-align: right; z-index: 10;">
        <div style="font-size: 10px; color: var(--text-muted); text-transform: uppercase; font-weight: 700; letter-spacing: 1px;">Submitted On / दिनांक</div>
        <div style="font-size: 16px; color: var(--accent); font-weight: 800;"><?php echo date('d M Y', strtotime($feedback->date)); ?></div>
    </div>
    <header>
        <h1 style="font-size: 24px;">हॉस्टल - गेल ट्रेनिंग इंस्टीट्यूट</h1>
        <h1 style="font-size: 24px;">HOSTEL - GAIL Training Institute</h1>
        <h2 style="font-size: 18px; margin-top: 10px;">गेल (INDIA) लिमिटेड / GAIL (India) Limited</h2>
        <h3 style="font-size: 16px; color: var(--text-muted); font-weight: 500;">नोएडा / Noida</h3>
        <hr style="border: none; border-top: 1px solid var(--glass-border); margin: 20px 0;">
        <h2 style="font-size: 20px; color: var(--accent);"><?php echo $hi['hostel_title']; ?></h2>
        <h2 style="font-size: 20px; color: var(--accent);"><?php echo $en['hostel_title']; ?></h2>
        <p style="font-size: 14px; margin-top: 5px;"><?php echo $hi['hostel_subtitle']; ?> / <?php echo $en['hostel_subtitle']; ?></p>
    </header>

    <div style="background: rgba(255,255,255,0.03); padding: 20px; border-radius: 12px; margin-bottom: 30px; border-left: 4px solid var(--accent); font-size: 14px;">
        <p><strong><?php echo $hi['dear_colleague']; ?> / <?php echo $en['dear_colleague']; ?></strong></p>
        <p style="margin-top: 8px;"><?php echo $hi['hostel_intro']; ?></p>
        <p><?php echo $en['hostel_intro']; ?></p>
    </div>

    <div style="background: rgba(99, 102, 241, 0.03); padding: 20px; border-radius: 12px; margin-bottom: 25px; border: 1px dashed var(--accent-glow);">
        <div class="form-group">
            <label>Training Program / प्रशिक्षण कार्यक्रम</label>
            <input type="text" class="form-control" readonly value="<?php echo $feedback->training_program; ?>" style="background: transparent; font-weight: 700; color: var(--accent);">
        </div>
        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px;">
            <div class="form-group">
                <label>Program ID</label>
                <input type="text" class="form-control" readonly value="<?php echo $feedback->program_id; ?>" style="background: transparent;">
            </div>
            <div class="form-group">
                <label>Submitted By</label>
                <input type="text" class="form-control" readonly value="<?php echo $feedback->name; ?> (<?php echo $feedback->id_no; ?>)" style="background: transparent; font-weight: 700;">
            </div>
        </div>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th style="width: 50px;">#</th>
                    <th>Description / विवरण</th>
                    <th style="width: 120px; text-align: center;">Rating (1-5)</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 1; $i <= 7; $i++): ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td>
                        <div style="font-size: 13px; color: #fff;"><?php echo $hi['hostel_q' . $i]; ?></div>
                        <div style="font-size: 11px; color: var(--text-muted);"><?php echo $en['hostel_q' . $i]; ?></div>
                    </td>
                    <td><input type="text" class="form-control" style="text-align: center; background: rgba(59, 130, 246, 0.1); border-color: var(--accent); color: var(--accent); font-weight: 900;" readonly value="<?php echo $feedback->{'q'.$i}; ?>"></td>
                </tr>
                <?php endfor; ?>

                <tr>
                    <td colspan="3" style="background: rgba(255,255,255,0.05); padding: 12px; font-weight: 700; text-align: center; color: var(--accent);">
                        <?php echo $hi['hostel_food_quality']; ?> / <?php echo $en['hostel_food_quality']; ?>
                    </td>
                </tr>

                <?php for ($i = 8; $i <= 10; $i++): ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td>
                        <div style="font-size: 13px; color: #fff;"><?php echo $hi['hostel_q' . $i]; ?></div>
                        <div style="font-size: 11px; color: var(--text-muted);"><?php echo $en['hostel_q' . $i]; ?></div>
                    </td>
                    <td><input type="text" class="form-control" style="text-align: center; background: rgba(59, 130, 246, 0.1); border-color: var(--accent); color: var(--accent); font-weight: 900;" readonly value="<?php echo $feedback->{'q'.$i}; ?>"></td>
                </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </div>

    <div class="form-group" style="margin-top: 30px;">
        <label><?php echo $hi['suggestion']; ?> / <?php echo $en['suggestion']; ?></label>
        <textarea class="form-control" rows="3" readonly style="background: rgba(255,255,255,0.03);"><?php echo $feedback->suggestion; ?></textarea>
    </div>

    <div style="margin-top: 40px; text-align: center; opacity: 0.6;">
        <p style="font-size: 12px; color: var(--text-muted);">This is a read-only view of the submitted feedback.</p>
    </div>
</div>
