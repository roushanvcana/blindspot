<?php include('common/header.php') ?>

<div class="col-sm-6 ">
    <h1 class="front"> Manage Startup</h1>
</div>

<?php  print_r($getValue);
              if(empty($getValue['id'])){
                $Urlsc = "startup-add"; 
              }else{
                $Urlsc = "startup-edit"; 
              }
            ?>       
<div class="col-md-12 one-col ">
    <div class="col-md-4 bg-white one-cola">
        <div class="find">
        <form method="post" id="myform" action="<?php echo base_url().$Urlsc?>">
        <input type="hidden" name="hid" value="<?php echo $getValue['id']; ?>">
  <label for="past_content">Past Content:</label><br>
  <textarea rows="2" cols="10" name="past_content" required  value=""><?php echo $getValue['past_content']; ?>
</textarea><br>
  <label for="future_content">Future Content</label><br>
  <textarea rows="2" cols="10" name="future_content" required><?php echo $getValue['future_content']; ?>
</textarea><br><br>
<label for="middle_content">Future Content</label><br>
  <textarea rows="2" cols="10" name="middle_content" required><?php echo $getValue['middle_content']; ?>
</textarea><br><br>
<label for="position">Position:</label><br>
  <input type="text" id="position" name="position" value="<?php echo $getValue['past_content']; ?>" required><br><br>
       
                    
                    <?php if(empty($getValue['id'])){ ?>            
                        <input type="submit" value="Submit"  name="submit" >
                  <?php }else{?>
                    <input type="submit" value="Update"  name="submit" >
                    <?php }?>         
                   
                  
</form> 
            
        </div>
    </div>
    <div class="col-md-8 bg-white one-colb">
    <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Startup Details</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-2">
    <div class="card-header py-1">
        <h6 class="m-0 font-weight-bold text-primary">Information</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th> past content</th>
                        <th> future content</th>
                        <th> middle content</th>
                        <th> Position</th>
                        <th> Status</th>
                        <th>Action </th>
                       
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th> Past content</th>
                        <th> Future content</th>
                        <th>middle content</th>
                        <th> Position</th>
                        <th> Status</th>
                        <th>Action </th>
                    </tr>
                </tfoot>
                <tbody>
                <?php 
           $i=1;
           if(count($details)){
           foreach($details as $detail):
           
        ?>
                    <tr>
                        <td><?php echo $detail['past_content'];?></td>
                        <td><?php echo $detail['future_content'];?></td>
                        <td><?php echo $detail['middle_content'];?></td>
                        <td><?php echo $detail['position'];?></td>
                        <td><?php echo $detail['position'];?> </td>
                        <td> 
                          <a class="btn btn-info btn-sm" href="<?= site_url() ?>/edit/<?= $detail['id']; ?>"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure ! You want to delete this record');"  href="<?= base_url()?>index.php/delete/<?= $detail['id']; ?>"><i class="fas fa-trash-alt"></i></a>
                      </td>
                    </tr>
        
                    <?php endforeach; }else{?>
          <tr>
            <td colspan="6" align="center">No record found....</td>
          </tr>
        <?php }?>
     
                 
                  
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
    </div>
</div>
<?php include('common/footer.php') ?>