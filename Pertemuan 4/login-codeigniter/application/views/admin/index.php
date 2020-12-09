<!DOCTYPE html>
<html>
<head>
    <itle>user PABw</title>
</head>
<body>
    <table border="0" cellpadding="10" cellspasing="1" width="100%">
        <tr>
            <td align="senter">admin Dashboard</td>
        </tr>
        <tr>
            <td>
            selamat datang <?= $this->session->userdata('username');?>.
            klik disini untuk <a href="<?=base_url('admin/logout');?>" tile="Logout"> Logout.
            </td>
        </tr>
        <tr>
            <td><a href="<?=base_url('admin/get_artikel');?>">create</a></td>
        </tr>
    </table>
    <table border="1" cellpadding="10" cellspasing="1" width="100%">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Isi artikel</th>
            <th>Opsi</th>
        </tr>
    <?php $No=1; foreach ($artikel as $tampil)  {?>
        <tr>
            <td>
                <?= $No++; ?>
            </td>
            <td>
            <?= $tampil->judul_artikel; ?>
            </td>
            <td>
            <?= $tampil->isi_artikel; ?>
            </td>
            <td>
            <?= anchor('admin/update/' . $tampil->id_konten, 'Edit'); ?>
            <?= anchor('admin/delete/' . $tampil->id_konten, 'Hapus'); ?>
            </td>
        </tr>
    
    <?php } ?>
    </table>
</body>
</html>