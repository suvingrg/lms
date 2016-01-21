  <div class="mini-container">
      <h2>VIEW FOLLOW UP</h2>
      <table>
        <thead>
          <td>Follow Up ID</td>
          <td>Lead ID</td>
          <td>Lead Name</td>
          <td>Counsellor</td>
          <td>Status</td>
          <td>Feedback</td>
          <td>Next Follow Up</td>
        </thead>
        <tbody>
          <?php foreach ($followups as $followup) { ?>
              <tr>
                  <td><?php if (isset($followup->f_id)) echo htmlspecialchars($followup->f_id, ENT_QUOTES, 'UTF-8'); ?></td>
                  <td><?php if (isset($followup->l_id)) echo htmlspecialchars($followup->l_id, ENT_QUOTES, 'UTF-8'); ?></td>
                  <td><?php if (isset($followup->l_name)) echo htmlspecialchars($followup->l_name, ENT_QUOTES, 'UTF-8'); ?></td>
                  <td><?php if (isset($followup->c_name)) echo htmlspecialchars($followup->c_name, ENT_QUOTES, 'UTF-8'); ?></td>
                  <td><?php if (isset($followup->status)) echo htmlspecialchars($followup->status, ENT_QUOTES, 'UTF-8'); ?></td>
                  <td><?php if (isset($followup->feedback)) echo htmlspecialchars($followup->feedback, ENT_QUOTES, 'UTF-8'); ?></td>
                  <td><p id="fdate"><?php if (isset($followup->next_followup)) echo htmlspecialchars($followup->next_followup, ENT_QUOTES, 'UTF-8'); ?></p></td>
              </tr>
          <?php } ?>
        </tbody>
      </table><br>
      <a href="<?php echo URL; ?>leads/index"><button type="button">Back</button></a>
  </div>

</div> <!-- container ends -->
