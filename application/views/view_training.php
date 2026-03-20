<?php
// Load both languages for bilingual display
$CI =& get_instance();
$CI->lang->load('feedback', 'english');
$en = $CI->lang->language;
$CI->lang->load('feedback', 'hindi');
$hi = $CI->lang->language;

$p_total = $evaluation->t_q1 + $evaluation->t_q2 + $evaluation->t_q3 + $evaluation->t_q4 + $evaluation->t_q5;
$f_total = $evaluation->f_q1 + $evaluation->f_q2 + $evaluation->f_q3;
?>

<div style="max-width: 900px; margin: 0 auto; background: #fff; padding: 20px; border-radius: 8px;">
    <header>
        <h1>गेल प्रशिक्षण संस्थान, नोएडा</h1>
        <h1>GAIL TRAINING INSTITUTE</h1>
        <h2>प्रशिक्षण मूल्यांकन प्रपत्र</h2>
        <h2>Training Evaluation Form</h2>
    </header>

    <!-- Program Context Header -->
    <div style="background: #f8fafc; padding: 20px; border: 1px dashed #cbd5e1; border-radius: 8px; margin-bottom: 30px; margin-top: 20px;">
        <div class="form-group" style="margin-bottom: 15px;">
            <label style="font-weight: 700; color: #1e293b;"><?php echo $hi['prog_name']; ?> / <?php echo $en['prog_name']; ?>:</label>
            <input type="text" class="form-control" readonly value="<?php echo $evaluation->prog_name; ?>" style="background: transparent; border: none; border-bottom: 2px solid #10b981; font-weight: 800; font-size: 16px; color: #065f46;">
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(130px, 1fr)); gap: 15px;">
            <div class="form-group">
                <label style="font-size: 12px; color: #64748b;">Program ID</label>
                <input type="text" class="form-control" readonly value="<?php echo $evaluation->program_id; ?>" style="background: transparent; border: none; border-bottom: 1px solid #ccc; font-size: 13px;">
            </div>
            <div class="form-group">
                <label style="font-size: 12px; color: #64748b;">From / कब से</label>
                <input type="text" class="form-control" readonly value="<?php echo date('d-m-Y', strtotime($evaluation->date_from)); ?>" style="background: transparent; border: none; border-bottom: 1px solid #ccc; font-size: 13px;">
            </div>
            <div class="form-group">
                <label style="font-size: 12px; color: #64748b;">To / कब तक</label>
                <input type="text" class="form-control" readonly value="<?php echo date('d-m-Y', strtotime($evaluation->date_to)); ?>" style="background: transparent; border: none; border-bottom: 1px solid #ccc; font-size: 13px;">
            </div>
            <div class="form-group">
                <label style="font-size: 12px; color: #64748b;">Duration / अवधि</label>
                <input type="text" class="form-control" readonly value="<?php echo $evaluation->duration; ?>" style="background: transparent; border: none; border-bottom: 1px solid #ccc; font-weight: 700; color: #10b981;">
            </div>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        <div class="form-group">
            <label>Coordinator / समन्वयक :</label>
            <input type="text" class="form-control" readonly value="<?php echo $evaluation->coordinator; ?>" style="border-bottom: 2px dotted #ccc; border-top:none; border-left:none; border-right:none; background: transparent;">
        </div>
        <div class="form-group">
            <label><?php echo $hi['conducted_by']; ?> / Faculty / संकाय :</label>
            <input type="text" class="form-control" readonly value="<?php echo $evaluation->conducted_by; ?>" style="border-bottom: 2px dotted #ccc; border-top:none; border-left:none; border-right:none; background: transparent; font-weight: 700;">
        </div>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        <div class="form-group">
            <label><?php echo $hi['organization']; ?> / <?php echo $en['organization']; ?> :</label>
            <input type="text" class="form-control" readonly value="<?php echo $evaluation->organization; ?>" style="border-bottom: 2px dotted #ccc; border-top:none; border-left:none; border-right:none; background: transparent;">
        </div>
        <div class="form-group">
            <label>Location & Room / स्थान और कमरा :</label>
            <input type="text" class="form-control" readonly value="<?php echo $evaluation->location_room; ?>" style="border-bottom: 2px dotted #ccc; border-top:none; border-left:none; border-right:none; background: transparent;">
        </div>
    </div>

    <h4 style="background: #e9ecef; padding: 10px; margin-top: 30px;">I. <?php echo $hi['overall_prog_rating']; ?> / <?php echo $en['overall_prog_rating']; ?>:</h4>
    
    <div class="table-responsive">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="border: 1px solid #ddd; padding: 8px; background: #f8f9fa;">#</th>
                    <th style="border: 1px solid #ddd; padding: 8px; background: #f8f9fa;">Parameters / मापदंड</th>
                    <th style="border: 1px solid #ddd; padding: 8px; background: #f8f9fa; text-align: center;">Max</th>
                    <th style="border: 1px solid #ddd; padding: 8px; background: #f8f9fa; text-align: center;">Score</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $pArr = [20, 20, 15, 10, 5];
                for($i=1; $i<=5; $i++): ?>
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;"><?php echo $i; ?>.</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">
                        <div class="bilingual-label">
                            <span class="hindi" style="display: block; font-size: 13px;"><?php echo $hi['train_q'.$i]; ?></span>
                            <span class="english" style="display: block; font-size: 11px; color: #666;"><?php echo $en['train_q'.$i]; ?></span>
                        </div>
                    </td>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: center; color: #666;"><?php echo sprintf('%02d', $pArr[$i-1]); ?></td>
                    <td style="border: 1px solid #ddd; padding: 8px;"><input type="text" class="form-control" readonly value="<?php echo $evaluation->{'t_q'.$i}; ?>" style="text-align: center; border: 1px solid #10b981; background: #ecfdf5; color: #065f46; font-weight: 800; width: 50px; margin: 0 auto;"></td>
                </tr>
                <?php endfor; ?>
                <tr style="font-weight: bold; background: #f1f5f9;">
                    <td colspan="2" style="border: 1px solid #ddd; padding: 8px;"><?php echo $hi['total']; ?> / Total :</td>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">70</td>
                    <td style="border: 1px solid #ddd; padding: 8px;"><input type="text" class="form-control" readonly value="<?php echo $p_total; ?>" style="text-align: center; border: none; background: transparent; font-weight: 900; color: #065f46; font-size: 16px;"></td>
                </tr>
            </tbody>
        </table>
    </div>

    <h4 style="background: #e9ecef; padding: 10px; margin-top: 30px;">II. <?php echo $hi['trainer_rating']; ?> / <?php echo $en['trainer_rating']; ?>:</h4>

    <div class="table-responsive">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="border: 1px solid #ddd; padding: 8px; background: #f8f9fa;">#</th>
                    <th style="border: 1px solid #ddd; padding: 8px; background: #f8f9fa;">Faculty Criteria / संकाय मानदंड</th>
                    <th style="border: 1px solid #ddd; padding: 8px; background: #f8f9fa; text-align: center;">Max</th>
                    <th style="border: 1px solid #ddd; padding: 8px; background: #f8f9fa; text-align: center;">Score</th>
                </tr>
            </thead>
            <tbody>
                <?php for($i=1; $i<=3; $i++): ?>
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;"><?php echo $i; ?>.</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">
                        <div class="bilingual-label">
                            <span class="hindi" style="display: block; font-size: 13px;"><?php echo $hi['faculty_q'.$i]; ?></span>
                            <span class="english" style="display: block; font-size: 11px; color: #666;"><?php echo $en['faculty_q'.$i]; ?></span>
                        </div>
                    </td>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: center; color: #666;">10</td>
                    <td style="border: 1px solid #ddd; padding: 8px;"><input type="text" class="form-control" readonly value="<?php echo $evaluation->{'f_q'.$i}; ?>" style="text-align: center; border: 1px solid #3b82f6; background: #eff6ff; color: #1e3a8a; font-weight: 800; width: 50px; margin: 0 auto;"></td>
                </tr>
                <?php endfor; ?>
                <tr style="font-weight: bold; background: #f1f5f9;">
                    <td colspan="2" style="border: 1px solid #ddd; padding: 8px;"><?php echo $hi['total']; ?> / Total :</td>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">30</td>
                    <td style="border: 1px solid #ddd; padding: 8px;"><input type="text" class="form-control" readonly value="<?php echo $f_total; ?>" style="text-align: center; border: none; background: transparent; font-weight: 900; color: #1e3a8a; font-size: 16px;"></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="suggestion-box" style="margin-top: 30px;">
        <label>IV. <?php echo $hi['general_remarks']; ?> / <?php echo $en['general_remarks']; ?>:</label>
        <p style="margin-top: 10px; padding: 15px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 4px; min-height: 50px;"><?php echo nl2br(htmlspecialchars($evaluation->general_remarks)); ?></p>
    </div>

    <div style="display: flex; gap: 20px; margin-top: 30px; border-top: 1px solid #eee; padding-top: 20px;">
        <div class="form-group" style="flex: 2;">
            <label><?php echo $hi['name']; ?> / <?php echo $en['name']; ?>:-</label>
            <input type="text" class="form-control" readonly value="<?php echo $evaluation->participant_name; ?>" style="border-bottom: 2px dotted #ccc; border-top:none; border-left:none; border-right:none; background: transparent; font-weight: 700;">
        </div>
        <div class="form-group" style="flex: 1;">
            <label><?php echo $hi['cpf_no']; ?>:-</label>
            <input type="text" class="form-control" readonly value="<?php echo $evaluation->cpf_no; ?>" style="border-bottom: 2px dotted #ccc; border-top:none; border-left:none; border-right:none; background: transparent;">
        </div>
    </div>

    <div style="margin-top: 40px; text-align: center; color: #64748b; font-size: 12px;">
        <p>Read-only summary of submitted training evaluation.</p>
    </div>
</div>
