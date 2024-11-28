<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced DataTable</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <!-- Buttons extension for export features -->
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Data Table with Bootstrap Styling and Export Options</h1>

        <table id="myTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Usia</th>
                    <th>Pekerjaan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Andi</td>
                    <td>Laki-laki</td>
                    <td>25</td>
                    <td>Programmer</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Budi</td>
                    <td>Laki-laki</td>
                    <td>30</td>
                    <td>Designer</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Citra</td>
                    <td>Perempuan</td>
                    <td>28</td>
                    <td>Marketing</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "lengthMenu": [5, 10, 25, 50, 100],  // Dropdown pilihan jumlah data per halaman
            "dom": 'Bfrtip',  // Untuk menampilkan tombol export
            "buttons": [
                'copy', 'csv', 'excel', 'pdf', 'print'  // Tombol export data
            ]
        });
    });
    </script>
</body>
</html>
