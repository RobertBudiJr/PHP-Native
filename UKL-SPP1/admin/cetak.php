<!DOCTYPE html>
<html lang="en">
  <head>
    <title>CETAK SPP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="header/css/style.css">
  </head>
<body>
<div id="content" class="p-4 p-md-5 pt-5">
	<center>
 
		<h2>DATA LAPORAN SPP</h2>
		<h4>SMK TELKOM MALANG</h4>
 
	</center>
 
	<?php 
	include 'koneksi.php';
	?>
 
 <table class="table table-hover table-striped">
        <thead>
          <tr>
            <th>ID BAYAR</th>
            <th>ID PETUGAS</th>
            <th>NISN</th>
            <th>TANGGAL</th>
            <th>BULAN</th>
            <th>STATUS</th>
          </tr>
        </thead>
        <tbody>
		<?php 
		$no = 0;
		$sql = mysqli_query($conn,"select * from pembayaran");
		while($data = mysqli_fetch_array($sql)){
            $no++;
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['id_petugas']; ?></td>
			<td><?php echo $data['nisn']; ?></td>
			<td><?php echo $data['tgl_bayar']; ?></td>
            <td><?php echo $data['bulan_spp']; ?></td>
			<td><?php echo $data['tahun_spp']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
 
	<script>
		window.print();
	</script>
 </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>