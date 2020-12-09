<!DOCTYPE html>
<html lang="en">
<head>
    <title>admin</title>
</head>
<body>
    <?php foreach ($user as $tampil) { ?>
    <form action="<?=base_url('admin/save_update');?>" method="post">
    <input type="hidden" name="id" value="<?=$tampil->id_konten?>">
    <label> input judul anda </label> <br>
    <input type="text" name="judul" value="<?=$tampil->judul_artikel?>"><br>
    <label> tulis artikel anda </label><br>
    <input type="text" name="konten" value="<?=$tampil->isi_artikel?>"><br> <br>
    <input type="submit" value="submit">
    </form>
    <?php } ?>
</body>
</html>