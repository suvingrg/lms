
  <div class="dashboard">
    <h2>Counsellor Dashboard</h2>
    <ul>
      <li><a href="<?php echo URL . 'leads/add/' . htmlspecialchars($lead->id, ENT_QUOTES, 'UTF-8'); ?>">Add Leads</a></li>
      <li><a href="<?php echo URL . 'leads/view/' . htmlspecialchars($lead->id, ENT_QUOTES, 'UTF-8'); ?>">View / Update Leads</a></li>
      <li><a href="">Follow Up Lead</a></li>
    </ul>
  </div>

</div> <!-- container ends -->
