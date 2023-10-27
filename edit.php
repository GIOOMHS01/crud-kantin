<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for menu update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $id = $_POST['id'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];
    $id_penjual = $_POST['id_penjual']; // Update the id_penjual

    // Update menu data
    $result = mysqli_query($mysqli, "UPDATE menu SET nama='$nama', jenis='$jenis', harga='$harga', id_penjual='$id_penjual' WHERE id_menu=$id");

    // Redirect to homepage to display updated menu in list
    header("Location: menu.php");
}

// Display selected menu data based on id
// Getting id from URL
$id = $_GET['id'];

// Fetch menu data based on id
$result = mysqli_query($mysqli, "SELECT * FROM menu WHERE id_menu=$id");

while ($menu_data = mysqli_fetch_array($result)) {
    $nama = $menu_data['nama'];
    $jenis = $menu_data['jenis'];
    $harga = $menu_data['harga'];
    $id_penjual = $menu_data['id_penjual'];
}
?>
<html>

<head>
    <title>Edit Menu Data</title>
</head>

<body>
    <a href="menu.php">Home</a>
    <br /><br />

    <form name="update_menu" method="post" action="edit.php">
        <table border="1">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo $nama; ?>"></td>
            </tr>
            <tr>
                <td>Jenis</td>
                <td>
                    <select name="jenis" id="">
                        <option value="makanan" <?php if ($jenis == "makanan") echo "selected"; ?>>Makanan</option>
                        <option value="minuman" <?php if ($jenis == "minuman") echo "selected"; ?>>Minuman</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="number" name="harga" value="<?php echo $harga; ?>"></td>
            </tr>
            <tr>
                <td>Penjual</td>
                <td>
                    <select name="id_penjual">
                        <?php
                        include_once("config.php");
                        $penjual = mysqli_query($mysqli, "SELECT * FROM penjual ORDER BY idp DESC");

                        while ($data = mysqli_fetch_array($penjual)) {
                            $selected = $id_penjual == $data['idp'] ? "selected" : "";
                            echo '<option value="' . $data['idp'] . '"' . $selected . '>' . $data['nama_penjual'] . '</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>

</html>