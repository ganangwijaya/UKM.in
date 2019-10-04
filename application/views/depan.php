
<!--  HEADER  -->
<div class="headerwrap">
    <div class="container">
        <div class="row centered">
            <h1 class="centered jeda">Buat kegiatan kampusmu jadi lebih nyaman. Yuk daftar!</h1>
            <div class="tombol centered"><a href="<?php echo base_url() ?>main/pilihjurusan">Disini</a></div>
            <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                             <h4 class="modal-title">Pesan</h4>
                        </div>
                        <div class="modal-body">
                            <p><?php echo $this->session->flashdata('error'); ?></p>
                            <p><?php echo $this->session->flashdata('success'); ?></p>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
    </div>
</div>

            

<div class="badan" style="padding-bottom:100px;padding-top:100px">
    <div class="container">
        <h5>Kenapa UKM.in?</h5>       
        <h4>UKM.in merupakan platform digital yang memudahkan pengelolaan dan pengorganisasian unit kegiatan mahasiswa di kampusmu. Mendaftar dan mengabsen kegiatan UKM pada kampusmu menjadi lebih mudah dan menyenangkan.</h4> 
    </div>
</div>

<div class="badan" style="background:#5B33A6">
<div class="container">

    <h3 style="color:#fff">Beberapa UKM yang terdaftar.</h3>
    <div class="ukm">
        <div class=row >
            <?php foreach ($ambildaftarukm->result() as $aw) { ?>
            <div class="list"><?php echo $aw->nama_ukm; ?></div>
            <?php } ?>
        </div>
    </div>


</div>
</div>

<div class="hiasan ke2" style="padding-top:50px;padding-bottom:50px;background:url(<?php echo site_url() ?>assets/img/back.jpg);background-position: center;background-size:cover;min-height:150px">
    <div class="container">

           <?php echo form_open('verifylogin'); ?>
             <input type="text" size="20" id="nim" name="nim" placeholder="nim"/>
             <input type="password" size="20" id="passowrd" name="password" placeholder="Password"/>
             <input type="submit" value="Login"/>
           </form>

    </div>
</div>

<div class="badan" style="background:#5B33A6;padding:10px">
    <div class="container">
        <h5 style="color:#fff;margin-bottom:0px;">privacy policy. all right reserved by ukmpnj</h5>
    </div>
</div>
