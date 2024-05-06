function previewImage() {
    const fileInput = document.getElementById('imageFile');
    const imagePreview = document.getElementById('imagePreview');

    if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.style.maxWidth = '200px'; // Sesuaikan dengan ukuran yang diinginkan
            img.style.maxHeight = '200px'; // Sesuaikan dengan ukuran yang diinginkan
            imagePreview.innerHTML = '';
            imagePreview.appendChild(img);
        }

        reader.readAsDataURL(fileInput.files[0]);
    }
}
