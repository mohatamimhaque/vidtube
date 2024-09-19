<?php
include "../../studio/includes/config.php";

if (isset($_POST["operation"])) {
    $u = "";
    $query = "
   		SELECT * FROM video WHERE status = '0'
   	";
    $limit = $_POST["limit"];
    $start = $_POST["start"];

    if (isset($_POST["category"])) {
        $query .=
            "
           AND category LIKE '%" .
            str_replace(" ", "%", $_POST["category"]) .
            "%'
           ";
        $u .= "category=" . $category[(int)$_POST["category"]] . "&";
    }
    if (isset($_POST["tags"])) {
        $query .=
            "
           AND tags LIKE '%" .
            str_replace(" ", "%", $_POST["tags"]) .
            "%'
           ";
        $u .= "tags=" . $_POST["tags"] . "&";
    }
    if (isset($_POST["cast"])) {
        $query .=
            "
           AND cast LIKE '%" .
            str_replace(" ", "%", $_POST["cast"]) .
            "%'
           ";
        $u .= "cast=" . $_POST["cast"] . "&";
    }
    if (isset($_POST["owner"])) {
        $query .=
            "
           AND owner LIKE '%" .
            str_replace(" ", "%", $_POST["owner"]) .
            "%'
           ";
        $u .= "channel=" . $_POST["owner"] . "&";
    }

    if (isset($_POST["duration"])) {
        if ($_POST["duration"] == "under4") {
            $query .=
                "
               AND duration <=" .
                4 * 60;
        } elseif ($_POST["duration"] == "between420") {
            $query .=
                "
               AND duration  between " .
                4 * 60 .
                " AND " .
                20 * 60;
        } elseif ($_POST["duration"] == "over20") {
            $query .=
                "
               AND duration >=" .
                20 * 60;
        }
        $u .= "duration=" . $_POST["duration"] . "&";
    }
    if (isset($_POST["upload_time"])) {
        if ($_POST["upload_time"] == "last_hour") {
            $time = date("Y-m-d H:i:s", strtotime("-60minutes"));
        }
        if ($_POST["upload_time"] == "today") {
            $time = date("Y-m-d 00:00:00");
        }
        if ($_POST["upload_time"] == "this_week") {
            $time = date("Y-m-d 00:00:00", strtotime("-" . date("w") . "days"));
        }
        if ($_POST["upload_time"] == "this_month") {
            $time = date("Y-m-01 00:00:00");
        }
        if ($_POST["upload_time"] == "this_year") {
            $time = date("Y-01-01 00:00:00");
        }

        $query .= "
               AND created_at>= '$time'";
        $u .= "upload_time=" . $_POST["upload_time"] . "&";
    }
    if (isset($_POST["find"])) {
        $search = mysqli_query(
            $con,
            "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'video'"
        );
        foreach ($search as $s) {
            foreach ($s as $s) {
                if ($s == "id") {
                    $query .=
                        "
                       AND $s LIKE '%" .
                        str_replace(" ", "%", $_POST["find"]) .
                        "%' 
                       ";
                } else {
                    $query .=
                        "
                       OR $s LIKE '%" .
                        str_replace(" ", "%", $_POST["find"]) .
                        "%' 
                       ";
                }
            }
        }
        $u .= "find=" . $_POST["find"] . "&";
    }

    if (isset($_POST["shortby"])) {
        $sort = $_POST["shortby"];
        $query .= " ORDER BY $sort";
        $u .= "shortby=" . $_POST["shortby"];
    }

    function set_url($url)
    {
        echo "<script>history.replaceState({},'','$url');</script>";
    }
    if (!empty($u)) {
        set_url("?" . rtrim($u, ",&"));
    } else {
        echo "<script>history.replaceState('','');</script>";
    }

    /**/

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
                <div class="vid-list">
                    <input type="text" class="vid_id" value="<?= $row["unique_id"] ?>" style="display:none">
                    <i class="material-icons volume" title = 'mute(m)'>volume_up</i>
                    <a class="video_player" href="<?= $url .
                        "web/video?v=" .
                        $row["unique_id"] ?>">
                        <span class='duration'><?= timeFormat($row["duration"]) ?></span>
                        <div class="spinner active">
                            <div>
                            <div class="lds-ripple"><div></div><div></div></div>
                            </div>
                        </div>
                        <div class="overlay">
                            <img src="<?= base_url($th) ?>" alt="">
                        </div>
                        <div class="video">
                            <video class="thevideo" loop src="<?= $url .
                                "studio/uploads/" .
                                $row["unique_id"] .
                                "/video/" .
                                $row["video"] ?>" >
                            <video>
                        </div>
                    </a>
                    <div class="progress_area">
                        <div class="progress_bar">
                            <span></span>
                        </div>
                        <div class="buffered_progress_bar"></div>
                    </div>
                    <div class="flex-div">
                        <a href="channel.html" style="display:flex">
                        <img src="<?= base_url(
                            "upload/image/channel/profile_photo/" . $o["profile_photo"]
                        ) ?>" alt="" style="width:32px;height:32px">
                        </a>
                        <div class="vid-info">
                            <a href="<?= $url .
                                "video?v=" .
                                $row["unique_id"] ?>" class="video-title"><?= shortenString(
                        $row["title"],
                        60
                    ) ?></a>
                            <p style="margin-bottom:0"><a href="<?= $url .
                                "?channel=" .
                                $o["unique_id"] ?>" title="">@<?= $o["name"] ?></a></p>
                            <p style="margin-bottom:0"><span class="views"> <?= numberFormat(
                                $row["views"]
                            ) ?> views</span> &bull; <span class="time"><?= dateTime(
                        $row["created_at"]
                    ) ?></span></p>
                        </div>
                    </div>
                </div>

<!--videoo end-->
<?php
        }}
        echo "<script>window.start = " . $start . " </script>";
    }
}

?>
