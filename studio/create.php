<?php
   session_start();
   include('includes/config.php');
   
   if(!isset($_SESSION['loggedOren'])){
       header("location:".$url);
      exit(0);
   }
   else{
       $unique_id = $user['unique_id'];
       if(isset($_GET['channel_id'])){
       $id = $_GET['channel_id'];
       }
   
       $query = mysqli_query($con, "SELECT * FROM channel_list where unique_id = '$id' and author_id='$unique_id' LIMIT 1");
   
       if(mysqli_num_rows($query) > 0){
           foreach($query as $row){
               $page_title = $row['name'];
   
   include('includes/header.php');
   ?>
<link rel="stylesheet" href="<?= base_url('studio/assets/css/studio.css') ?>">
        <div id="layout-wrapper">
        <?php
            include('includes/navbar.php');
            include('includes/appmenu.php');
            include('includes/create.php');
            ?>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row flex">



            
            <div class="firstpage visible bg-soft-success">
               <div class="drop-zone">
                  <input type="file" id="videos" name="video" accept=".mp4" style="display:none" class="drop-zone__input">
                  <label for="videos" id="animation">
                     <div id="circle">
                        <div id="arrow-group">
                           <div id="arrow">
                              <div id="arrow-tip"></div>
                              <div id="smoke" ></div>
                              <div id="arrow-line"></div>
                           </div>
                           <div id="arrow-underline"></div>
                        </div>
                        <div id="speed-line"><img alt="" src="https://www.gstatic.com/youtube/img/creator/uploads/speed_line_darkmode.svg"></div>
                        <div id="burst" class="btn-soft-info">
                           <div id="stroke" class="btn-soft-info"></div>
                        </div>
                     </div>
                  </label>
                  <h5 class="mt-2 text-info">Drag and drop video files to upload</h5>
                  <p class="text-success">Your videos will be private until you publish them.</p>
                  <label for="videos" class="btn btn-soft-info mt-3">Select Files</label>
               </div>
            </div>





                    </div>
                   
                </div>
            </div>
        </div>
        </div>


<?php
   include('includes/script.php');
   include('includes/createJs.php');
   ?>

<?php
   include('includes/footer.php');
   }
   }
   
   }
   
   ?>