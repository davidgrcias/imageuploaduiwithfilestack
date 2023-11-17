<html>
    <head>
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src = "https://static.filestackapi.com/filestack-js/3.x.x/filestack.min.js"></script>
    </head>
    <body>
        <button id="openPickerButton">Upload Image</button>

        <script>
            var client = filestack.init('AtZTu2pcfQLGpQLkwktKdz');
            var options = {
                storeTo: {
                workflows: ["820c059c-d352-43ec-ae70-dc4735772118"]
                },
                onUploadDone: handleUploadDone,
                accept: ["image/*"]
            };

            function handleUploadDone(result) {
                $.ajax({
                    url: 'function.php',
                    type: 'post',
                    data: {
                        imageUrl: result.filesUploaded[0].url
                    },
                    success:function(response){
                        alert("Image Successfully Added");
                    }
                })
            }

            function openPicker() {
                var picker = client.picker(options);
                picker.open();
            }

            document.getElementById('openPickerButton').addEventListener('click', openPicker);
        </script>
    </body>
</html>