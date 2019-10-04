<div class="badan" style="background-image: linear-gradient(120deg, #B55EBC 0%, #5B33A6 100%);background-size:cover;min-height:695px;padding-top:300px">
<div class="container">
<div class="ke2">
<form method="post" action="<?php echo site_url(); ?>main/register">
    <select name="jurusan" id="prodi" class="form-control">
        <?php foreach ($jurusan->result() as $aw) { ?>
            <option value="<?php echo $aw->jurusan; ?>"><?php echo $aw->jurusan; ?></option>
        <?php } ?>
    </select>
    <input type=submit style="margin-top:20px">
</form>
</div></div>