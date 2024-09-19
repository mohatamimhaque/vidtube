<div class="uploadModal bg-soft-success">
   <div class="modal_wrapper" >
      <div class="secondpage visible">
               <input type="text" id="unique_id" class="d-none" value="">
               <input type="text" id="owner" value="<?= $unique_id ?>" class="d-none">
               <div class="modalHeader">
                  <h3 class="video_name text-info">Lorem Ipsum is simply dummy text of the printing</h3>
                  <div class="right">
                     <p id="save_status">saved as private</p>
                     <span class="icon">
                        <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" >
                           <g class="style-scope tp-yt-iron-icon">
                              <path d="M13,14h-2v-2h2V14z M13,5h-2v6h2V5z M19,3H5v16.59l3.29-3.29L8.59,16H9h10V3 M20,2v15H9l-5,5V2H20L20,2z" class="style-scope tp-yt-iron-icon"></path>
                           </g>
                        </svg>
                     </span>
                     <span class="icon close">
                        <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" class="style-scope tp-yt-iron-icon">
                           <g class="style-scope tp-yt-iron-icon">
                              <path d="M12.7,12l6.6,6.6l-0.7,0.7L12,12.7l-6.6,6.6l-0.7-0.7l6.6-6.6L4.6,5.4l0.7-0.7l6.6,6.6l6.6-6.6l0.7,0.7L12.7,12z" class="style-scope tp-yt-iron-icon"></path>
                           </g>
                        </svg>
                     </span>
                  </div>
               </div>
               <div class="modalBody" >
                  <div class="stepper_bar">
                     <div class="step_progress_bar">
                        <div class="stepper">
                           <p class="active">
                              Details
                           </p>
                           <div class="bullet active">
                           </div>
                        </div>
                        <div class="stepper">
                           <p>
                              Video elements
                           </p>
                           <div class="bullet">
                           </div>
                        </div>
                        <div class="stepper">
                           <p>
                              Checks
                           </p>
                           <div class="bullet">
                           </div>
                        </div>
                        <div class="stepper">
                           <p>
                              Visibility
                           </p>
                           <div class="bullet">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="page">
                     <div class="pageBody">
                        <div class="left details">
                           <h3 class="text-success">Details</h3>
                           <div class="video_title">
                              <span>Title (required) </span>
                              <input type="text" id="video_title" class="text-info">
                              <span class="length"><small>0</small>/<small>100</small></span>
                           </div>
                           <div class="description">
                              <span>Description</span>
                              <textarea name="" id="description" row="" class="text-info"></textarea>
                           </div>
                           <div class="thumbanail">
                              <h4 class="text-success">Thumbnail</h4>
                              <p>Set a thumbnail that stands out and draws viewers' attention.</p>
                              <div class="imgGallery">
                                 <input type="file"  accept=".jpg, .jpeg, .png, .webp" id="upload_thumbnail" style="display:none">
                                 <label class="uploadImg img" for="upload_thumbnail">
                                    <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" class="style-scope tp-yt-iron-icon"><g version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="24px" height="24px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve" class="style-scope tp-yt-iron-icon"><path d="M14,13.6l2.8,3.4h-5.4l0.3-0.4L14,13.6 M8.9,14.7l1.2,1.9l0.3,0.4H7.1L8.9,14.7 M14,12l-3,4l-2-3l-4,5h14L14,12L14,12z
                                       M21,7h-2v2h-2V7h-2V5h2V3h2v2h2V7z M13,4v6v1h1h6v9H4V4H13 M14,3H3v18h18V10h-7V3L14,3z" class="style-scope tp-yt-iron-icon"></path></g></svg>
                                       <span>Upload File</span>
                                       <img src="" alt="" style="width:100%;height:100%">
                                 </label>
                                 <div class="autoGenrate img">
                                   <span>Auto Generate</span>
                                 </div>
                                 
                              </div>
                              <div class="thum_gallery">
                                 
                                
                              </div>
                           </div>
                           <div class="tags">
                              <h3 class="text-success">Tags</h3>
                              <span>Tags can be useful if content in your video is commonly misspelled. Otherwise, tags play a minimal role in helping viewers find your video.</span>
                              <div class="tagsBody">
                                 <div id="tags">
   
                                 </div> 
                                 <input type="text" id="tags_in" placeholder="Add tag" class="text-info">
                              </div>
                              <span>Enter a comma after each tag</span>
                           </div>
                           <div class="category">
                              <h4 class="text-success">Category</h4>
                              <span>Add your video to a category so viewers can find it more easily</span>
                              <div class="custom-select-wrapper">
                                 <div class="custom-select">
                                     <span class="select-trigger">Select Category</span>
                                     <div class="options">
                                       <?php 
                                          foreach($category as $c){
                                             echo "<div class='option'>".$c."</div>";
                                          }
                                       ?>
                                     </div>
                                 </div>
                             </div>                          
                           </div>
                        </div>
                        <div class="left video_element ">
                           <h4 class="text-success">Video elements</h4>
                           <span>Use cards and an end screen to show viewers related videos, websites, and calls to action</span>
                           <div class="element bg-soft-info">
                              <div class="leftSide">
                                 <i class="material-icons text-info">subtitles</i>
                                 <div class="text">
                                    <p class="text-info">Add Subtitles</p>
                                    <span>Reach a broader audience by adding subtitles to your video</span>
                                 </div>
                              </div>
                              <div class="rightSide">
                                 <input type="file" id="subtitles" multiple>
                                 <label for="subtitles" class="btn btn-info">Add</label>
                              </div>
                           </div>
   
                           <div class="uploaded-area">
                             
                            
                                   
                           </div>
                        </div>
                        <div class="left checks">
                           <h4 class="text-success">Checks</h4>
                           <span>We’ll check your video for issues that may restrict its visibility and then you will have the opportunity to fix issues before publishing your video.</span>
                        </div>
                        <div class="left visibility">
                           <h4 class="text-success">Visibility</h4>
                           <span>Choose when to publish and who can see your video</span>
                           <div class="element d-noe">
                              <h4 class="text-success">Save or publish</h4>
                              <span>Make your video public, unlisted, or private</span>
                              <div class="inputGroup">
                                 <div class="inputs">
                                    <input type="radio" name="visibility" value="0" id="0">
                                    <span class="radio-mark"></span>
                                    <label for="0">
                                       <p>Private</p>
                                       <span>Only you and people you choose can watch your video.</span>
                                    </label> 
                                 </div>
                                 <div class="inputs">
                                    <input type="radio" name="visibility" value="1" id="1">
                                    <span class="radio-mark"></span>
                                    <label for="1">
                                       <p>Unlisted</p>
                                       <span>Anyone with the video link can watch your video.</span>
                                    </label> 
                                 </div>
                                 <div class="inputs">
                                    <input type="radio" name="visibility" value="2" id="2">
                                    <span class="radio-mark"></span>
                                    <label for="2">
                                       <p>Public</p>
                                       <span> Everyone can watch your video.</span>
                                    </label> 
                                 </div>
                              </div>
                           </div>


                           <h4 class="text-success mt-3">Audience</h4>
                           <span>Is this video made for kids? (required)</span>
                           <div class="element dnone">
                              <span>Regardless of your location, you're legally required to comply with the Children's Online Privacy Protection Act (COPPA) and/or other laws. You're required to tell us whether your videos are made for kids</span>
                              <div class="inputGroup">
                                 <div class="inputs">
                                    <input type="radio" name="audience" value="0" id="4">
                                    <span class="radio-mark"></span>
                                    <label for="4">
                                       <p>Yes, it's made for kids</p>
                                    </label> 
                                 </div>
                                 <div class="inputs">
                                    <input type="radio" name="audience" value="1" id="5">
                                    <span class="radio-mark"></span>
                                    <label for="5">
                                       <p>No,it's not made for kids</p>
                                    </label> 
                                 </div>
                              </div>
                           </div>


                           <h4 class="text-success mt-3">Comments and ratings</h4>
                           <div class="element">
                              <span>Choose if and how you want to show comments</span>
                              <div class="inputGroup">
                                 <div class="inputs">
                                    <input type="radio" name="comments_status" value="1" id="6">
                                    <span class="radio-mark"></span>
                                    <label for="6">
                                       <p>On</p>
                                    </label> 
                                 </div>
                                 <div class="inputs">
                                    <input type="radio" name="comments_status" value="0" id="7">
                                    <span class="radio-mark"></span>
                                    <label for="7">
                                       <p>Off</p>
                                    </label> 
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="right">
                           <div id="video_wrapper" style="display:nne">
                              <div id="video_player" class="paused">
                                 <div id="video_overlay">
                                    <p>process will begin shortly...</p>
                                 </div>
                                 <div id="video_overlay_img">
                                    <img src="" alt="">
                                 </div>
                                 <video id="main_video" preload="metadata">
                                    <source size="720" type="video/mp4">
                                 </video>
                                 <div class="controls">
                                    <div class="progress_area">
                                       <div class="progress_bar">
                                          <span></span>
                                       </div>
                                    </div>
                                    <div class="control_list">
                                       <div class="controls_left">
                                          <span class="icon">
                                          <i class="material-icons play_pause">play_arrow</i>
                                          </span>
                                          <span class="icon">
                                          <i class="material-icons volume" title = 'mute(m)'>volume_up</i>
                                          <input type="range" min="0" max="100" id="volume_range">
                                          </span>
                                          <div class="timer">
                                             <span class="current">0:00</span> / <span class="duration">0:00</span>
                                          </div>
                                       </div>
                                       <div class="controls_right">
                                          <span class="icon">
                                              <i class="material-icons settingsBTn">settings</i>
                                          </span>
                                          <span class="icon">
                                           <i class="material-icons fullscreen" title="fullscreen(f)">fullscreen</i>
                                          </span>
                                       </div>
                                    </div>
                                 </div>
                                 <div id="settings" class="">
                                    <div data-label="settingHome" class="parent">
                                       <ul>
                                          <li data-label="speed" class="" style="display:flex;justify-content:space-between;cursor: pointer;">
                                             <span>Speed</span>
                                             <i class="material-icons">
                                             arrow_forward_ios
                                             </i>
                                          </li>
                                          <li data-label="quality" style="display:flex;justify-content:space-between;cursor: pointer;">
                                             <span>Quality</span>
                                             <i class="material-icons">
                                             arrow_forward_ios
                                             </i>
                                          </li>
                                       </ul>
                                    </div>
                                    <div class="playback parent" data-label="speed" hidden>
                                       <span style="cursor: pointer;">
                                       <i class="material-icons back_setting" data-label="settingHome">arrow_back</i>
                                       <span>Playback Speed</span>
                                       </span>
                                       <ul>
                                          <li data-speed="0.25">0.25x</li>
                                          <li data-speed="0.5">0.5x</li>
                                          <li data-speed="0.75">0.75x</li>
                                          <li data-speed="1" class="active">Normal</li>
                                          <li data-speed="1.25">1.25x</li>
                                          <li data-speed="1.5">1.5x</li>
                                          <li data-speed="1.75">1.75x</li>
                                          <li data-speed="2">2x</li>
                                       </ul>
                                    </div>
                                    <div class="quality parent" data-label="quality" hidden>
                                       <span style="cursor: pointer;">
                                       <i class="material-icons back_setting" data-label="settingHome">arrow_back</i>
                                       <span>Playback Quality</span>
                                       </span>
                                       <ul>
                                          <li data-quality="auto" class="active">auto</li>
                                       </ul>
                                    </div>
                                 </div>
                               
                              </div>
                           </div>
                           <div class="info">
                              <div class="child">
                                 <div>
                                    <span>Video Link</span>
                                    <a href="#" id="video_link"><?= base_url('') ?></a>
                                 </div>
                                 <i class="material-icons link_copy">content_copy</i>
                              </div>
                              <div class="child">
                                 <div>
                                    <span>File Name</span>
                                    <p id="filename"></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="modalFooter">
                  <div class="leftSide">
                     <i class="material-icons status_button active">arrow_upward</i>
                     <p class="status">Checks complete. No issues found</p>
                  </div>
                  <div class="rightSide">
                     <button class="back btn btn-primary" id="prevBtn">Back</button>
                     <button class="next visible btn btn-info" id="nextBtn">Next</button>
                     <button class="save btn btn-success" id="saveBtn">Save</button>
                  </div>    
               </div>
            </div>

         </div>
      </div>