<?php echo form_open('bukutamu/edit');?>
<?php echo form_hidden('id',$bukutamu[0]->id);?>
<table>
    <tr>
        <td>Nama</td>
        <td><?php echo form_input('nama', $bukutamu[0]->nama);?></td>
    </tr>
    <tr>
        <td>Komentar</td>
        <td><?php echo form_input('komentar', $bukutamu[0]->komentar);?></td>
    </tr>
        <tr><td colspan="2">
        <?php echo form_submit('submit','Update Komentar');?>
        <?php echo anchor('bukutamu','Kembali');?></td></tr>
</table>
<?php
echo form_close();
?>