<!DOCTYPE html>
<html lang="en">
<head>
    <title>user</title>
</head>
<body>
    <form action="<?=base_url('user/input_artikel');?>" method="post">
    <label> input judul anda </label> <br>
    <input type="text" name="judul"><br>
    <label> tulis artikel anda </label><br>
    <input type="text" name="konten"><br> <br>
    <input type="submit" value="submit">
    </form>
</body>
</html>