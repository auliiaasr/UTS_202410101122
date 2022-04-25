<?php
/// require connect database
require_once 'connect.php';

// edit page
// query fetch by id
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM fakultas WHERE id=$id");
// fetch as associative
$data = mysqli_fetch_object($query);

// alert
$alert = null;
$errorFakultas = $errorAnimo = null;

// update db
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $fakultas = $_POST['fakultas'];
    $animo = $_POST['animo'];

    // validation
    if (empty($fakultas)) {
        $alert = "failed";
        $errorFakultas = "*Data Fakultas tidak boleh kosong!";
    }
    if (empty($animo)) {
        $alert = "failed";
        $errorAnimo = "*Data animo tidak boleh kosong!";
    }

    // if not empty
    if (!empty($fakultas) && !empty($animo)) {
        // query create
        $query = mysqli_query($conn, "UPDATE fakultas SET fakultas='$fakultas', animo='$animo' WHERE id=$id");

        // change alert
        $alert = "success";
    }
}
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
            <h2 class="m-1">Edit Fakultas</h2>
            <a href="index.php" class="m-1"><button type="button" class="btn btn-secondary shadow bg-secondary"><i class="fas fa-arrow-circle-left me-1"></i> Kembali</button></a>
        </div>

        <div class="p-5 shadow p-3 mb-5 bg-white rounded">
            <form action="" method="post" class="col-12">
                <!-- alert -->
                <?php if ($alert == "success") : ?>
                    <div class="alert alert-success" role="alert">Data berhasil diedit! <a href="index.php">Lihat hasil</a></div>
                <?php elseif ($alert == "failed") : ?>
                    <div class="alert alert-danger" role="alert">Data gagal diedit!</div>
                <?php endif; ?>

                <!-- form -->
                <input type="hidden" name="id" value="<?= $data->id; ?>">
                <div class="form-group">
                    <label for="">Fakultas</label>
                    <input type="text" class="form-control" name="fakultas" placeholder="Fakultas" value="<?= $data->fakultas; ?>">
                    <small class="form-text text-danger"><?= $errorFakultas; ?></small>
                </div><br>
                <div class="form-group">
                    <label for="">Jumlah Animo</label>
                    <input type="number" class="form-control" name="animo" placeholder="Jumlah Animo" value="<?= $data->Animo; ?>">
                    <small class="form-text text-danger"><?= $errorAnimo; ?></small>
                </div><br>
                <div class="d-grid gap-2">
                    <button type="submit" name="update" class="btn btn-warning shadow bg-warning text-white"><i class="fas fa-pen me-1"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>