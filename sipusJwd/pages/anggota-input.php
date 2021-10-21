<?php
$sql="SELECT * FROM tbanggota";
$a = mysqli_query($db, $sql);
$num = str_pad(count(mysqli_fetch_array($a)), 3, "0", STR_PAD_LEFT);
$id = 'AG' . $num;
?>
<div id="label-page">
  <h3>Input Data Anggota</h3>
</div>
<div id="content">
  <form action="proses/anggota-input-proses.php" method="post" id="form">
    <table id="tabel-input">
      <tr>
        <td class="label-formulir">ID Anggota</td>
        <td class="isian-formulir"><input type="text" name="id_anggota" class="isian-formulir isian-formulir-border"
            value="<?= $id ?>" readonly>
        </td>
      </tr>
      <tr>
        <td class="label-formulir">Nama</td>
        <td class="isian-formulir"><input type="text" name="nama" class="isian-formulir isian-formulir-border"
            id="nama"></td>
      </tr>
      <tr>
        <td class="label-formulir">Jenis Kelamin</td>
        <td class="isian-formulir">
          <select name="jenis_kelamin" id="jeniskelamin" class="isian-formulir isian-formulir-border">
            <option value="" selected disabled>-- Pilih --</option>
            <option value="Pria">Pria</option>
            <option value="Wanita">Wanita</option>
          </select>
        </td>
      </tr>
      <tr>
        <td class="label-formulir">Alamat</td>
        <td class="isian-formulir"><textarea rows="2" cols="40" name="alamat" id="alamat"
            class="isian-formulir isian-formulir-border"></textarea></td>
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
    nama = document.getElementById('nama').value;
    jeniskelamin = document.getElementById('jeniskelamin').value;
    alamat = document.getElementById('alamat').value;

    if (nama == '') {
      alert('Nama tidak boleh kosong');
      return false;
    } else if (jeniskelamin == '') {
      alert('Jenis kelamin tidak boleh kosong');
      return false;
    } else if (alamat == '') {
      alert('Alamat tidak boleh kosong');
      return false;
    } else {
      document.getElementById('form').submit();
      return true;
    }
  }
  </script>
</div>