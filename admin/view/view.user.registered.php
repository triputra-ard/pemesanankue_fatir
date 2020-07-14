<div class="table-responsive">
  <table id="Admin_table" class="table table-bordered">
    <thead>
      <th>NO</th>
      <th>Nama Pengguna</th>
      <th>Nomor Telepon</th>
      <th>Email</th>
      <th>Password</th>
      <th>Alamat lengkap</th>
      <th>Terdaftar pada:</th>
      <th>Status Pengguna :</th>
      <th>Opsi</th>
    </thead>
    <tbody>
      <?php
      $nomor = 1;
      $sql = "SELECT * From pengguna WHERE email IS NOT NULL";
      $query = mysqli_query($db,$sql);

      while ($view = mysqli_fetch_assoc($query)) {
        $current_time = $view['tanggal_daftar'];
        $replace_time = strtotime($current_time);

        $timestamp = date("D, d-M-Y H:I:s", $replace_time);
       ?>
       <tr>
         <td><?php echo $nomor++ ;?></td>
         <td><?php echo $view['nama_pengguna']; ?></td>
         <td><?php echo $view['nomor_telepon']; ?></td>
         <td><?php echo $view['email']; ?></td>
         <td><?php echo $view['password']; ?></td>
         <td><?php echo $view['alamat']; ?></td>
         <td><?php echo $timestamp; ?></td>
         <td class="<?php if($view['status_aktivasi'] == "AKTIF") echo "bg-success text-white"; elseif($view['status_aktivasi'] == "DIBLOKIR") echo "bg-warning text-white"; else echo "bg-danger text-white"; ?>">
           <?php echo $view['status_aktivasi']; ?></td>
         <td>
           <?php if ($view['status_aktivasi'] == "AKTIF"): ?>
             <a href="control/script.user?forgetpass&id=<?php echo encrypt($view['id_user']); ?>" title="Lupa password" class="btn btn-rounded btn-success"><i class="fas fa-key"></i></a>
             <a href="control/script.user?blocked&id=<?php echo encrypt($view['id_user']); ?>" title="Blokir pengguna" class="btn btn-rounded btn-warning"><i class="fas fa-user-slash"></i></a>
             <a href="control/script.user?notactive&id=<?php echo encrypt($view['id_user']); ?>" title="Nonaktifkan" class="btn btn-rounded btn-danger"><i class="fas fa-times"></i></a>
          <?php elseif($view['status_aktivasi'] == "TIDAK_AKTIF"): ?>
            <a href="control/script.user?forgetpass&id=<?php echo encrypt($view['id_user']); ?>" title="Lupa password" class="btn btn-rounded btn-success"><i class="fas fa-key"></i></a>
            <a href="control/script.user?blocked&id=<?php echo encrypt($view['id_user']); ?>" title="Blokir pengguna" class="btn btn-rounded btn-warning"><i class="fas fa-user-slash"></i></a>
            <a href="control/script.user?active&id=<?php echo encrypt($view['id_user']); ?>" title="Aktifkan" class="btn btn-rounded btn-primary"><i class="fas fa-check"></i></a>
          <?php else: ?>
            <a href="control/script.user?forgetpass&id=<?php echo encrypt($view['id_user']); ?>" title="Lupa password" class="btn btn-rounded btn-success"><i class="fas fa-key"></i></a>
            <a href="control/script.user?active&id=<?php echo encrypt($view['id_user']); ?>" title="Aktifkan" class="btn btn-rounded btn-primary"><i class="fas fa-check"></i></a>
           <?php endif; ?>
         </td>
       </tr>
     <?php } ?>
    </tbody>
  </table>
</div>
