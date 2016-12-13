<?php 
    echo anchor('bukutamu/create', 'Tambah Komentar');
 ?>
<table>
    <tr>
      <th>No</th><th>NAMA</th><th>Komentar</th><th></th>
    </tr>
    <?php
    if(!empty($bukutamu))
    {
      foreach ($bukutamu as $m){
        echo "<tr>
              <td>$m->id</td>
              <td>$m->nama</td>
              <td>$m->komentar</td>
              <td>".anchor('bukutamu/edit/'.$m->id,'Edit')."
                  ".anchor('bukutamu/delete/'.$m->id,'Delete')."</td>
              </tr>";
      }
    }else{
      echo"<tr>
            <td colspan='4'><strong>Data masih kosong</strong></td>
          </tr>";
    }
    ?>
</table>