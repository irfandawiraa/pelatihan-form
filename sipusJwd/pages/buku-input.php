<?php
$sql = "SELECT count(*) as total from tbbuku";
$a = mysqli_query($db, $sql);
$data = mysqli_fetch_array($a);
$num = str_pad($data['total'] + 1, 3, "0", STR_PAD_LEFT);
$id = 'BK' . $num;
?>
<div id="label-page">
  <h3>Input Data Buku</h3>
</div>
<div id="content">
  <form action="proses/buku-input-proses.php" method="post" id="form">
    <table id="tabel-input">
      <tr>
        <td class="label-formulir">ID Buku</td>
        <td class="isian-formulir"><input type="text" name="id_buku" value="<?=$id?>"
            class="isian-formulir isian-formulir-border" readonly></td>
      </tr>
      <tr>
        <td class="label-formulir">Judul Buku</td>
        <td class="isian-formulir"><input type="text" name="judul_buku" id="judul"
            class="isian-formulir isian-formulir-border">
        </td>
      </tr>
      <tr>
        <td class="label-formulir">Kategori</td>
        <td class="isian-formulir">
          <select name="kategori" id="kategori" class="isian-formulir isian-formulir-border">
            <option value="" selected disabled>-- Pilih Kategori --</option>
            <option value="Ilmu Komputer">Ilmu Komputer</option>
            <option value="Ilmu Agama">Ilmu Agama</option>
            <option value="Karya Sastra">Karya Sastra</option>
          </select>
        </td>
      </tr>
      <tr>
        <td class="label-formulir">Pengarang</td>
        <td class="isian-formulir"><input type="text" name="pengarang" id="pengarang"
            class="isian-formulir isian-formulir-border">
        </td>
      </tr>
      <tr>
        <td class="label-formulir">Penerbit</td>
        <td class="isian-formulir"><input type="text" name="penerbit" id="penerbit"
            class="isian-formulir isian-formulir-border"></td>
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