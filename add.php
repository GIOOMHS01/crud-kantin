<html>
<head>
    <title>Add Users</title>
</head>
 
<body>
    <a href="menu.php">Go to Home</a>
    <br/><br/>
 
    <form action="add.php" method="post" name="form1">
        <table width="25%" border="1">
            <tr> 
                <td>nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr> 
                <td>jenis</td>
                <td>
                    <select name="jenis" id="" value=<?php echo $jenis;?>>
                    <option value="makanan">Makanan</option>
                    <option value="minuman">minuman</option>
                    </select>
                </td>
            </tr>
            <tr> 
                <td>harga</td>
                <td><input type="text" name="harga"></td>
            </tr>
            </tr>
            <tr> 
                <td>id_penjual</td>
                <td><input type="text" name="id_penjual"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
    
    <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $nama = $_POST['nama'];
        $jenis = $_POST['jenis'];
        $harga = $_POST['harga'];
        $id_penjual = $_POST['id_penjual'];
        
        // include database connection file
        include_once("config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO menu(nama,jenis,harga,id_penjual) VALUES('$nama','$jenis','$harga','$id_penjual')");
        
        // Show message when user added
        echo "User added successfully. <a href='menu.php'>View Users</a>";
    }
    ?>
</body>
</html>