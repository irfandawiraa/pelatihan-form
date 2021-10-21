<?php
	$id_anggota=$_GET['id'];
	$q_tampil_anggota=mysqli_query($db,"SELECT * FROM tbanggota WHERE idanggota='$id_anggota'");
	$r_tampil_anggota=mysqli_fetch_array($q_tampil_anggota);
?>
<div id="label-page">
  <h3>Edit Data Anggota</h3>
</div>
<div id="content">
  <form action="proses/anggota-edit-proses.php" method="POST" id="form">
    <table id="tabel-input">
      <tr>
        <td class="label-formulir">ID Anggota</td>
        <td class="isian-formulir"><input type="text" name="id_anggota"
            value="<?php echo $r_tampil_anggota['idanggota']; ?>" readonly="readonly"
            class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
      </tr>
      <tr>
        <td class="label-formulir">Nama</td>
        <td class="isian-formulir"><input type="text" name="name" value="<?php echo $r_tampil_anggota['nama']; ?>"
            class="isian-formulir isian-formulir-border" id="nama"></td>
      </tr>
      <tr>
        <td class="label-formulir">Jenis Kelamin</td>
        <td class="isian-formulir">
          <select name="jenis_kelamin" id="jeniskelamin" class="isian-formulir isian-formulir-border">
            <option value="Pria" <?php echo ($r_tampil_anggota['jeniskelamin'] == 'Pria') ? "selected" : "" ?>>Pria
            </option>
            <option value="Wanita" <?php echo ($r_tampil_anggota['jeniskelamin'] == 'Wanita') ? "selected" : "" ?>>
              Wanita</option>
          </select>
        </td>
      </tr>
      <tr>
        <td class="label-formulir">Alamat</td>
        <td class="isian-formulir"><textarea rows="2" cols="40" name="alamat"
            class="isian-formulir isian-formulir-border"
            id="alamat"><?php echo $r_tampil_anggota['alamat']; ?></textarea></td>
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

    console.log(nama, jeniskelamin, alamat);

    if (nama == '') {
      alert('Nama tidak boleh kosong');
      return false;
    } else if (jeniskelamin = '') {
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