<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id = $_POST['id'];
    
    $nama=$_POST['nama'];
    $jenis=$_POST['jenis'];
    $harga=$_POST['harga'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE menu SET nama='$nama',jenis='$jenis',harga='$harga' WHERE id=$id");
    
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
 
while($user_data = mysqli_fetch_array($result))
{
    $nama = $user_data['nama'];
    $jenis = $user_data['jenis'];
    $harga = $user_data['harga'];
}
?>
<html>
<head>	
    <title>Edit User Data</title>
</head>
 
<body>
    <a href="menu.php">Home</a>
    <br/><br/>
    
    <form name="update_menu" method="post" action="edit.php">
        <table border="1">
            <tr> 
                <td>nama</td>
                <td><input type="text" name="nama" value=<?php echo $nama;?>></td>
            </tr>
            <tr> 
                <td>jenis</td>
                <td><input type="text" name="jenis" value=<?php echo $jenis;?>></td>
            </tr>
            <tr> 
                <td>harga</td>
                <td><input type="text" name="harga" value=<?php echo $harga;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>