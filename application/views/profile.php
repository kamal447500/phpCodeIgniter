<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet"> 
    <title>Login Page</title>
  </head>
  <body>
    
    <div class="col-lg-5 col-lg-offset-2">

      <h1>Profile:</h1>

      <?php if (isset($_SESSION['success'])) 
      { ?>
        <div class="alert alert-success"><?php echo $_SESSION['success']; ?></div>
      <?php
      } ?>

      HELLO, <?php echo $_SESSION['username']; ?>

      <br><br>

      <a href="<?php echo base_url(); ?>index.php/auth/logout">Logout</a>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>assets/css/bootstrap.min.js"></script> 

    <div class="container">
    <?php if( $error = $this->session->flashdata('required') ): ?>
      <div class="alert alert-dismissible alert-success">
        <?php echo $error; ?>
      </div>
    <?php endif; ?>
    <div class="row">
      <div class="col-lg-1">
        <?php echo anchor("user/create", 'Create', ['class'=>'btn btn-primary']); ?>
      </div>

     <?php if(isset($_SESSION['delete_user_id']) && $_SESSION['delete_user_id'] !=""){ ?>
      <div class="col-lg-2">
        <?php echo anchor("user/undo", 'Undo', ['class'=>'btn btn-primary']); ?>
      </div>
      <?php } ?>
    </div>


    <?php if( count($records) ): ?>
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>CustomerName</th>
              <th>Phone</th>
              <th>Adress</th>
              <th>City</th>
              <th>Country</th>
              <th>Operations</th>
            </tr>
          </thead>

          <tbody>
              <?php foreach ($records as $record): ?>
                <tr>
                  <td><?php echo $record->customerName; ?></td>
                  <td><?php echo $record->phone; ?></td>
                  <td><?php echo $record->address; ?></td>
                  <td><?php echo $record->city; ?></td>
                  <td><?php echo $record->country; ?></td>
                  <td><?php echo anchor("user/edit/{$record->id}", 'Update', ['class'=>'btn btn-success']); ?></td>
                  <td><?php echo anchor("user/delete/{$record->id}", 'Delete', ['class'=>'btn btn-success']); ?></td>
                </tr>
              <?php endforeach; ?>
          </tbody>
        </table>
              <?php else: ?>
                <tr>No Records Found...</tr>
            <?php endif; ?> 
      </div>
    
  </body>
</html>

