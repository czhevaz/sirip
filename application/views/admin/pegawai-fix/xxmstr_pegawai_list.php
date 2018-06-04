<div class="page-wrapper">
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Pegawai</h3> </div>
        <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
            <li class="breadcrumb-item active">Pegawai</li>
        </ol>
      </div>
    </div>

<div class="col-12">
     <div class="card">
         <div class="card-body">
             <div class="table-responsive m-t-40">
                 <table id="example23" class="display nowrap table table-hover table-striped " cellspacing="0" width="100%">
                     <thead>
                         <tr>
                           <th>No</th>
                           <th>Nama Lengkap</th>
                           <th>Alamat</th>
                           <th>Jenis Kelamin</th>
                           <th>Tempat Lahir</th>
                           <th>Tgl Lahir</th>
                           <th>Email</th>
                           <th>Telepon</th>
                           <th style="text-align:center">Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                           <?php
                             foreach ($pegawai_data as $pegawai)
                             {
                             ?>
                             <td width="50px"><?php echo ++$start ?></td>
                             <td><?php echo $pegawai->NAMA_PEGAWAI ?></td>
                             <td><?php echo $pegawai->ALAMAT ?></td>
                             <td><?php echo $pegawai->GENDER ?></td>
                             <td><?php echo $pegawai->TEMPAT_LAHIR ?></td>
                             <td><?php echo $pegawai->TGL_LAHIR ?></td>
                             <td><?php echo $pegawai->EMAIL ?></td>
                             <td><?php echo $pegawai->PHONE ?></td>
                             <td style="text-align:center">

                               <?php
                           //    echo anchor(site_url('admin/pegawai/read/'.$pegawai->NIK),'Read');
                             //  echo ' | ';

                               echo anchor(site_url('admin/pegawai/update/'.$pegawai->NIK),
                                                     '<i class="fa fa-edit fa-lg" title="Edit" style="color:orange;">
               															          </i>
                                                     ');
                               echo '&nbsp&nbsp&nbsp';
                               echo anchor(site_url('admin/pegawai/delete/'.$pegawai->NIK),
                                                     '<i class="fa fa-trash fa-lg" title="Hapus" style="color:red;">
                               											  </i>
                                                      ',
                                                     'onclick="javasciprt: return confirm(\'Yakin Akan Menghapus data ini ?\')"');
                               ?>

                             </td>
                         </tr>
                         <?php
                           }
                         ?>
                     </tbody>
                 </table>
             </div>
         </div>
         <?php echo anchor(site_url('admin/pegawai/create'),'<button type="button" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Tambah</button>'); ?>
     </div>
   </div>
 </div>
 </div>
