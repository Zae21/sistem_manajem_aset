<!DOCTYPE html>
<html>
  <head>
    <title>Invoice Perencanaan</title>
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
      <thead>Report Invoice Planning</thead>
      <th>CV. Iframe Multimedia Yogyakarta</th>
      
      <h4></h4>
      
    </div>
    <table>
      <thead>
        <tr>
          <th class="short">#</th>
          <th width="150">ID Perencanaan</th>
          <th width="150">Tgl Transaksi</th>
          <th width="150">ID Kategori Asset</th>
          <th width="150">ID Jenis Asset</th>
          <th width="150">Nama Asset</th>
          <th width="150">Jumlah Asset</th>
          <th width="150">Harga Asset</th>
          <th width="150">Total Harga Asset</th>
        </tr>
      </thead>
      <tbody>
        <?php $no=1; ?>
        <?php foreach($hasil_detail as $data): ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $data->id_perencanaan ?></td>
          <td><?php echo $data->tgl_transaksi ?></td>
          <td><?php echo $data->nama_kategori ?></td>
          <td><?php echo $data->nama_jenis ?></td>
          <td><?php echo $data->nama_asset ?></td>
          <td><?php echo $data->jumlah ?></td>
          <td><?php echo $data->harga ?></td>
          <td><?php echo $data->total_harga ?></td>
        </tr>
        <?php $no++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <table style="padding:5px;">
    <tr>
      <th style="background-color:#ccc" align="center">Subtotal</th>
      <td></td>
    </tr>
  </table>
  <table>
    <tr align="center">
      <td>Yogyakarta, <?php date('Y-m-d') ?></td>
    </tr>
  </table>';
  <table cellspacing="40">
    <tr align="center">
      <td>( Pimpinan )</td>
      <td>( Operator )</td>
    </tr>
  </table>
</body>
</html>
<script type="text/javascript">
window.print()
</script>