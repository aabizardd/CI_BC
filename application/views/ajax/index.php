<center>
	<h4></h4>
	<table class="table" border=1>
		<thead class="thead-dark">
			<tr>
				<th scope="col"> No.</th>
				<th scope="col"> ID User</th>
				<th scope="col"> Nama User </th>
				<th scope="col"> ID Order </th>
				<th scope="col"> ID Product </th>
				<th scope="col"> Nama Product </th>
				<th scope="col"> Harga Product </th>
				<th scope="col"> Total Harga </th>
				<th scope="col"> Alamat </th>
				<th scope="col"> Phone Number </th>
			</tr>
		</thead>
		<?php
		$no = 1;
		foreach ($cb as $cc) : ?>
			<tr>
				<td scope="col"><?= $no++; ?></td>
				<td scope="col"><?= $cc['id_user'] ?></td>
				<td scope="col"><?= $cc['nama'] ?></td>
				<td scope="col"><?= $cc['id_order' . $jenis . ''] ?></td>
				<td scope="col"><?= $cc['id_' . $jenis . ''] ?></td>
				<td scope="col"><?= $cc['nama_' . $jenis . ''] ?></td>
				<td scope="col"><?= $cc['harga_' . $jenis . ''] ?></td>
				<td scope="col"><?= $cc['total_harga'] ?></td>
				<td scope="col"><?= $cc['alamat'] ?></td>
				<td scope="col"><?= $cc['phone_number'] ?></td>

			</tr>
		<?php endforeach; ?>


	</table>


</center>
