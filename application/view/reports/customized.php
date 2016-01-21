<div class="mini-container">
  <h2>Customized Report</h2>
  <form action="<?php echo URL; ?>reports/customizedreport" method="POST">
    <label>Counsellor</label>
    <select name="c_name">
      <?php foreach ($counsellors as $counsellor) { ?>
        <option value="<?php echo $counsellor->c_name; ?>"><?php echo $counsellor->c_name; ?></option>
      <?php } ?>
    </select><br><br>
    <label>Date</label>
    <input type="text" name="dated" placeholder="YYYY-MM-DD" /><br><br>
    <label>Semester</label>
    <select name="semester">
      <option value="first" selected="true">first</option>
      <option value="second">second</option>
      <option value="third">third</option>
      <option value="fourth">fourth</option>
      <option value="fifth">fifth</option>
      <option value="final">final</option>
    </select><br><br>
  <input type="submit" name="done" value="Select" />

  </form>
  </select>

  <table>
    <thead>
      <td>Lead ID</td>
      <td>Name</td>
      <td>Address</td>
      <td>Contact No.</td>
      <td>Counsellor</td>
      <td>Status</td>
      <td>Next Follow Up</td>
      <td>Semester</td>
    </thead>
    <tbody>
      <?php foreach ($leads as $lead) { ?>
          <tr>
              <td><?php if (isset($lead->l_id)) echo htmlspecialchars($lead->l_id, ENT_QUOTES, 'UTF-8'); ?></td>
              <td><?php if (isset($lead->l_name)) echo htmlspecialchars($lead->l_name, ENT_QUOTES, 'UTF-8'); ?></td>
              <td><?php if (isset($lead->address)) echo htmlspecialchars($lead->address, ENT_QUOTES, 'UTF-8'); ?></td>
              <td><?php if (isset($lead->contact)) echo htmlspecialchars($lead->contact, ENT_QUOTES, 'UTF-8'); ?></td>
              <td><?php if (isset($lead->c_name)) echo htmlspecialchars($lead->c_name, ENT_QUOTES, 'UTF-8'); ?></td>
              <td><?php if (isset($lead->status)) echo htmlspecialchars($lead->status, ENT_QUOTES, 'UTF-8'); ?></td>
              <td><p id="fdate"><?php if (isset($lead->next_followup)) echo htmlspecialchars($lead->next_followup, ENT_QUOTES, 'UTF-8'); ?></p></td>
              <td><?php if (isset($lead->semester)) echo htmlspecialchars($lead->semester, ENT_QUOTES, 'UTF-8'); ?></td>
          </tr>
      <?php } ?>
    </tbody>
  </table><br>
  <a href="<?php echo URL; ?>top/index"><button type="button">Back</button></a>
</div>

</div> <!-- container ends -->
