<header class="animate-up">
    <h1>System Reports </h1>
    <h2>Consolidated Analytics & Filters</h2>
</header>

<div class="glass-card animate-up" style="margin-bottom: 30px;">
    <form method="get" action="<?php echo site_url('feedbackv2/reports'); ?>">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 15px; align-items: end;">
            <div class="form-group" style="margin-bottom: 0;">
                <label>Program Name</label>
                <select name="program_name" class="form-control select2-search" style="width: 100%;">
                    <option value="">All</option>
                    <?php if (!empty($available_programs)): ?>
                        <?php foreach ($available_programs as $prog): ?>
                            <option value="<?php echo htmlspecialchars($prog); ?>" <?php echo (isset($filters['program_name']) && $filters['program_name'] == $prog) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($prog); ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
            <div class="form-group" style="margin-bottom: 0;">
                <label>Date From</label>
                <input type="date" name="date_from" class="form-control" value="<?php echo isset($filters['date_from']) ? $filters['date_from'] : ''; ?>">
            </div>
            <div class="form-group" style="margin-bottom: 0;">
                <label>Date To</label>
                <input type="date" name="date_to" class="form-control" value="<?php echo isset($filters['date_to']) ? $filters['date_to'] : ''; ?>">
            </div>
            <div class="form-group" style="margin-bottom: 0;">
                <label>Coordinator</label>
                <input type="text" name="coordinator" class="form-control" placeholder="Name..." value="<?php echo isset($filters['coordinator']) ? $filters['coordinator'] : ''; ?>">
            </div>
            <div style="display: flex; gap: 8px;">
                <button type="submit" class="btn-primary" style="margin-top: 0; flex: 2;">Filter</button>
                <a href="<?php echo site_url('feedbackv2/reports'); ?>" class="btn-primary" style="margin-top: 0; background: var(--text-muted); text-decoration: none; flex: 1;">✕</a>
            </div>
        </div>
    </form>
</div>

<div class="stats-grid animate-up" style="margin-bottom: 30px; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));">

    <div class="stat-card" style="border-bottom: 3px solid var(--success);">
        <div class="stat-label">Overall Training Evaluation / प्रशिक्षण मूल्यांकन</div>
        <div class="stat-value" style="color: var(--success);"><?php echo number_format($training_overall_avg, 1); ?><span style="font-size: 14px; color: var(--text-muted);">/100</span></div>
        <div class="stat-trend">Based on <?php echo count($recent_training); ?> entries</div>
    </div>
    <div class="stat-card" style="border-bottom: 3px solid #6366f1;">
        <div class="stat-label">Overall Programme / कार्यक्रम रेटिंग</div>
        <div class="stat-value" style="color: #6366f1; font-size: 28px;"><?php echo number_format($prog_section_avg, 1); ?><span style="font-size: 14px; color: var(--text-muted);">/70</span></div>
        <div class="stat-trend">Rating of Programme</div>
    </div>
    <div class="stat-card" style="border-bottom: 3px solid #ec4899;">
        <div class="stat-label">Trainers of Faculty / संकाय रेटिंग</div>
        <div class="stat-value" style="color: #ec4899; font-size: 28px;"><?php echo number_format($faculty_section_avg, 1); ?><span style="font-size: 14px; color: var(--text-muted);">/30</span></div>
        <div class="stat-trend">Rating of Trainer</div>
    </div>
    <div class="stat-card" style="border-bottom: 3px solid var(--accent);">
        <div class="stat-label">Hoste / हॉस्टल रेटिंग</div>
        <div class="stat-value" style="color: var(--accent);"><?php echo number_format($hostel_overall_avg, 1); ?><span style="font-size: 14px; color: var(--text-muted);">/5</span></div>
        <div class="stat-trend">Based on <?php echo count($recent_hostel); ?> entries</div>
    </div>
</div>

