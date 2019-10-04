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
    
    if ($profileukm != NULL) {
        foreach ($profileukm->result() as $baris) {
            $id_ukm = $baris->id_ukm;
            $nama_ukm = $baris->nama_ukm;
            $penjelasan_ukm = $baris->penjelasan_ukm;
            $jenis = $baris->jenis;
            $ketua = $baris->ketua;
        }
    }
    

    
?>

<div class="badan" style="height:75px;background:#5B33A6"></div>
<div class="badan">
<div class="container">
<div class="row">
    <div class="col-sm-4">
        <div class="menu" style="width:100%;">
            <div class="pala">
                <h6><?php if ($ketua == $nim) {
        echo 'Hallo '.$nama.'!   Anda adalah ketua UKM';
    }
    else {
        echo 'Hallo '.$nama.'!   Anda adalah anggota UKM';
    } ?> </h6>
            </div>
            <div class="deskripsi" style="text-align:left">
                <table>
                    <tr>
                        <td class="uppercase" height="30px">Nama UKM</td>
                        <td>:</td>
                        <td align="right"><?php echo $nama_ukm; ?></td>
                    </tr>
                     <tr>
                        <td class="uppercase" height="30px">Jenis UKM</td>
                        <td>:</td>                        
                        <td align="right"><?php echo $jenis; ?></td>
                    </tr> 
                    <tr>
                        <td class="uppercase" height="30px">Penjelasan</td>
                        <td>:</td> 
                        <td align="right"><?php echo $penjelasan_ukm; ?></td>
                    </tr>
                </table>
            </div>
            
            
        </div>
    </div>

    <div class="col-sm-8">
        <div class="menu" style="width:100%;height:400px;">     
                <table class="jadwal"> 
                    <thead>
                            <td colspan="5" height="20px">Jadwal ukm Anda</td>
                        </thead>
                        <thead>
                        <td>Hari</td>
                        <td>Mulai</td>
                        <td>Selesai</td>
                        <?php if($ketua == $nim) { ?>
                            <td>Password Absen</td>
                            <td>Opsi</td>
                        <?php }
                        else{ echo '<td colspan=2></td>'; } ?>
                        </thead>
                        <?php 
                        if($jadwal != NULL) {
                        foreach ($jadwal->result() as $baris) { ?>
                        <form method="post" action="<?php echo base_url(); ?>main/ubahjadwal">
                            <tr>
                                <td><?php if($ketua == $nim) { ?>
                                    <select name=hari>
                                        <option><?php echo $baris->hari; ?></option>
                                        <option value=Senin>Senin</option>
                                        <option value=Selasa>Selasa</option>
                                        <option value=Rabu>Rabu</option>
                                        <option value=Kamis>Kamis</option>
                                        <option value=Jumat>Jumat</option>
                                        <option value=Sabtu>Sabtu</option>
                                    </select>    
                                <?php } else { echo $baris->hari; }  ?>
                                </td>

                                <td><?php if($ketua == $nim) { ?>
                                    <input type=time name=mulai value="<?php echo $baris->mulai; ?>">
                                <?php } else { echo $baris->mulai; }  ?></td>

                                <td><?php if($ketua == $nim) { ?>
                                    <input type=time name=selesai value="<?php echo $baris->selesai; ?>">
                                <?php } else { echo $baris->selesai; }  ?></td>
                                
                                <td><?php if($ketua == $nim) { ?>
                                    <input type=text name=password value="<?php echo $baris->password; ?>">
                                <?php } else { echo $baris->selesai; }  ?></td>
                                <input type=hidden name=id_jadwal value="<?php echo $baris->id_jadwal; ?>">
                                <td><input type=submit value=ubah></td></td>
                            </tr>
                        </form>
                        <?php } } $jumlahjadwal = $jadwal->num_rows(); if ($jumlahjadwal < 2 ) {?>
                            <form method="post" action="<?php echo base_url(); ?>main/tambahjadwal">
                            <tr>
                                
                                <td>
                                    <select name=hari>
                                        <option value=Senin>Senin</option>
                                        <option value=Selasa>Selasa</option>
                                        <option value=Rabu>Rabu</option>
                                        <option value=Kamis>Kamis</option>
                                        <option value=Jumat>Jumat</option>
                                        <option value=Sabtu>Sabtu</option>
                                    </select>
                                </td>
                                <td>
                                    <input type=time name=mulai>
                                </td>
                                <td>
                                    <input type=time name=selesai>
                                </td>
                                <input type=hidden name=id_ukm value="<?php echo $ukm; ?>">
                                    <td><input type=text name=password placeholder='password absen'></td>
                                <td><input type=submit value=tambah ></td></td>
                            </tr>
                        </form>
                        <?php } ?>
                    </table>
        </div>
    </div>
</div>

