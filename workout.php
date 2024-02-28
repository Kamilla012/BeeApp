<?php include_once 'header.php'; ?>
<body>
    <?php include_once 'navigation.php'; ?>
    <section class="workout-section">
        <div class="timerContainer">
            <div id="time">00:00:00</div>
            <div class="btn-dashboard">
                <button id="startBtn" class="btn-controler btn-timer">Start</button>
                <button id="pauseBtn" class="btn-controler btn-timer">Pause</button>
                <button id="resetBtn" class="btn-controler btn-timer">Reset</button>
            </div>
            
            <div class="activities">
        
        <select class="activities-select">
            <option class="activities-options" value="">Workout</option>

            <option class="activities-options" value="">Running</option>

            <option class="activities-options" value="">Swimming</option>

            <option class="activities-options" value="">Cycling </option>

            <option class="activities-options" value="">Walking </option>

            <option class="activities-options" value="">Yoga </option>
           
        </select>
        
    </div>
        </div>


    <table class="table-with-results">
            <tr class="table-with-results-titles">
          
              <th class="table-with-results-th">Name of activity</th>
              <th class="table-with-results-th">Time of activity</th>
              <th class="table-with-results-th">Day of activity</th>
            </tr>

        
    </table>

    </section>
  

    <!-- Modal Start -->
    
<div class="modal fade ">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Do you want to save your progress?</h4>
        <img src="./images/build.svg" alt="train"/>
        <!-- <button type="button" class="close close-btn-controler" data-dismiss="modal">&times;</button> -->

      </div>
      
      <!-- Modal body with time -->
      <div class="modal-body">
        <div class="modal-body-container">
            <h5>It's your time!</h5>
            <span id="workout-result"></span>
            <span id="type-of-activity"></span>
        </div>
    </div>
      <!-- Modal footer -->
      <div class="modal-footer">
      <button type="button" class="close btn-controlers" data-dismiss="modal" id="saveResultBtn">Save</button>
    
      <button type="button" class=" btn-controlers close close-btn-controler" data-dismiss="modal">Don't save</button>

      </div>
      
    </div>
  </div>
</div>


<!-- Modal end -->








    <script  type="module" src="./javascript/modal-functions.mjs"></script>
    <script type="module" src="./javascript/timerFunction.mjs"></script>
    <script type="module" src="./javascript/get-user-activities.js"></script>
    <!-- <script type="module" src="./javascript/user-activities.mjs"></script> -->
   
</body>