<?php 
if(isset($this->session->userdata['logged_in'])):

    $username = $this->session->userdata['logged_in']['username'];
?>
<div class="tile-row">
    <div class="col-md-6">
        <div class="card row waves-effect effect changepass" pageid="<?php echo $username; ?>">
            <div class="card-header">
                <h2>Wachtwoord veranderen</h2>
                <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<?php endif; ?>