<?php
$sql = "SELECT count(*) as total from tbtransaksi";
$a = mysqli_query($db, $sql);
$data = mysqli_fetch_array($a);
$num = str_pad($data['total'] + 1, 3, "0", STR_PAD_LEFT);
$id = 'TR' . $num;
?>

<div id="label-page">
  <h3>Input Transaksi Peminjaman</h3>
</div>
<div id="content">
  <form action="proses/transaksi-peminjaman-input-proses.php" method="post" id="form">
    <table id="tabel-input">
      <tr>
        <td class="label-formulir">ID Transaksi</td>
        <td class="isian-formulir"><input type="text" name="id_transaksi" class="isian-formulir isian-formulir-border"
            value="<?=$id?>" readonly>
        </td>
      </tr>
      <tr>
        <td class="label-formulir">Anggota</td>
        <td class="isian-formulir">
          <select name="id_anggota" id="anggota" class="isian-formulir isian-formulir-border">
            <option value="" selected disabled> Pilih Data Anggota </option>
            <?php
						$q_tampil_anggota=mysqli_query($db,
							"SELECT * FROM tbanggota
							WHERE status='Tidak Meminjam'
							ORDER BY idanggota"
						);
						while($r_tampil_anggota=mysqli_fetch_array($q_tampil_anggota)){
							echo"<option value=$r_tampil_anggota[idanggota]>$r_tampil_anggota[idanggota] | $r_tampil_anggota[nama]</option>";
						}
					?>
          </select>
        </td>
      </tr>
      <tr>
        <td class="label-formulir">Buku</td>
        <td class="isian-formulir">
          <select name="id_buku" id="buku" class="isian-formulir isian-formulir-border">
            <option value="" selected disabled> Pilih Data Buku </option>
            <?php
						$q_tampil_buku=mysqli_query($db,
							"SELECT * FROM tbbuku
							WHERE status='Tersedia'
							ORDER BY idbuku"
						);
						while($r_tampil_buku=mysqli_fetch_array($q_tampil_buku)){
							echo"<option value=$r_tampil_buku[idbuku]>$r_tampil_buku[idbuku] | $r_tampil_buku[judulbuku]</option>";
						}
					?>
          </select>
        </td>
      </tr>
      <tr>
        <td class="label-formulir">Tanggal Pinjam</td>
        <td class="isian-formulir"><input type="text" name="tgl_pinjam" value="<?php echo $tgl; ?>" readonly="readonly"
            class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
      </tr>
      <tr>
        <td class="label-formulir"></td>
        <td class="isian-formulir"><input name="simpan" value="Simpan" class="tombol" onclick="validasi()" readonly
            style="cursor: pointer; width: 55px;"></td>
      </tr>
    </table>
  </form>

  <script>
  function validasi() {
    anggota = document.getElementById('anggota').value;
    buku = document.getElementById('buku').value;

    if (anggota == '') {
      alert('Silahkan pilih anggota');
      return false;
    } else if (buku == '') {
      alert('Silahkan pilih buku');
      return false;
    } else {
			document.getElementById('form').submit();
      return true;
    }
  }
  </script>
</div>