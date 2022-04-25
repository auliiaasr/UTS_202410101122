<?php
if (isset($_POST['sort'])) :
    require_once 'connect.php';
    $sort = $_POST['sort'];

    $query = mysqli_query($conn, "SELECT * FROM fakultas ORDER BY fakultas " . $sort . "");
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
<?php
    endwhile;
endif;
?>