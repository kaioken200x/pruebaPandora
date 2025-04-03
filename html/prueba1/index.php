<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>CSV Importer</h1>
    <form id="csvForm" enctype="multipart/form-data">
        <input type="file" name="csvFile" ppid="csvFile" accept=".csv" required>
        <button type="submit">Send</button>
    </form>
    <div id="response"></div>

    <script>
        $(document).ready(function () {
            $('#csvForm').on('submit', function (e) {
                e.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    url: 'process_csv.php',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        $('#response').html('<p>' + response + '</p>');
                    },
                    error: function () {
                        $('#response').html('<p>An error occurred while processing the file.</p>');
                    }
                });
            });
        });
    </script>
</body>
</html>