<?php
// require connect database
require_once 'connect.php';

// connect & query read db
$query = mysqli_query($conn, "SELECT * FROM fakultas");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/0d95b64c38.js" crossorigin="anonymous"></script>
    <title>AULIA SINTA_202410101122</title>
</head>

<body style="background-color: #F1DDBF;">
    <div class="container">
        <div class="mt-5 shadow px-5 py-3 mb-4 bg-white rounded d-flex justify-content-between">
            <h2 class="m-1">Data Fakultas Universitas Jember</h2>
            <a href="create.php" class="m-1"><button type="button" class="btn btn-success shadow bg-success"><i class="fas fa-plus-circle me-1"></i> Tambah</button></a>
        </div>

        <div class="p-5 shadow p-3 mb-5 bg-white rounded">
            <div class="col-3">
                <select class="form-select" id="sort">
                    <option selected>Urutkan berdasar Jumlah Animo</option>
                    <option value="asc">Ascending</option>
                    <option value="desc">Descending</option>
                </select>
            </div>

            <!-- table -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fakultas</th>
                        <th scope="col">Jumlah Animo</th>
                        <th scope="col">Opsi</th>
                    </tr>
                </thead>
                <tbody id="content">
                    <?php
                    // fetch as array
                    $n = 1;
                    while ($row = mysqli_fetch_object($query)) :
                    ?>
                        <tr class="p-3">
                            <th scope="row" class="align-middle"><?= $n++; ?></th>
                            <td class="align-middle"><?= $row->fakultas ?></td>
                            <td class="align-middle"><?= $row->animo ?></td>
                            <td class="align-middle">
                                <div class="btn-group" role="group">
                                    <a href="edit.php?id=<?= $row->id ?>"><button type="button" class="btn btn-warning shadow bg-warning text-white rounded-0"><i class="fas fa-pen fa-sm"></i></button></a>
                                    <a href="delete.php?id=<?= $row->id ?>"><button type="button" class="btn btn-danger shadow bg-danger text-white rounded-0"><i class="fas fa-trash fa-sm"></i></button></a>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#sort').on('change', function() {
                $.ajax({
                    type: 'POST',
                    url: 'sort.php',
                    data: {
                        sort: $(this).val()
                    },
                    cache: false,
                    success: function(data) {
                        $('#content').html(data);
                    }
                });
            });
        });
    </script>
</body>

</html>