<?php
	$id_buku=$_GET['id'];
	$q_tampil_buku=mysqli_query($db,"SELECT * FROM tbbuku WHERE idbuku='$id_buku'");
	$r_tampil_buku=mysqli_fetch_array($q_tampil_buku);

?>
<div id="label-page">
  <h3>Edit Data Buku</h3>
</div>
<div id="content">
  <form action="proses/buku-edit-proses.php" method="post" id="form">
    <table id="tabel-input">
      <tr>
        <td class="label-formulir">ID Buku</td>
        <td class="isian-formulir"><input type="text" name="id_buku" value="<?php echo $r_tampil_buku['idbuku']; ?>"
            readonly="readonly" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
      </tr>
      <tr>
        <td class="label-formulir">Judul Buku</td>
        <td class="isian-formulir"><input type="text" name="judul_buku" id="judul"
            value="<?php echo $r_tampil_buku['judulbuku']; ?>" class="isian-formulir isian-formulir-border"></td>
      </tr>
      <tr>
        <td class="label-formulir">Kategori</td>
        <td class="isian-formulir"><input type="text" name="kategori" id="kategori"
            value="<?php echo $r_tampil_buku['kategori']; ?>" class="isian-formulir isian-formulir-border"></td>
      </tr>
      <tr>
        <td class="label-formulir">Pengarang</td>
        <td class="isian-formulir"><input type="text" name="pengarang" id="pengarang"
            value="<?php echo $r_tampil_buku['pengarang']; ?>" class="isian-formulir isian-formulir-border"></td>
      </tr>
      <tr>
        <td class="label-formulir">Penerbit</td>
        <td class="isian-formulir"><input type="text" name="penerbit" id="penerbit"
            value="<?php echo $r_tampil_buku['penerbit']; ?>" class="isian-formulir isian-formulir-border"></td>
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
    judul = document.getElementById('judul').value;
    kategori = document.getElementById('kategori').value;
    pengarang = document.getElementById('pengarang').value;
    penerbit = document.getElementById('penerbit').value;

    if (judul == '') {
      alert('Judul tidak boleh kosong');
      return false;
    } else if (kategori == '') {
      alert('Kategori tidak boleh kosong');
      return false;
    } else if (pengarang == '') {
      alert('Pengarang tidak boleh kosong');
      return false;
    } else if (penerbit == '') {
      alert('Penerbit tidak boleh kosong');
      return false;
    } else {
      document.getElementById('form').submit();
      return true;
    }
  }
  </script>
</div>