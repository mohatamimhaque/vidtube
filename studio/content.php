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
                    <div class="tab-menu">
                        <ul class="tabs">
                            <li class="tab-link active" data-tab="tab-1">Videos</li>
                            <li class="tab-link" data-tab="tab-2">Shorts</li>
                            <li class="tab-link" data-tab="tab-3">Live</li>
                            <li class="tab-link" data-tab="tab-4">Posts</li>
                            <li class="tab-link" data-tab="tab-5">Playlists</li>
                            <li class="tab-link" data-tab="tab-6">Podcasts</li>
                            <li class="tab-link" data-tab="tab-7">Promotions</li>
                        </ul>

                        <div id="tab-1" class="tab-content active">
                        <table id="long_videos" class="display" style="width:100%">
                            <thead>
                                <th></th>
                                <th style="width:180px;justify-content:flex-start">Video</th>
                                <th>Visibility</th>
                                <th>Restrictions</th>
                                <th>Date</th>
                                <th>Views</th>
                                <th>Comments</th>
                            </thead>
                            <tbody>
                                <?php
                                    $query = mysqli_query($con,"SELECT * FROM video WHERE owner = '$unique_id' order by id");
                                    if(mysqli_num_rows($query)>0){
                                        foreach($query as $video){
                                            if((int)$video['status'] == 0){
                                                $status = "<i class='material-icons' style='font-size:16px'>lock</i> <span style='font-size:13px'>Private</span>";
                                            }else if((int)$video['status'] == 1){
                                                $status = "<i class='material-icons' style='font-size:16px'>link</i> <span style='font-size:13px'>Unlisted</span>";
                                            }else if((int)$video['status'] == 2){
                                                $status = "<i class='material-icons' style='font-size:16px'>public</i> <span style='font-size:13px'>Public</span>";
                                            };

                                            if((int)$video['audience'] == 0){
                                                $audience = 'Made for kids';
                                            }else{
                                                $audience = 'None';
                                            };

                                ?>  
                                <tr>
                                    <td></td>
                                    <td>
                                        <div class="video-row">
                                            <div class="video-thumbnail">
                                                <div class="img">
                                                    <img src="<?= base_url('studio/uploads/'.$video['unique_id'].'/thumbnail/'.explode(',',$video['thumbnail'])[$video['active_thumbnail']]) ?>" alt="">
                                                </div>
                                                <span><?= timeFormat($video['duration'])  ?></span>
                                            </div>
                                            <div class="info">
                                                <button class="name modalActive" data-src="<?= base_url('studio/uploads/'.$video['unique_id'].'/video/'.$video['video']) ?>" value="<?= $video['unique_id'] ?>">
                                                    <?= shortenString($video['title'],48) ?>
                                                    <span class="tooltip-text"><?= $video['title'] ?></span>
                                                </button>

                                                <span>Add description</span>
                                                <button class="infoBtn modalActive" data-src="<?= base_url('studio/uploads/'.$video['unique_id'].'/video/'.$video['video']) ?>" value="<?= $video['unique_id'] ?>">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="display:flex;align-items:center;justify-content:center"><?= $status ?></td>
                                    <td style="text-align:center;font-size:13px"><?= $audience ?> </td>
                                    <td style="text-align:center;font-size:13px;white-space:nowrap"><?= $video['created_at'] ?></td>
                                    <td style="text-align:center;font-size:13px"><?= $video['views'] ?> </td>
                                    <td style="text-align:center;font-size:13px"><?= $video['comments'] ?> </td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                                
                            </tbody>
                        </table>







                        </div>
                        <div id="tab-2" class="tab-content">
                            <h2>Shorts</h2>
                            <p>This is the Shorts content.</p>
                        </div>
                        <div id="tab-3" class="tab-content">
                            <h2>Live</h2>
                            <p>This is the Live content.</p>
                        </div>
                        <div id="tab-4" class="tab-content">
                            <h2>Posts</h2>
                            <p>This is the Posts content.</p>
                        </div>
                        <div id="tab-5" class="tab-content">
                            <h2>Playlists</h2>
                            <p>This is the Playlists content.</p>
                        </div>
                        <div id="tab-6" class="tab-content">
                            <h2>Podcasts</h2>
                            <p>This is the Podcasts content.</p>
                        </div>
                        <div id="tab-7" class="tab-content">
                            <h2>Promotions</h2>
                            <p>This is the Promotions content.</p>
                        </div>
                    </div>


            
          




                    </div>
                   
                </div>
            </div>
        </div>
        </div>


<?php
   include('includes/script.php');
   include('includes/createJS.php');
   ?>
<link href="https://cdn.datatables.net/v/ju/dt-2.1.4/af-2.7.0/cr-2.0.4/r-3.0.2/sl-2.0.5/datatables.min.css" rel="stylesheet">
 
 <script src="https://cdn.datatables.net/v/ju/dt-2.1.4/af-2.7.0/cr-2.0.4/r-3.0.2/sl-2.0.5/datatables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script>
new DataTable('#long_videos', {
    keys: true,
    autoFill: {
        focus: 'click'
    },
    responsive: true,
    columnDefs: [
        {
            targets: 0,
            render: DataTable.render.select(),
            orderable: false, 
        },
        {
            targets: 4,
            render: function(data, type, row, meta) {
                return moment(data).format('MMMM Do, YYYY');
            },
            type: 'date' 
        }
    ],
    select: {
        style: 'multi',
        headerCheckbox: 'select-page',
        selector: 'td:first-child'
    },
    order: [[, 'asc']], // Sort by the second column (index 1)
    colReorder: {
        columns: ':not(:first-child, :last-child)' // Exclude the first and last columns from reorder
    },
    rowId: 'id', // Use 'id' property of the data as the row ID
    stateSave: true
});

</script>
<style>
    table,
    div.dt-container .dt-paging .fg-button,
    div.dt-container .dt-length, div.dt-container .dt-search, div.dt-container .dt-info, div.dt-container .dt-processing, div.dt-container .dt-paging {
    color: rgba(200,200,200);
  }
  th,td{
    font-size:13px;
   
    border:none;

  }
  
</style>
<?php
   include('includes/footer.php');
   }
   }
   
   }
   
   ?>