<div class="row">                
    <div class="col-sm-12">
    <div class="menu" style="width:100%;height:auto">
            <?php if($ukm != NULL){$no=1;?>
                <table class="jadwal">
                    <thead>
                        <td colspan="9" height="20px">Pendaftar Anggota UKM <?php echo $nama_ukm ?> anda</td>
                    </thead>
                    <thead>
                        <td>No</td>
                        <td>NIM</td>
                        <td>Nama</td> 
                        <td>Jurusan</td> 
                        <td>Prodi</td> 
                        <td>Angkatan</td> 
                        <td>No HP</td>
                        <td>Opsi</td> 
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($daftaranggota->result() as $xy) { 
                        if ($xy->jabatan == NULL) { ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $xy->nim; ?></td>
                        <td><?php echo $xy->nama; ?></td>
                        <td><?php echo $xy->jurusan; ?></td>
                        <td><?php echo $xy->prodi; ?></td>
                        <td><?php echo $xy->angkatan; ?></td>
                        <td><?php echo $xy->no_telpon; ?></td>
                        <td><form method="post" action="<?php echo base_url(); ?>main/konfirmasidaftar">
                        <input type="hidden" name="nim_orang" value='<?php echo $xy->nim;?>' />
                        <input type="hidden" name="jabatan" value='anggota' />
                        <input type="submit" value='kofirmasi' />
                        </form>
                    </td>
                    </tr>
                    <?php $no++;}} ?>  
                </table>
            <?php } ?>  
        </div>
    </div>
</div>

<div class="row">                
    <div class="col-sm-4">
        <div class="menu" style="width:100%;height:185px;background:#673ab7">
            <div class="deskripsi">
                <?php $jumlahjadwal = $jadwal->num_rows(); if ($jumlahjadwal == 0) { ?>
                <h2>Belum ada jadwal</h2>
            <?php } date_default_timezone_set('Asia/Jakarta'); 
                $hariini = date('D');
                if ($hariini == 'Mon') {
                    $hariini = 'Senin';
                }
                if ($hariini == 'Tue') {
                    $hariini = 'Selasa';
                }
                if ($hariini == 'Wed') {
                    $hariini = 'Rabu';
                }
                if ($hariini == 'Thu') {
                    $hariini = 'Kamis';
                }
                if ($hariini == 'Fri') {
                    $hariini = 'Jumat';
                }
                if ($hariini == 'Sat') {
                    $hariini = 'Sabtu';
                }
                if ($hariini == 'Sun') {
                    $hariini = 'Minggu';
                } 
            ?>
            <?php
                    $udah_absen = $cekabsen->num_rows();
                    foreach ($jadwal->result() as $ini) {
                        if ($hariini == $ini->hari && $udah_absen == 0) { ?>
                        <table>
                            <form method="post" action="<?php echo base_url(); ?>main/absenkehadiran">
                                <tr>
                                    <td><input type=text name=password placeholder='password absen'></td>
                                    <input type=hidden name=nim value="<?php echo $nim; ?>">
                                    <input type=hidden name=ukm value="<?php echo $ukm; ?>">
                                    <input type=hidden name=id_jadwal value="<?php echo $ini->id_jadwal; ?>">
                                    <input type=hidden name=tanggal value="<?php echo date('Y-m-d'); ?>">
                                    <td><input type=submit value=absen></td>
                                </tr>
                            </form>
                        </table>
                    <?php } 
                    }
                    if($udah_absen == 1){ ?>
                        <h2>anda udah absen</h2>
                    <?php    } ?> 
            </div>
        </div>
    </div>


    <div class="col-sm-8">
        <div class="menu" style="width:100%;height:auto">
            <?php if($ukm != NULL){$no=1;?>
                <table class="jadwal">
                    <thead>
                        <td colspan="9" height="20px">Anggota UKM <?php echo $nama_ukm ?> anda</td>
                    </thead>
                    <thead>
                        <td>No</td>
                        <td>NIM</td>
                        <td>Nama</td> 
                        <td>Jurusan</td> 
                        <td>Prodi</td> 
                        <td>Angkatan</td> 
                        <td>No HP</td>
                        <td>Opsi</td> 
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($daftaranggota->result() as $baris) { 
                        if ($baris->jabatan != NULL) { ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $baris->nim; ?></td>
                        <td><?php echo $baris->nama; ?></td>
                        <td><?php echo $baris->jurusan; ?></td>
                        <td><?php echo $baris->prodi; ?></td>
                        <td><?php echo $baris->angkatan; ?></td>
                        <td><?php echo $baris->no_telpon; ?></td>
                        <?php if ($ketua == $nim) { ?>
                        <form method="post" action="<?php echo base_url(); ?>main/hapusanggota">
                                <input type=hidden name=nim value="<?php echo $baris->nim; ?>"> 
                            <td><?php if ($baris->jabatan != 'ketua') { ?><input type=submit value=hapus><?php } ?></td>
                        </form>
                        <?php } ?>
                    </tr>
                    <?php $no++;}} ?>  
                </table>
            <?php } ?>  
        </div>
    </div>

</div>
</div>
</div>
            

