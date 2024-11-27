 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1 class="m-0">Client</h1>
                 </div><!-- /.col -->
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="<?= base_url('Admin/index') ?>">Dasboard</a></li>
                         <li class="breadcrumb-item active">Client</li>
                     </ol>
                 </div>
             </div><!-- /.row -->
         </div><!-- /.container-fluid -->
     </div>
     <!-- /.content-header -->
     <?=$this->session->flashdata('message');?>
     <!-- Main content -->
     <div class="content">
         <div class="d-grid gap-2 d-md-block mb-2 ms-2">
             <!-- Button trigger modal -->
             <button type=" button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#add">
                 Add Data <i class="bi bi-plus-square"></i>
             </button>

             <!-- Modal -->
             <form method="post" action="<?=base_url('Admin/addClient');?>" enctype="multipart/form-data">
                 <div class=" modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                         <div class=" modal-content">
                             <div class="modal-header">
                                 <h1 class="modal-title fs-5" id="exampleModalLabel">Form Add data</h1>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal"
                                     aria-label="Close"></button>
                             </div>
                             <div class="modal-body">
                                 <div class="mb-3">
                                     <label for="exampleInputEmail1" class="form-label">Name</label>
                                     <small class="text-danger"><?=form_error('name');?></small>
                                     <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                                         aria-describedby="emailHelp">
                                 </div>

                                 <div class="mb-3">
                                     <label for="exampleInputPassword1" class="form-label">Image</label>
                                     <input type="file" class="form-control" name="image" id="exampleInputPassword1">
                                 </div>

                             </div>
                             <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-primary">Tambah</button>
                             </div>
                         </div>
                     </div>
                 </div>
             </form>
         </div>
         <!-- Default box -->
         <div class="card">
             <div class="card-body p-2">
                 <table class="table table-striped projects">
                     <thead>
                         <tr>
                             <th style="width: 5%">
                                 #
                             </th>
                             <th style="width: 20%">
                                 Name
                             </th>
                             <th style="width: 20%">
                                 Created
                             </th>
                             <th style="width: 20%">
                                 Modified
                             </th>
                             <th>
                                 Image
                             </th>
                             <th style="width: 20%">
                             </th>
                         </tr>
                     </thead>
                     <tbody>

                         <!-- <?php if (empty($infoclient)): ?>
                         <div class="alert alert-danger" role="alert">
                             data not found
                         </div>
                         <?php endif;?> -->

                         <?php if (!empty($infoclient)) {$no = $this->uri->segment(3)
                         ;
    foreach ($infoclient as $s) {$no++;
        ?>
                         <tr>
                             <td scope="row"><?=$no?>.</td>
                             <td><?=$s['name']?></td>
                             <td><?=$s['created']?></td>
                             <td><?=$s['modified']?></td>
                             <td><?=$s['image']?></td>
                             <td>
                                 <!-- Button add trigger modal -->
                                 <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                     data-bs-target="#edit<?php echo $s['id']; ?>">
                                     <i class="fas fa-pencil-alt">
                                     </i> Edit
                                 </button>
                                 <!-- Button edit -->
                                 <a href="<?php echo base_url('Admin/deleteClient/' . $s['id']); ?>"
                                     class="btn btn-danger btn-sm"
                                     onclick="return confirm('Are you sure to delete data?')?true:false;">
                                     <i class="fas fa-trash">
                                     </i>Delete</a>

                                 <!-- Modal -->
                                 <form enctype="multipart/form-data"
                                     action="<?=base_url('Admin/editClient/'. $s['id']);?>" method="POST">
                                     <div class="modal fade" id="edit<?php echo $s['id']; ?>" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                         <div class="modal-dialog">
                                             <div class="modal-content">
                                                 <div class="modal-header">
                                                     <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
                                                     <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                         aria-label="Close"></button>
                                                 </div>
                                                 <div class="modal-body">
                                                     <input type="hidden" name="id" value="<?php echo $s['id']; ?>">
                                                     <div class="mb-3">
                                                         <label for="exampleInputEmail1" class="form-label">Name</label>
                                                         <small class="text-danger"><?=form_error('name');?></small>
                                                         <input type="text" class="form-control" name="name"
                                                             id="exampleInputEmail1" aria-describedby="emailHelp"
                                                             value="<?php echo $s['name']; ?>">
                                                     </div>
                                                     <div class="mb-3">
                                                         <label for="exampleInputPassword1"
                                                             class="form-label">Image</label>
                                                         <input type="file" class="form-control" name="image"
                                                             id="exampleInputPassword2">
                                                     </div>

                                                 </div>
                                                 <div class="modal-footer">
                                                     <button type="button" class="btn btn-secondary"
                                                         data-bs-dismiss="modal">Close</button>
                                                     <button type="submit" class="btn btn-primary">Save changes</button>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </form>
                                 <!-- End Modal -->

                             </td>
                         </tr>
                         <?php }}?>

                         <?php ?>
                     </tbody>
                 </table>
                 <hr>
                 <?= $link ?>
             </div>
             <!-- /.card-body -->
         </div>
         <!-- /.card -->
     </div>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->