<?php echo $this->session->flashdata('msg'); ?>

<div class="tablelayout">
    <h3>Gebruikers overzicht</h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Naam</th>
                <th>Rang</th>
                <th>Status</th>
                <th>Acties</th>
            </tr>
            </thead>
            <tbody id="tablebody">
            <?php foreach ($records as $row):

            if($row->status === '1')
            {
                $status = 'Geactiveerd';
            }
            elseif($row->status === '0')
            {
                $status = 'Niet geactiveerd';
            }
            else
            {
                $status = 'Onbekend';
            }

            if($row->auth === 'admin')
            {
                $auth = 'Beheerder';
            }
            elseif($row->auth === 'mod')
            {
                $auth = 'Trainer';
            }
            else
            {
                $auth = 'Standaard';
            }

                ?>



                <tr>
                    <td><?= $row->username ?></td>
                    <td><?= $auth ?></td>
                    <td><?= $status ?></td>
                    <td><a href="edituser/<?= $row->id ?>"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a> &nbsp; <a href="deleteuser/<?= $row->id ?>" onclick="return confirm_alert(<?= $row->id ?>);" ><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                </tr>
            <?php
                endforeach;
            ?>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    function confirm_alert(id) {
        return confirm("Weet u dit zeker?\nDit is niet terug te draaien.");
    }
</script>
