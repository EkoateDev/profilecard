function uploadSubmit() {
	let myFile = document.getElementById('file-Upload').files[0];
	if (myFile.size > 2097152) {
		// 2 MiB for bytes.
		alert('File size must under 2 Megabytes!');
		return;
	}
}
