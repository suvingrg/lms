<div class="container">
    <h2>You are in the View: application/view/leads/activeleads.php (everything in this box comes from that file)</h2>
    <!-- add lead form -->
    <div class="box">
        <h3>Active Leads Report</h3>

    <!-- main content output -->
    <div class="box">
        <h3>Active Leads</h3>

        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Id</td>
                <td>Lead Name</td>
                <!-- <td>Follow Ups</td> -->
                <td>Status</td>
                <!-- <td>Counsellor</td> -->
            </tr>
            </thead>
            <tbody>
            <?php foreach ($reports as $lead) { ?>
                <tr>
                    <td><?php if (isset($lead->l_id)) echo htmlspecialchars($lead->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($lead->l_name)) echo htmlspecialchars($lead->artist, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($lead->status)) echo htmlspecialchars($lead->track, ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