<div class="glass-card animate-up" style="margin-bottom: 30px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h3 style="color: var(--primary);">Filtered Hostel Feedback</h3>
        <!-- <a href="<?php echo site_url('feedbackv2/hostel'); ?>" class="badge badge-accent" style="text-decoration: none;">+ NEW ENTRY</a> -->
    </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Program / ID</th>
                    <th>Name / ID No</th>
                    <th>Avg Rating</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($recent_hostel as $row):
                    $avg = ($row->q1 + $row->q2 + $row->q3 + $row->q4 + $row->q5 + $row->q6 + $row->q7 + $row->q8 + $row->q9 + $row->q10) / 10;
                ?>
                    <tr>
                        <td>
                            <div style="color: var(--accent); font-weight: 600;"><?php echo ($row->training_program) ? $row->training_program : 'N/A'; ?></div>
                            <div style="font-size: 11px; color: var(--text-muted);">ID: <?php echo $row->program_id; ?></div>
                        </td>
                        <td>
                            <div style="color: var(--primary); font-weight: 600;"><?php echo $row->name; ?></div>
                            <div style="font-size: 11px; color: var(--text-muted);"><?php echo $row->id_no; ?></div>
                        </td>
                        <td><a href="<?php echo site_url('feedbackv2/view_hostel/'.$row->id); ?>" style="text-decoration: none;"><span class="badge <?php echo ($avg >= 4) ? 'badge-success' : 'badge-accent'; ?>"><?php echo number_format($avg, 1); ?>/5</span></a></td>
                        <td style="color: var(--text-muted); font-size: 11px;"><?php echo date('M d, Y', strtotime($row->date)); ?></td>
                    </tr>
                <?php
                endforeach; ?>
                <?php if (empty($recent_hostel)): ?>
                    <tr>
                        <td colspan="4" style="text-align: center; color: var(--text-muted);">No records found matching filters</td>
                    </tr>
                <?php
                endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="glass-card animate-up" style="animation-delay: 0.1s;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h3 style="color: var(--primary);">Filtered Training Evaluations</h3>
        <!-- <a href="<?php echo site_url('feedbackv2/training'); ?>" class="badge badge-success" style="text-decoration: none;">+ NEW ENTRY</a> -->
    </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Training Program</th>
                    <th>Instructor / Coord.</th>
                    <th>Participant</th>
                    <th>Prog. Rating (70)</th>
                    <th>Faculty Rating (30)</th>
                    <th>Total (100)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($recent_training as $row):
                    $p_score = $row->t_q1 + $row->t_q2 + $row->t_q3 + $row->t_q4 + $row->t_q5;
                    $f_score = $row->f_q1 + $row->f_q2 + $row->f_q3;
                    $total = $p_score + $f_score;
                ?>
                    <tr>
                        <td>
                            <div style="color: var(--primary); font-weight: 700;"><?php echo ($row->prog_name) ? $row->prog_name : 'N/A'; ?></div>
                            <div style="font-size: 11px; color: var(--text-muted);">ID: <?php echo $row->program_id; ?></div>
                        </td>
                        <td>
                            <div style="color: var(--primary); font-weight: 500; font-size: 13px;"><?php echo $row->conducted_by; ?></div>
                            <div style="font-size: 11px; color: var(--text-muted);">Coord: <?php echo $row->coordinator; ?></div>
                        </td>
                        <td>
                            <div style="color: var(--primary); font-weight: 600;"><?php echo $row->participant_name; ?></div>
                            <div style="font-size: 11px; color: var(--text-muted);">CPF: <?php echo $row->cpf_no; ?></div>
                        </td>
                        <td>
                            <div style="font-weight: 700; color: #6366f1;"><?php echo $p_score; ?> <span style="font-size: 11px; color: var(--text-muted);">/ 70</span></div>
                        </td>
                        <td>
                            <div style="font-weight: 700; color: #ec4899;"><?php echo $f_score; ?> <span style="font-size: 11px; color: var(--text-muted);">/ 30</span></div>
                        </td>
                        <td>
                            <a href="<?php echo site_url('feedbackv2/view_training/'.$row->id); ?>" style="text-decoration: none;"><div style="font-weight: 900; color: var(--success); font-size: 16px;"><?php echo $total; ?> <span style="font-size: 11px; color: var(--text-muted);">/ 100</span></div></a>
                        </td>
                    </tr>
                <?php
                endforeach; ?>
                <?php if (empty($recent_training)): ?>
                    <tr>
                        <td colspan="6" style="text-align: center; color: var(--text-muted);">No records found matching filters</td>
                    </tr>
                <?php
                endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.select2-search').select2();
    });
</script>