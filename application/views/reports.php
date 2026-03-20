<header>
    <h1>Feedback Reports</h1>
    <h2>Consolidated Analysis & Filters</h2>
</header>

<div class="container" style="padding: 24px; margin-bottom: 30px; border: 1px solid var(--border); box-shadow: none;">
    <form method="get" action="<?php echo site_url('feedback/reports'); ?>">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; align-items: end;">
            <div class="form-group">
                <label>Program Name</label>
                <select name="program_name" class="form-control select2-v1" style="width: 100%;">
                    <option value="">All</option>
                    <?php if(!empty($available_programs)): ?>
                        <?php foreach($available_programs as $prog): ?>
                            <option value="<?php echo htmlspecialchars($prog); ?>" <?php echo (isset($filters['program_name']) && $filters['program_name'] == $prog) ? 'selected' : ''; ?>><?php echo htmlspecialchars($prog); ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Date From</label>
                <input type="date" name="date_from" class="form-control" value="<?php echo $filters['date_from']; ?>">
            </div>
            <div class="form-group">
                <label>Date To</label>
                <input type="date" name="date_to" class="form-control" value="<?php echo $filters['date_to']; ?>">
            </div>
            <div class="form-group">
                <label>Coordinator</label>
                <input type="text" name="coordinator" class="form-control" placeholder="Search name..." value="<?php echo $filters['coordinator']; ?>">
            </div>
            <div style="display: flex; gap: 8px;">
                <button type="submit" class="btn-submit" style="width: auto; padding: 10px 20px; font-size: 14px;">Filter</button>
                <a href="<?php echo site_url('feedback/reports'); ?>" class="btn-submit" style="width: auto; padding: 10px 15px; font-size: 14px; background: #6c757d; text-decoration: none; text-align: center;">✕</a>
            </div>
        </div>
    </form>
</div>

<div class="stats-grid" style="margin-bottom: 40px;">
    <div class="stat-card" style="background: #fcfdfe;">
        <div class="stat-label">Hostel Avg Rating</div>
        <div class="stat-value" style="color: var(--accent);"><?php echo number_format($hostel_overall_avg, 1); ?>/5</div>
        <div class="stat-trend"><?php echo count($recent_hostel); ?> entries</div>
    </div>
    <div class="stat-card" style="background: #fdfcfe;">
        <div class="stat-label">Overall Training Score</div>
        <div class="stat-value" style="color: var(--success);"><?php echo number_format($training_overall_avg, 1); ?>/100</div>
        <div class="stat-trend"><?php echo count($recent_training); ?> entries</div>
    </div>
    <div class="stat-card" style="background: #f8fafc;">
        <div class="stat-label">Programme Avg</div>
        <div class="stat-value" style="font-size: 24px; color: var(--accent);"><?php echo number_format($prog_section_avg, 1); ?>/70</div>
    </div>
    <div class="stat-card" style="background: #f8fafc;">
        <div class="stat-label">Faculty Avg</div>
        <div class="stat-value" style="font-size: 24px; color: var(--secondary);"><?php echo number_format($faculty_section_avg, 1); ?>/30</div>
    </div>
</div>

<div class="report-section">
    <h3 style="margin: 30px 0 15px; border-left: 5px solid var(--accent); padding-left: 10px;">Filtered Hostel Feedback</h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Program</th>
                    <th>Name / ID</th>
                    <th>Avg Rating</th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($recent_hostel)): ?>
                    <tr><td colspan="4" style="text-align: center; padding: 20px;">No records found</td></tr>
                <?php else: ?>
                    <?php foreach($recent_hostel as $row): 
                        $avg = ($row->q1 + $row->q2 + $row->q3 + $row->q4 + $row->q5 + $row->q6 + $row->q7 + $row->q8 + $row->q9 + $row->q10) / 10;
                    ?>
                        <tr>
                            <td><?php echo date('d M Y', strtotime($row->date)); ?></td>
                            <td style="font-weight: 600; color: var(--accent);"><?php echo $row->training_program; ?></td>
                            <td><?php echo $row->name; ?> (<?php echo $row->id_no; ?>)</td>
                            <td><a href="<?php echo site_url('feedback/view_hostel/'.$row->id); ?>" style="text-decoration: none; color: inherit;"><span style="color: <?php echo ($avg >= 4) ? '#28a745' : '#dc3545'; ?>; font-weight: bold;"><?php echo number_format($avg, 1); ?>/5</span></a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="report-section" style="margin-top: 50px;">
    <h3 style="margin: 0 0 15px; border-left: 5px solid var(--success); padding-left: 10px;">Filtered Training Evaluations</h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Program Details</th>
                    <th>Instructor/Faculty</th>
                    <th>Participant</th>
                    <th>Prog. (70)</th>
                    <th>Faculty (30)</th>
                    <th>Total (100)</th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($recent_training)): ?>
                    <tr><td colspan="7" style="text-align: center; padding: 20px;">No records found</td></tr>
                <?php else: ?>
                    <?php foreach($recent_training as $row): 
                        $p_score = $row->t_q1 + $row->t_q2 + $row->t_q3 + $row->t_q4 + $row->t_q5;
                        $f_score = $row->f_q1 + $row->f_q2 + $row->f_q3;
                        $total = $p_score + $f_score;
                    ?>
                        <tr>
                            <td><?php echo date('d M Y', strtotime($row->date_from)); ?></td>
                            <td>
                                <div style="font-weight: 600; color: var(--primary);"><?php echo $row->prog_name; ?></div>
                                <div style="font-size: 11px; color: var(--text-muted);">ID: <?php echo $row->program_id; ?></div>
                            </td>
                            <td><?php echo $row->conducted_by; ?></td>
                            <td><?php echo $row->participant_name; ?> (<?php echo $row->cpf_no; ?>)</td>
                            <td><?php echo $p_score; ?>/70</td>
                            <td><?php echo $f_score; ?>/30</td>
                            <td style="font-weight: 800; color: var(--accent); font-size: 16px;">
                                <a href="<?php echo site_url('feedback/view_training/'.$row->id); ?>" style="text-decoration: none; color: inherit;"><?php echo $total; ?>/100</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
$(document).ready(function() {
    $('.select2-v1').select2();
});
</script>
