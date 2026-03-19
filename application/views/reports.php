<header>
    <h1>Feedback Reports</h1>
    <h2>Recent Submissions Summary</h2>
</header>

<div class="report-section">
    <h3 style="margin: 30px 0 15px;">Recent Hostel Feedbacks</h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Participant</th>
                    <th>Roll No</th>
                    <th>Room</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($recent_hostel)): ?>
                    <tr><td colspan="5" style="text-align: center;">No records found</td></tr>
                <?php else: ?>
                    <?php foreach($recent_hostel as $row): ?>
                        <tr>
                            <td><?php echo isset($row->created_at) ? date('d M Y', strtotime($row->created_at)) : 'N/A'; ?></td>
                            <td><?php echo $row->name; ?></td>
                            <td><?php echo $row->roll_no; ?></td>
                            <td><?php echo $row->room_no; ?></td>
                            <td><a href="#" class="nav-item" style="font-size: 11px; padding: 4px 8px;">View Detials</a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="report-section" style="margin-top: 50px;">
    <h3 style="margin: 0 0 15px;">Recent Training Evaluations</h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Employee Name</th>
                    <th>Designation</th>
                    <th>Programme</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($recent_training)): ?>
                    <tr><td colspan="5" style="text-align: center;">No records found</td></tr>
                <?php else: ?>
                    <?php foreach($recent_training as $row): ?>
                        <tr>
                            <td><?php echo isset($row->created_at) ? date('d M Y', strtotime($row->created_at)) : 'N/A'; ?></td>
                            <td><?php echo $row->emp_name; ?></td>
                            <td><?php echo $row->designation; ?></td>
                            <td><?php echo $row->programme_name; ?></td>
                            <td><a href="#" class="nav-item" style="font-size: 11px; padding: 4px 8px;">View Detials</a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div style="margin-top: 40px; text-align: right;">
    <button class="btn-submit" style="width: auto; padding: 12px 24px;">Export to Excel (CSV)</button>
</div>
