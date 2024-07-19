         document.getElementById('imageInput').addEventListener('change', function(event) {
            var preview = document.getElementById('preview');
            preview.innerHTML = "";  // Clear the preview

            var file = event.target.files[0];
            if (file && (file.type === 'image/png' || file.type === 'image/jpeg' || file.type === 'image/jpg')) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = document.createElement('img');
                    img.src = e.target.result;
                    preview.appendChild(img);
                };
                reader.readAsDataURL(file);
            } else {
                preview.innerHTML = "Please select a valid image file (PNG, JPG, JPEG).";
            }
        });
   
        // ClassicEditor
        // .create(document.querySelector('.ckeditor'))
        // .catch(error => {
        //     console.error(error);
        // });