<?php 
    foreach ($nim->result() as $baris) {
        $nama = $baris->nama;
        $nim = $baris->nim;
        $jurusan = $baris->jurusan;
        $prodi = $baris->prodi;
        $angkatan = $baris->angkatan;
        $no_telpon = $baris->no_telpon;
        $ukm = $baris->ukm;
        $jabatan = $baris->jabatan;
    }

    foreach ($profileukm->result() as $baris) {
        $nama_ukm = $baris->nama_ukm;
    }
?>
<div class="badan" style="height:75px;background:#5B33A6"></div>
<div class="badan" style="background: #f1f4f5">
<div class="container">
<div class="row">
    <div class="col-sm-4">
        <div class="menu" style="width:100%;">
            <div class="pala" >
                <h6>Hello! <?php echo $nama; ?><br> ini adalah profile anda :</h6>
            </div>
            <div class="deskripsi">
                <table>
                    <tr>
                        <td class="uppercase" height="30px">nim</td>
                        <td>:</td>
                        <td align="right"><?php echo $nim; ?></td>
                    </tr>
                     <tr>
                        <td class="uppercase" height="30px">Nama</td>
                        <td>:</td>                        
                        <td align="right"><?php echo $nama; ?></td>
                    </tr> 
                    <tr>
                        <td class="uppercase" height="30px">Jurusan</td>
                        <td>:</td> 
                        <td align="right"><?php echo $jurusan; ?></td>
                    </tr>
                    <tr>
                        <td class="uppercase" height="30px">Prodi</td>
                        <td>:</td> 
                        <td align="right"><?php echo $prodi; ?></td>
                    </tr> 
                    <tr>
                        <td class="uppercase" height="30px">Angkatan</td>
                        <td>:</td> 
                        <td align="right"><?php echo $angkatan; ?></td>
                    </tr>
                    <tr>
                        <td class="uppercase" height="30px">No HP</td>
                        <td>:</td> 
                        <td align="right"><?php echo $no_telpon; ?></td>
                    </tr>
                    <tr>
                        <td class="uppercase" height="30px">Jabatan</td>
                        <td>:</td> 
                        <td align="right"><?php echo $jabatan; ?></td>
                    </tr>
                </table>
            </div>
            <div class="deskripsi">
                <div class="modal fade" tabindex="-1" role="dialog" id="ubahData">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Ubah data anda</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="<?php echo site_url(); ?>main/ubahdata">
                                            <div class="group">      
                                                <input type="text" required name="no_telpon" value="<?php echo $no_telpon?>">
                                                    <span class="bar"></span>
                                                <label>Nomer HP</label>
                                            </div>
                                            <input type="hidden" id="nim" name="nim" value="<?php echo $nim;?>"/>
                                            <button type="submit" title="Masukkan" style="background:#999"><span class="glyphicon glyphicon-pencil" style="color:#fff;font-size:15px"></span></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="blok1" style="margin-top:70px;">
                    <a href="#ubahData" data-toggle="modal">UBAH DATA</a>
                </div>
            
        </div>
    </div>

    <div class="col-sm-8">
        <div class="menu" style="width:100%;height:400px">
        <div class="pala" style="text-align:center;background:#B55EBC">
                <h6>Jadwal UKM Anda</h6>
            </div>
                <table class="jadwal">
                        <thead>
                            <td>Nama ukm</td>
                            <td>Hari</td>
                            <td>Waktu Mulai</td>
                            <td>Waktu Selesai</td>
                        </thead>
                        <?php if($jabatan != NULL){foreach ($jadwal->result() as $baris) { ?>
                            <tr>
                                <td><?php echo $nama_ukm; ?></td>
                                <td><?php echo $baris->hari; ?></td>
                                <td><?php echo $baris->mulai; ?></td>
                                <td><?php echo $baris->selesai; ?></td>
                            </tr>
                        <?php } }?>
                    </table>
        </div>
    </div>
</div>
<div class="row">                
    <div class="col-sm-5">
        <div class="menu" style="width:100%;height:185px;background:#673ab7;text-align:center">
            <div class="deskripsi">
                <?php if ($ukm == NULL) { ?><p>
                        <h3 style="color:#fff">PILIH UKM</h3>
                        <form method="post" action="<?php echo base_url(); ?>main/daftarukm">
                            <select name="ukm">
                                <?php foreach ($ambildaftarukm->result() as $aw) { ?>
                                    <option value='<?php echo $aw->id_ukm; ?>'><?php echo $aw->nama_ukm ?></option>
                                <?php } ?>
                            </select>
                            <input type="hidden" name="nim" value='<?php echo $nim; ?>' />
                            <input type="submit" value="PILIH UKM" />
                        </form>
                    <?php }
                if($jabatan == NULL && $ukm != NULL) { ?>
                <h3 style="color:#fff">Tunggu konfirmasi ketua UKM</h3>
                    <?php } if($ukm != NULL && $jabatan != NULL) {?>
                        <a class="link" href="<?php echo base_url() ?>main/ukm" class="navbar-list"><?php echo $nama_ukm?></a>     
                    <?php } ?>
            </div>
        </div>
    </div>


    <div class="col-sm-7">
        <div class="menu" style="width:100%;height:auto">
            <?php if($ukm != NULL){$no = 1;?>
                <table class="jadwal">
                    <thead>
                        <td colspan="6" height="20px">Daftar absen UKM <?php echo $nama_ukm ?> anda</td>
                    </thead>
                    <thead>
                        <td>No</td>
                        <td>Nama</td>
                        <td>Nim</td>
                        <td>Tanggal Absen</td>
                    </thead>
                    <?php foreach ($absensidiri->result() as $ini) { ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $nama;?></td>
                        <td><?php echo $ini->nim;?></td>
                        <td><?php echo $ini->tanggal;?></td>
                    </tr>
                    <?php $no++;} ?>
                </table>
            <?php } ?>  
        </div>
    </div>

</div>
</div>
</div>
            

