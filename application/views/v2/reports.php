<header class="animate-up">
    <h1>System Reports <sup>V2</sup></h1>
    <h2>Consolidated Analytics Summary</h2>
</header>

<div class="glass-card animate-up" style="margin-bottom: 30px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h3 style="color: #fff;">Recent Hostel Feedback</h3>
        <a href="<?php echo site_url('feedbackv2/hostel'); ?>" class="badge badge-accent" style="text-decoration: none;">+ NEW ENTRY</a>
    </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Name / Designation</th>
                    <th>ID No</th>
                    <th>Avg Rating</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($recent_hostel as $row): 
                    $avg = ($row->q1 + $row->q2 + $row->q3 + $row->q4 + $row->q5 + $row->q6 + $row->q7 + $row->q8 + $row->q9 + $row->q10) / 10;
                ?>
                <tr>
                    <td>
                        <div style="color: #fff; font-weight: 600;"><?php echo $row->name; ?></div>
                        <div style="font-size: 11px; color: var(--text-muted);"><?php echo $row->designation; ?></div>
                    </td>
                    <td><?php echo $row->id_no; ?></td>
                    <td><span class="badge <?php echo ($avg >= 4) ? 'badge-success' : 'badge-accent'; ?>"><?php echo number_format($avg, 1); ?>/5</span></td>
                    <td style="color: var(--text-muted); font-size: 11px;"><?php echo date('M d, Y', strtotime($row->created_at)); ?></td>
                </tr>
                <?php endforeach; ?>
                <?php if(empty($recent_hostel)): ?>
                    <tr><td colspan="4" style="text-align: center; color: var(--text-muted);">No records found</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="glass-card animate-up" style="animation-delay: 0.1s;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h3 style="color: #fff;">Recent Training Evaluations</h3>
        <a href="<?php echo site_url('feedbackv2/training'); ?>" class="badge badge-success" style="text-decoration: none;">+ NEW ENTRY</a>
    </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Module / Instructor</th>
                    <th>Participant</th>
                    <th>Scores (P/F)</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($recent_training as $row): 
                    $p_total = $row->t_q1 + $row->t_q2 + $row->t_q3 + $row->t_q4 + $row->t_q5;
                    $f_total = $row->f_q1 + $row->f_q2 + $row->f_q3;
                    $total = $p_total + $f_total;
                ?>
                <tr>
                    <td>
                        <div style="color: #fff; font-weight: 600;"><?php echo $row->prog_name; ?></div>
                        <div style="font-size: 11px; color: var(--text-muted);"><?php echo $row->conducted_by; ?></div>
                    </td>
                    <td>
                        <div style="color: #fff;"><?php echo $row->participant_name; ?></div>
                        <div style="font-size: 11px; color: var(--text-muted);">CPF: <?php echo $row->cpf_no; ?></div>
                    </td>
                    <td style="font-size: 12px;">
                        <span style="color: var(--accent);">P: <?php echo $p_total; ?>/70</span><br>
                        <span style="color: var(--secondary);">F: <?php echo $f_total; ?>/30</span>
                    </td>
                    <td>
                        <div style="font-weight: 800; color: #fff;"><?php echo $total; ?>/100</div>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if(empty($recent_training)): ?>
                    <tr><td colspan="4" style="text-align: center; color: var(--text-muted);">No records found</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
