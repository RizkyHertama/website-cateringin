</main>
<footer class="bg-light">
    <div class="text-center p-3" 
    style="background: #5cac0e; color: rgba(255, 255, 255, 1);
    font-family: Poppins;
    font-size: 16px;
    text-align: center;">
    COPYRIGHT 2022 CATERINGIN
    </div>
</footer>

<script>

// Summernote
$(document).ready(function() {
$('#summernote').summernote({
    callbacks: {
            onImageUpload: function(files) {
                for(let i=0; i < files.length; i++) {
                    $.upload(files[i]);
                }
            }
        },
    height : 200,
    toolbar: [
			["style", ["bold", "italic", "underline", "clear"]],
			["fontname", ["fontname"]],
			["fontsize", ["fontsize"]],
			["color", ["color"]],
			["para", ["ul", "ol", "paragraph"]],
			["height", ["height"]],
			["insert", ["link", "picture", "imageList", "video", "hr"]],
			["help", ["help"]]
		],
		dialogsInBody: true,
		imageList: {
			endpoint: "daftar_gambar.php",
			fullUrlPrefix: "../gambar/",
			thumbUrlPrefix: "../gambar/"
		}
});
$.upload = function (file) {
        let out = new FormData();
        out.append('file', file, file.name);

        $.ajax({
            method: 'POST',
            url: 'upload_gambar.php',
            contentType: false,
            cache: false,
            processData: false,
            data: out,
            success: function (img) {
                $('#summernote').summernote('insertImage', img);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error(textStatus + " " + errorThrown);
            }
        });
    };
});

</script>
</body>

</html>