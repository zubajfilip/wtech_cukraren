function previewImages(event) {
    var preview = document.getElementById('preview');
    preview.innerHTML = '';
    var files = event.target.files;

    for (var i = 0; i < files.length; i++) {
        var file = files[i];
        var reader = new FileReader();

        reader.onload = function(event) {
            var image = new Image();
            image.src = event.target.result;
            image.classList.add('preview-image');
            preview.appendChild(image);
        }

        reader.readAsDataURL(file);
    }
}
// 
// https://stackoverflow.com/questions/4459379/preview-an-image-before-it-is-uploaded
