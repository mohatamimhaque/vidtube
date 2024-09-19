 <style>
  #profile_photo_upload{
    width:300px;
    height:300px;
    margin:0px auto;
    border:2px dotted rgba(100,100,50,.30);
    position: relative;
  }
#profile_photo_upload label{
    width:100%;
    height:100%;
    position:absolute;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:22px;
    color:rgba(100,100,80,.70);
    z-index:2;
    cursor: pointer;
  }
  #profile_photo_upload input{
    display:none
  }
  #profile_photo_upload img{
    position:absolute;
    width: 0%;
    height:100%;
    display:flex;
    align-items:center;
    justify-content:center;
    z-index:5;
    cursor: pointer;
    border:none;
    outline:none;
    transition:0.2s;
  }

  .replace .image{
    width:100px;
    height:100px
    margin:0 auto;
    margin-left:50%;
    transform:translateX(-50%);
  }
  .replace img{
    border-radius:50%;
    width:100%;
    height:100%;
    border:4px solid rgba(10,10,10,0.10);

  }
  a{
    text-decoration:none
  }
  .channel-cover{
    width:var(--i);
    height:calc((var(--i) / 100) * 18)
  }


  .channel-cover img{
    border:none;
    ouline:none;
  }
  .vc_hd{
    width:55px;
    height:55px
  }
  .vc_hd img{
    width:100%;
    height:100%;
  }
  .app{
    overflow:scroll
  }
 </style>