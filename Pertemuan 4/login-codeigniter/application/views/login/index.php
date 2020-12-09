<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
</head>
<body>
    <?=$this->session->flashdata('message');?>
    <form method="post" action="<?=base_url('login/ceklogin');?>">
        <table>
            <tr>
                <td align="center" colspan="2">enter login details</td>
            </tr>
            <tr>
                <td align="right">Username</td>
                <td>
                    <input type="text" name="user_name">
                </td>
            </tr>
            <tr>
                <td align="right">Password</td>
                <td>
                    <input type="password" name="password">
                </td>
            </tr>
                <td align="center" colspan="2">
                    <button type="submit">SUBMIT</button>
                </td>
            <tr>
            </tr>
        </table>
    </form>
</body>
</html>
