<?php

    include("db.php");
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM objetos WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $image = $row['image'];
            $dispositivo = $row['dispositivo'];
            $modelo = $row['modelo'];
            $serie = $row['num_serie'];
        }
    }

    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $image = $_POST['image'];
        $dispositivo = $_POST['dispositivo'];
        $modelo = $_POST['modelo'];
        $serie = $_POST['num_serie'];

        $query = "UPDATE objetos set image = '$image', dispositivo = '$dispositivo', modelo = '$modelo', num_serie = '$serie' WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if (!$result){
            die("Query Failed");
        }

        $_SESSION['message'] = 'Dispositivos Updated Successfully';
        $_SESSION['message_type'] = 'success';
        header("Location: index.php");

    }

?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">

                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">

                    <div class="form-group">
                        <input type="text" placeholder="Dispositivo" name="dispositivo" class="form-control" value="<?php echo $dispositivo; ?>">
                    </div>

                    <div class="form-group text-center ">
                        <select name="modelo" id="mod" value="<?php echo $modelo; ?>">
                        <option value="Samsung">Samsung</option>
                        <option value="Iphone">Iphone</option>
                        <option value="Microsoft">Mincrosoft</option>
                        <option value="Nokia">Nokia</option>
                        <option value="Samsung">LG</option>
                        <option value="Philips">Philips</option>
                        <option value="Xiaomi#">Xiaomi</option>
                        <option value="VGH">VGH</option>
                        <option value="Realme">Realme</option>
                        <option value="LCD">LCD</option>
                        <option value="Huawei">Huawei</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" placeholder="N° Serie" class="form-control" name="num_serie" value="<?php echo $serie; ?>">
                    </div>

                    <button class="btn btn-success" name="update"> Update </button>

                </form>

            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>