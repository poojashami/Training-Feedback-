<?php
$CI = &get_instance();
$CI->lang->load('feedback', 'english');
$en = $CI->lang->language;
$CI->lang->load('feedback', 'hindi');
$hi = $CI->lang->language;

$p_total = $evaluation->t_q1 + $evaluation->t_q2 + $evaluation->t_q3 + $evaluation->t_q4 + $evaluation->t_q5;
$f_total = $evaluation->f_q1 + $evaluation->f_q2 + $evaluation->f_q3;
?>

<div class="glass-card animate-up" style="position: relative;">
    <div style="position: absolute; top: 24px; right: 24px; text-align: right; z-index: 10;">
        <div style="font-size: 10px; color: var(--text-muted); text-transform: uppercase; font-weight: 700; letter-spacing: 1px;">Submitted On / दिनांक</div>
        <div style="font-size: 16px; color: var(--accent); font-weight: 800;"><?php echo date('d M Y', strtotime($evaluation->date_from)); ?></div>
    </div>
    <header>
        <h1 style="font-size: 24px;">गेल प्रशिक्षण संस्थान, नोएडा</h1>
        <h1 style="font-size: 24px;">GAIL TRAINING INSTITUTE</h1>
        <h2 style="font-size: 20px; color: var(--accent); margin-top: 10px;">प्रशिक्षण मूल्यांकन प्रपत्र</h2>
        <h2 style="font-size: 20px; color: var(--accent);">Training Evaluation Form</h2>
    </header>

    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px; margin-top: 30px;">
        <div class="form-group">
            <label><?php echo $hi['prog_name']; ?> / <?php echo $en['prog_name']; ?></label>
            <input type="text" class="form-control" readonly value="<?php echo $evaluation->prog_name; ?>" style="background: transparent; font-weight: 700; color: var(--accent);">
        </div>
        <div class="form-group">
            <label>Program ID / प्रोग्राम आईडी</label>
            <input type="text" class="form-control" readonly value="<?php echo $evaluation->program_id; ?>" style="background: transparent;">
        </div>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 20px;">
        <div class="form-group">
            <label>प्रारंभ दिनांक / From Date</label>
            <input type="text" class="form-control" readonly value="<?php echo date('d-m-Y', strtotime($evaluation->date_from)); ?>" style="background: transparent;">
        </div>
        <div class="form-group">
            <label>समाप्ति दिनांक / To Date</label>
            <input type="text" class="form-control" readonly value="<?php echo date('d-m-Y', strtotime($evaluation->date_to)); ?>" style="background: transparent;">
        </div>
        <div class="form-group">
            <label><?php echo $hi['duration']; ?> / <?php echo $en['duration']; ?></label>
            <input type="text" class="form-control" readonly style="background: rgba(255,255,255,0.05); font-weight: 700;" value="<?php echo $evaluation->duration; ?>">
        </div>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px;">
        <div class="form-group">
            <label>Coordinator / समन्वयक</label>
            <input type="text" class="form-control" readonly value="<?php echo $evaluation->coordinator; ?>" style="background: transparent;">
        </div>
        <div class="form-group">
            <label><?php echo $hi['conducted_by']; ?> / <?php echo $en['conducted_by']; ?></label>
            <input type="text" class="form-control" readonly value="<?php echo $evaluation->conducted_by; ?>" style="background: transparent; font-weight: 700;">
        </div>
        <div class="form-group">
            <label><?php echo $hi['organization']; ?> / <?php echo $en['organization']; ?></label>
            <input type="text" class="form-control" readonly value="<?php echo $evaluation->organization; ?>" style="background: transparent;">
        </div>
    </div>

    <div class="form-group">
        <label>Location & Room / स्थान और कमरा</label>
        <input type="text" class="form-control" readonly value="<?php echo $evaluation->location_room; ?>" style="background: transparent;">
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
                for ($i = 1; $i <= 5; $i++): ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td>
                            <div style="font-size: 13px; color: var(--primary);"><?php echo $hi['train_q' . $i]; ?></div>
                            <div style="font-size: 11px; color: var(--text-muted);"><?php echo $en['train_q' . $i]; ?></div>
                        </td>
                        <td style="text-align: center; color: var(--text-muted);"><?php echo $pArr[$i - 1]; ?></td>
                        <td><input type="text" class="form-control" style="text-align: center; background: rgba(99, 102, 241, 0.1); border-color: var(--accent); color: var(--accent); font-weight: 900;" readonly value="<?php echo $evaluation->{'t_q'.$i}; ?>"></td>
                    </tr>
                <?php endfor; ?>
                <tr style="background: rgba(99, 102, 241, 0.08); font-weight: 700;">
                    <td colspan="2" style="color: var(--primary);"><?php echo $hi['total']; ?> / Total</td>
                    <td style="text-align: center; color: var(--text-muted);">70</td>
                    <td><input type="text" class="form-control" style="text-align: center; background: transparent; border: none; color: var(--accent); font-weight: 800;" readonly value="<?php echo $p_total; ?>"></td>
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
                <?php for ($i = 1; $i <= 3; $i++): ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td>
                            <div style="font-size: 13px; color: var(--primary);"><?php echo $hi['faculty_q' . $i]; ?></div>
                            <div style="font-size: 11px; color: var(--text-muted);"><?php echo $en['faculty_q' . $i]; ?></div>
                        </td>
                        <td style="text-align: center; color: var(--text-muted);">10</td>
                        <td><input type="text" class="form-control" style="text-align: center; background: rgba(236, 72, 153, 0.1); border-color: var(--secondary); color: var(--secondary); font-weight: 900;" readonly value="<?php echo $evaluation->{'f_q'.$i}; ?>"></td>
                    </tr>
                <?php endfor; ?>
                <tr style="background: rgba(236, 72, 153, 0.08); font-weight: 700;">
                    <td colspan="2" style="color: var(--primary);"><?php echo $hi['total']; ?> / Total</td>
                    <td style="text-align: center; color: var(--text-muted);">30</td>
                    <td><input type="text" class="form-control" style="text-align: center; background: transparent; border: none; color: var(--secondary); font-weight: 800;" readonly value="<?php echo $f_total; ?>"></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="form-group" style="margin-top: 20px;">
        <label>IV. <?php echo $hi['general_remarks']; ?> / <?php echo $en['general_remarks']; ?> :-</label>
        <textarea class="form-control" rows="3" readonly style="background: rgba(255,255,255,0.03);"><?php echo $evaluation->general_remarks; ?></textarea>
    </div>

    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px; margin-top: 20px;">
        <div class="form-group">
            <label><?php echo $hi['name']; ?> / <?php echo $en['name']; ?> :-</label>
            <input type="text" class="form-control" readonly value="<?php echo $evaluation->participant_name; ?>" style="background: transparent; font-weight: 700;">
        </div>
        <div class="form-group">
            <label><?php echo $hi['cpf_no']; ?> :-</label>
            <input type="text" class="form-control" readonly value="<?php echo $evaluation->cpf_no; ?>" style="background: transparent;">
        </div>
    </div>

    <div style="margin-top: 40px; text-align: center; opacity: 0.6;">
        <p style="font-size: 12px; color: var(--text-muted);">This is a read-only view of the submitted evaluation.</p>
    </div>
</div>
