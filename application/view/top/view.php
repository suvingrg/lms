
  <div class="mini-container">
    <div class="view">
      <h2>VIEW / UPDATE COUNSELLOR</h2>
      <table>
        <thead>
          <td>Counsellor ID</td>
          <td>Name</td>
          <td></td>
        </thead>
        <tbody>
          <?php foreach ($counsellors as $counsellor) { ?>
              <tr>
                  <td><?php if (isset($counsellor->c_id)) echo htmlspecialchars($counsellor->c_id, ENT_QUOTES, 'UTF-8'); ?></td>
                  <td><?php if (isset($counsellor->c_name)) echo htmlspecialchars($counsellor->c_name, ENT_QUOTES, 'UTF-8'); ?></td>
                  <td><a href="<?php echo URL . 'top/update/' . htmlspecialchars($counsellor->c_id, ENT_QUOTES, 'UTF-8'); ?>">Update</a></td>
              </tr>
          <?php } ?>
        </tbody>
      </table><br>
      <a href="<?php echo URL; ?>top/index"><button type="button">Back</button></a>
    </div>
  </div>

</div> <!-- container ends -->
