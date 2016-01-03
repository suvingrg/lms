
  <div class="mini-container">
    <h2>ADD LEAD</h2>
    <form action="<?php echo URL; ?>leads/add" method="POST">
        <table>
          <thead>
            <td><label>Name</label></td>
            <td><label>Address</label></td>
            <td><label>Contact No.</label></td>
            <td><label>Status</label></td>
            <td><label>Next Follow Up</label></td>
          </thead>
          <tbody id='records'>
            <tr>
              <td><input type="text" name="l_name" required /></td>
              <td><input type="text" name="address" required /></td>
              <td><input type="text" name="contact" required /></td>
              <td>
                <select class="" name="status">
                  <option value="">Active</option>
                  <option value="">Expired</option>
                  <option value="">Postponed</option>
                  <option value="">Dismissed</option>
                </select>
              </td>
              <td><input type="text" name="next_followup" required /></td>
            </tr>
          </tbody>
        </table>
        <br>
        <input type="submit" name="submit_add_lead" value="Done" />
        <button type="button" id="addmore">Add More</button>
        <a href="#"><button type="button" name="back">Back</button></a>
    </form>
  </div>

</div> <!-- container ends -->
