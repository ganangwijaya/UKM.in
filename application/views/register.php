<div class="badan" style="background-image: linear-gradient(120deg, #B55EBC 0%, #5B33A6 100%);background-size:cover;min-height:695px;padding-top:100px">
<div class="container">
<div class="ke2" style="display:block">
    <form method="post" action="<?php echo site_url(); ?>main/daftarakun">
        <input class="input" type="text" name="nim" placeholder="nim" required><br>
        <input class="input" type="password" name="password" placeholder="password" required><br>
        <input class="input" type="text" name="nama" placeholder="nama" required><br>
        <input class="input" type="text" name="no_telpon" placeholder="no telpon" required><br>
        <select name="prodi" id="prodi" class="form-control">
            <?php foreach ($prodi->result() as $aw) { ?>
                <option><?php echo $aw->prodi; ?></option>
            <?php } ?>
        </select>
        <input type="hidden" name="jurusan" value="<?php echo $jurusan_pilih; ?>"><br>
        <select name="angkatan" class="form-control">
            <option>2018</option>
            <option>2017</option>
            <option>2016</option>
        </select><br>
        <input type="submit" value="submit">
    </form>
    </div>

</div>
</div>

