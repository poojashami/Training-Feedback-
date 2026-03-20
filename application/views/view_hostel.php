<?php
// Load both languages for bilingual display
$CI =& get_instance();
$CI->lang->load('feedback', 'english');
$en = $CI->lang->language;
$CI->lang->load('feedback', 'hindi');
$hi = $CI->lang->language;
?>

<div style="max-width: 900px; margin: 0 auto; background: #fff; padding: 20px; border-radius: 8px;">
    <header>
        <h1>हॉस्टल - गेल ट्रेनिंग इंस्टीट्यूट</h1>
        <h1>HOSTEL - GAIL Training Institute</h1>
        <h2>गेल (INDIA) लिमिटेड / GAIL (India) Limited</h2>
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

    <!-- Program Context Header -->
    <div style="background: #f8fafc; padding: 20px; border: 1px dashed #cbd5e1; border-radius: 8px; margin-bottom: 30px;">
        <div class="form-group" style="margin-bottom: 15px;">
            <label style="font-weight: 700; color: #1e293b;">प्रशिक्षण कार्यक्रम् / Training Program:</label>
            <input type="text" class="form-control" readonly value="<?php echo $feedback->training_program; ?>" style="background: transparent; border: none; border-bottom: 2px solid #3b82f6; font-weight: 800; font-size: 16px; color: #1e3a8a;">
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
            <div class="form-group">
                <label style="font-size: 12px; color: #64748b;">Program ID</label>
                <input type="text" class="form-control" readonly value="<?php echo $feedback->program_id; ?>" style="background: transparent; border: none; border-bottom: 1px solid #ccc; font-size: 13px;">
            </div>
            <div class="form-group">
                <label style="font-size: 12px; color: #64748b;">Submitted On</label>
                <input type="text" class="form-control" readonly value="<?php echo date('d M Y', strtotime($feedback->date)); ?>" style="background: transparent; border: none; border-bottom: 1px solid #ccc; font-size: 13px;">
            </div>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-bottom: 30px;">
        <div class="form-group">
            <label>नाम / <?php echo $en['name']; ?>:</label>
            <input type="text" class="form-control" readonly value="<?php echo $feedback->name; ?>" style="background: transparent; border: none; border-bottom: 1px solid #ccc;">
        </div>
        <div class="form-group">
            <label>पदनाम / <?php echo $en['designation']; ?>:</label>
            <input type="text" class="form-control" readonly value="<?php echo $feedback->designation; ?>" style="background: transparent; border: none; border-bottom: 1px solid #ccc;">
        </div>
        <div class="form-group">
            <label>पहचान सं. / <?php echo $en['id_no']; ?>:</label>
            <input type="text" class="form-control" readonly value="<?php echo $feedback->id_no; ?>" style="background: transparent; border: none; border-bottom: 1px solid #ccc;">
        </div>
    </div>

    <div class="table-responsive">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="border: 1px solid #ddd; padding: 10px; background: #f8f9fa;">#</th>
                    <th style="border: 1px solid #ddd; padding: 10px; background: #f8f9fa;">Description / विवरण</th>
                    <th style="border: 1px solid #ddd; padding: 10px; background: #f8f9fa; text-align: center;">Rating (1-5)</th>
                </tr>
            </thead>
            <tbody>
                <?php for($i=1; $i<=7; $i++): ?>
                <tr>
                    <td style="border: 1px solid #ddd; padding: 10px;"><?php echo $i; ?></td>
                    <td style="border: 1px solid #ddd; padding: 10px;">
                        <div class="bilingual-label">
                            <span class="hindi" style="display: block; font-size: 13px;"><?php echo $hi['hostel_q'.$i]; ?></span>
                            <span class="english" style="display: block; font-size: 11px; color: #666;"><?php echo $en['hostel_q'.$i]; ?></span>
                        </div>
                    </td>
                    <td style="border: 1px solid #ddd; padding: 10px; text-align: center;"><input type="text" class="form-control" readonly value="<?php echo $feedback->{'q'.$i}; ?>" style="text-align: center; border: 1px solid #3b82f6; background: #eff6ff; color: #1e40af; font-weight: 800; width: 50px; margin: 0 auto;"></td>
                </tr>
                <?php endfor; ?>

                <tr>
                    <td colspan="3" style="border: 1px solid #ddd; background-color: #f1f1f1; font-weight: bold; text-align: center; padding: 10px;">
                        <?php echo $hi['hostel_food_quality']; ?> / <?php echo $en['hostel_food_quality']; ?>
                    </td>
                </tr>

                <?php for($i=8; $i<=10; $i++): ?>
                <tr>
                    <td style="border: 1px solid #ddd; padding: 10px;"><?php echo $i; ?></td>
                    <td style="border: 1px solid #ddd; padding: 10px;">
                        <div class="bilingual-label">
                            <span class="hindi" style="display: block; font-size: 13px;"><?php echo $hi['hostel_q'.$i]; ?></span>
                            <span class="english" style="display: block; font-size: 11px; color: #666;"><?php echo $en['hostel_q'.$i]; ?></span>
                        </div>
                    </td>
                    <td style="border: 1px solid #ddd; padding: 10px; text-align: center;"><input type="text" class="form-control" readonly value="<?php echo $feedback->{'q'.$i}; ?>" style="text-align: center; border: 1px solid #3b82f6; background: #eff6ff; color: #1e40af; font-weight: 800; width: 50px; margin: 0 auto;"></td>
                </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </div>

    <div class="suggestion-box" style="margin-top: 30px; border-top: 2px solid #3b82f6; padding-top: 20px;">
        <label style="font-weight: 700; color: #1e3a8a;"><?php echo $hi['suggestion']; ?> / <?php echo $en['suggestion']; ?> :</label>
        <p style="margin-top: 10px; padding: 15px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 4px;"><?php echo nl2br(htmlspecialchars($feedback->suggestion)); ?></p>
    </div>

    <div style="margin-top: 40px; text-align: center; color: #64748b; font-size: 12px; border-top: 1px solid #eee; padding-top: 20px;">
        <p>Read-only summary of submitted hostel feedback.</p>
    </div>
</div>
