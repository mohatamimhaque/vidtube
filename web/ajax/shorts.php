<?php
include "../../studio/includes/config.php";

if (isset($_POST["operation"])) {
    $u = "";
    $query = "
   		SELECT * FROM video WHERE status = '0'
   	";
    $limit = $_POST["limit"];
    $start = $_POST["start"];



    $statement = $connect->prepare($query);
    $statement->execute();
    $total_data = $statement->rowCount();
    if ($start <= $total_data) {
        $filter_query = $query . " LIMIT $start,$limit";

        $statement = $connect->prepare($filter_query);
        $statement->execute();
        $result = $statement->fetchAll();
        $total_filter_data = $statement->rowCount();

        foreach ($result as $row) {
            $th = "studio/uploads/" .$row["unique_id"] ."/thumbnail/" .explode(",", $row["thumbnail"])[$row["active_thumbnail"]];
            $start++;
            $c = $row["owner"];
            $owner = mysqli_query(
                $con,
                "SELECT * FROM channel_list WHERE status=0 AND author_id='$c'"
            );
            if (mysqli_num_rows($owner) > 0) {
                foreach ($owner as $o); 
            
        ?>
                <div class="post">
                  <div class="desktop">
                     <input type="text" style="display:none" class="title" value="<?= $row['title']?>">
                     <div class="controlTop">
                        <span class="icon">
                        <i class="material-icons play_pause">play_arrow</i>
                        </span>
                        <span class="icon">
                        <i class="material-icons volume" title = 'mute(m)'>volume_up</i>
                        <input type="range" min="0" max="100" class="volume_range">
                        </span>
                     </div>
                     <div class="overlay">
                        <span class="icon">
                        <i class="material-icons">play_arrow</i>
                        </span>
                     </div>
                     <div class="post-footer">
                        <div class="username ">
                           <div class="thumb">
                           <img src="<?= base_url(
                            "upload/image/channel/profile_photo/" . $o["profile_photo"]
                        ) ?> " alt="">
                           </div>
                           <a href="#" class="username-link"><?= $o["name"] ?></a>
                           <button>Subscribe</button>
                        </div>
                        <p class="post-description">
                          <?= shortenString($row['about'],120) ?>
                        </p>
                     </div>
                  </div>
                  <div class="desktop-sideber">
                     <div class="side-icon like">
                        <span class="icon">
                        <i class="fa-solid fa-thumbs-up"></i>
                        </span>
                        <p>I like this</p>
                        <span>Like</span>
                     </div>
                     <div class="side-icon dislike">
                        <span class="icon">
                        <i class="fa-solid fa-thumbs-down"></i>
                        </span>
                        <p>I dislike this</p>
                        <span>Dislike</span>
                     </div>
                     <div class="side-icon comment">
                        <span class="icon">
                        <i class="material-icons">comment</i>
                        </span>
                        <p>Comments</p>
                        <span><?= $row['comments']?></span>
                     </div>
                     <div class="side-icon share" title="">
                        <span class="icon">
                        <i class="fa-solid fa-share"></i>
                        </span>
                        <p>Share</p>
                        <span>Share</span>
                     </div>
                     <div class="side-icon more">
                        <span class="icon">
                        <i class="material-icons">more_vert</i>
                        </span>
                     </div>
                  </div>
                  <div class="moreModal">
                     <button class="moreModal-item">
                        <span class="icon">
                           <svg xmlns="http://www.w3.org/2000/svg" height="24"  viewBox="0 0 24 24" width="24" focusable="false" aria-hidden="true">
                              <path d="M21 6H3V5h18v1zm-8 3-9.99.01V10L13 9.99V9zm8 4H3v1h18v-1zm-8 4H3v1h10v-1z"></path>
                           </svg>
                        </span>
                        Description
                     </button>
                     <button class="moreModal-item">
                        <span class="icon">
                           <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24" focusable="false"aria-hidden="true">
                              <path d="M18 4v15.06l-5.42-3.87-.58-.42-.58.42L6 19.06V4h12m1-1H5v18l7-5 7 5V3z"></path>
                           </svg>
                        </span>
                        Save to playlist
                     </button>
                     <button class="moreModal-item">
                        <span class="icon">
                           <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24" focusable="false"aria-hidden="true">
                              <path d="M6 14v-4c0-.55.45-1 1-1h3c.55 0 1 .45 1 1v1H9.5v-.5h-2v3h2V13H11v1c0 .55-.45 1-1 1H7c-.55 0-1-.45-1-1zm8 1h3c.55 0 1-.45 1-1v-1h-1.5v.5h-2v-3h2v.5H18v-1c0-.55-.45-1-1-1h-3c-.55 0-1 .45-1 1v4c0 .55.45 1 1 1zm6-11H4v16h16V4m1-1v18H3V3.01C3 3 3 3 3.01 3H21z"></path>
                           </svg>
                        </span>
                        Captions
                     </button>
                     <button class="moreModal-item">
                        <span class="icon">
                           <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24" focusable="false"aria-hidden="true">
                              <g>
                                 <path d="M12 3c-4.96 0-9 4.04-9 9s4.04 9 9 9 9-4.04 9-9-4.04-9-9-9m0-1c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2zm7 11H5v-2h14v2z"></path>
                              </g>
                           </svg>
                        </span>
                        Don't recommend this channel
                     </button>
                     <button class="moreModal-item">
                        <span class="icon">
                           <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24" focusable="false"aria-hidden="true">
                              <path d="m13.18 4 .24 1.2.16.8H19v7h-5.18l-.24-1.2-.16-.8H6V4h7.18M14 3H5v18h1v-9h6.6l.4 2h7V5h-5.6L14 3z"></path>
                           </svg>
                        </span>
                        Report
                     </button>
                     <button class="moreModal-item">
                        <span class="icon">
                           <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24" focusable="false"aria-hidden="true">
                              <path d="M13 14h-2v-2h2v2zm0-9h-2v6h2V5zm6-2H5v16.59l3.29-3.29.3-.3H19V3m1-1v15H9l-5 5V2h16z"></path>
                           </svg>
                        </span>
                        Send feedback
                     </button>
                  </div>
                  <div class="video-player">
                     <video src="<?= $url ."studio/uploads/" .$row["unique_id"] ."/video/" .
                                $row["video"] ?>" class="post-video" poster="<?= base_url($th) ?>"></video>
                  </div>
               </div>





             

<!--videoo end-->
<?php
        }}
        echo "<script>window.start = " . $start . " </script>";
    }
}

?>
