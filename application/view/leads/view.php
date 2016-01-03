
  <div class="mini-container">
    <h2>VIEW / UPDATE LEAD</h2>
    <table>
      <thead>
        <td>Lead ID</td>
        <td>Name</td>
        <td>Address</td>
        <td>Contact No.</td>
        <td>Counsellor</td>
        <td>Status</td>
        <td>Next Follow Up</td>
      </thead>
      <tbody>
        <?php foreach ($leads as $lead) { ?>
            <tr>
                <td><?php if (isset($lead->id)) echo htmlspecialchars($lead->id, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($lead->l_name)) echo htmlspecialchars($lead->l_name, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($lead->address)) echo htmlspecialchars($lead->address, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($lead->contact)) echo htmlspecialchars($lead->contact, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><a href="<?php echo URL . 'leads/update/' . htmlspecialchars($lead->id, ENT_QUOTES, 'UTF-8'); ?>">Update</a></td>
            </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

</div> <!-- container ends -->
