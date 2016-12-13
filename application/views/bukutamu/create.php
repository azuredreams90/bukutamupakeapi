<?php echo form_open('bukutamu/create');?>
<table>
    <tr>
        <td>Nama</td>
        <td><?php echo form_input('nama',set_value('nama')). form_error('nama');  ?></td>
    </tr>
    <tr>
        <td>Komentar</td>
        <td><?php echo form_input('komentar',set_value('komentar')). form_error('komentar');?></td>
    </tr>
        <tr><td colspan="2">
        <?php echo form_submit('submit','Tambah Komentar');?>
        <?php echo anchor('bukutamu','Kembali');?></td></tr>
</table>
<?php
echo form_close();
?>