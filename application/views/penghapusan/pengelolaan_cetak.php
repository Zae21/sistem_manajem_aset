<!DOCTYPE html>
<html>
  <head>
    <title>Pengelolaan Invoice</title>
    <style type="text/css">
    #outtable{
    padding: 5px;
    border:1px solid #e3e3e3;
    border-radius: 5px;
    }
    
    .short{
    width: 50px;
    }
    
    .normal{
    width: 150px;
    }
    
    table{
    border-collapse: collapse;
    font-family: arial;
    color:#5E5B5C;
    }
    
    thead th{
    text-align: left;
    padding: 10px;
    }
    
    tbody td{
    border-top: 1px solid #e3e3e3;
    padding: 10px;
    }
    
    tbody tr:nth-child(even){
    background: #F6F5FA;
    }
    
    tbody tr:hover{
    background: #EAE9F5
    }
    </style>
  </head>
  <body>
    <div id="outtable">
      <div>
        <h3>Report Invoice</h3>
        <h4></h4>
        
      </div>
      <table>
        <thead>
          <tr>
            <th class="short">#</th>
            <th width="150">ID Pengelolaan</th>
            <th width="150">Tgl Transaksi</th>
            <th width="150">Status Kelola</th>
            <th width="150">ID Staff Penginput</th>
            <th width="150">Peminjam</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; ?>
          <?php foreach($hasil_detail as $data): ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $data->id_pengelolaan ?></td>
            <td><?php echo $data->tgl_transaksi ?></td>
            <td><?php echo $data->status_pengelolaan ?></td>
            <td><?php echo $data->nama_user ?></td>
            <td><?php echo $data->peminjam ?></td>
          </tr>
          <?php $no++; ?>
          <?php endforeach; ?> 
        </tbody>
      </table>
    </div>
  </body>
</html>
<script type="text/javascript">
  window.print()
</script>