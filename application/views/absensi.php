<?php 
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
<h1>UKM <?php echo $nama_ukm; ?></h1>
<table border=1>
    <tr>
        <td>No</td>
        <td>NIM</td>
        <td>Nama</td>
        <td>Jurusan</td>
        <td>Prodi</td>
        <td>Angkatan</td>
        <td>No HP</td>
        <td>Tanggal Absen</td>
    </tr>
    <?php $no = 1;
        foreach ($absensi->result() as $ga) { ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $ga->nim; ?></td>
            
            <?php foreach ($daftaranggota->result() as $ba) {
                if($ga->nim == $ba->nim){
                    echo '<td>'.$ba->nama.'</td>';
                    echo '<td>'.$ba->jurusan.'</td>';
                    echo '<td>'.$ba->prodi.'</td>';
                    echo '<td>'.$ba->angkatan.'</td>';
                    echo '<td>'.$ba->no_telpon.'</td>';
                }
            }
            ?>
            
            <td><?php echo $ga->tanggal; ?></td>
        </tr>
    <?php } ?>
</table>