<div class="mini-container">
  <h2>Active Leads Report</h2>
  <table>
    <thead>
      <td>Lead ID</td>
      <td>Name</td>
      <td>Address</td>
      <td>Contact No.</td>
      <td>Status</td>
      <td>Next Follow Up</td>
    </thead>
    <tbody>
      <?php foreach ($leads as $lead) { ?>
          <tr>
              <td><?php if (isset($lead->l_id)) echo htmlspecialchars($lead->l_id, ENT_QUOTES, 'UTF-8'); ?></td>
              <td><?php if (isset($lead->l_name)) echo htmlspecialchars($lead->l_name, ENT_QUOTES, 'UTF-8'); ?></td>
              <td><?php if (isset($lead->address)) echo htmlspecialchars($lead->address, ENT_QUOTES, 'UTF-8'); ?></td>
              <td><?php if (isset($lead->contact)) echo htmlspecialchars($lead->contact, ENT_QUOTES, 'UTF-8'); ?></td>

              <td><?php if (isset($lead->status)) echo htmlspecialchars($lead->status, ENT_QUOTES, 'UTF-8'); ?></td>
              <td><?php if (isset($lead->next_followup)) echo htmlspecialchars($lead->next_followup, ENT_QUOTES, 'UTF-8'); ?></td>

          </tr>
      <?php } ?>
    </tbody>
  </table><br>
  <a href="<?php echo URL; ?>top/index"><button type="button">Back</button></a>
</div>

</div> <!-- container ends -->
