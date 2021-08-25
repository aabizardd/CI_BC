// ambil elements yg di buutuhkan
var opsi = document.getElementById('opsi1');

var ctn = document.getElementById('container1');

// tambahkan event ketika keyword ditulis

opsi.addEventListener('change', function () {


	//buat objek ajax
	var xxx = new XMLHttpRequest();

	// cek kesiapan ajax
	xxx.onreadystatechange = function () {
		if (xxx.readyState == 4 && xxx.status == 200) {
			ctn.innerHTML = xxx.responseText;
		}
	}

	xxx.open('GET', 'http://localhost/CI_BC/pjasa/tampilOpsi1/' + opsi.value, true);
	xxx.send();


})
