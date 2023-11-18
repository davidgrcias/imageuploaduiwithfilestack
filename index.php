<html>
    <head>
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src = "https://static.filestackapi.com/filestack-js/3.x.x/filestack.min.js"></script>
    </head>
    <body>
        <button id="openPickerButton">Upload Image</button>

        <script>
            var client = filestack.init('ANZd7Y0tpRKPzeo4vM9svz');
            var options = {
                storeTo: {
                workflows: ["abf351f7-3fc0-40fb-9ef3-192151677f6f"]
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
