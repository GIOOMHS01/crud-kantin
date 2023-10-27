<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $id_menu = $_POST['id_menu'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];
    $id_penjual = $_POST['id_penjual'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE menu SET id_menu='$id_menu',jenis='$jenis',harga='$harga',id_penjual='$id_penjual' WHERE id_menu=$id");

    // Redirect to homepage to display updated user in list
    header("Location: menu.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM menu WHERE id_menu=$id");

while ($user_data = mysqli_fetch_array($result)) {
    $id_menu = $user_data['id_menu'];
    $jenis = $user_data['jenis'];
    $harga = $user_data['harga'];
    $id_penjual = $user_data['id_penjual'];
}
?>
<html>

<head>
    <title>Edit User Data</title>
</head>

<body>
    <a href="menu.php">Home</a>
    <br /><br />

    <form name="update_menu" method="post" action="edit.php">
        <table border="1">
            <tr>
                <td>id_menu</td>
                <td><input type="text" name="id_menu" value=<?php echo $id_menu; ?>></td>
            </tr>
            <tr>
                <td>jenis</td>
                <td>
                    <select name="jenis" id="">
                        <option value="makanan">Makanan</option>
                        <option value="minuman">Minuman</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>harga</td>
                <td><input type="number" name="harga" value=<?php echo $harga; ?>></td>
            </tr>
            <tr>
                <td>penjual</td>
                <td>
                    <select name="idp">
                        <?php
                        include_once("config.php");
                        $penjual = mysqli_query($mysqli, "SELECT * FROM penjual ORDER BY idp DESC");

                        while ($data = mysqli_fetch_array($penjual)) {
                            $selected = $id_penjual == $data['idp'] ? "selected" : "";
                            echo '<option value="' . $data['idp'] . '"' . $selected . '>' . $data['nama_penjual'] . '</option>';
                        }
                        ?>
                </td>
            </tr>
            <tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>

</html>