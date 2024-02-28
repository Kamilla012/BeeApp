

<?php include_once "header.php";?>

<body>
<?php include_once 'navigation.php'; ?>
<div class="container mt-4">
<nav class="chat-nav">
  <h1 class="mb-4">Friends and Bees 
    <img src="./images/shape.svg"/>
 
 
  </button>
  </h1>

  <ul class="nav nav-tabs nav-tabs-list" id="myTabs">
    <li class="nav-item">
      <a class="nav-link " id="tab1-tab" data-bs-toggle="tab" href="#tab1" onclick="showTab('tab1')">My bee hive</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="tab2-tab" data-bs-toggle="tab" href="#tab2" onclick="showTab('tab2')">Explore the bee hive</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="tab3-tab" data-bs-toggle="tab" href="#tab3" onclick="showTab('tab3')">Bee invitations</a>
    </li>
  </ul>
</nav>
  <div id="tab1" class="tab-content active">
  <section class="chat-container-section">
        <div class="chat-container">
    
        <?php include "searchBar.php";?>

            
        <ul id="list-group-friends" class="list-group">
                
        </ul>

        </div>
       
    </section>
</div>

<div id="tab2" class="tab-content">
<section class="chat-container-section">
        <div class="chat-container">
          <?php include "searchBar.php";?>


          
            <ul id="userList" class="list-group">
                
            </ul>


        </div>
       
    </section>
</div>

<div id="tab3" class="tab-content">
<section class="chat-container-section">
        <div class="chat-container">
          <?php include "searchBar.php";?>


          
            <ul id="invitations-list" class="list-group">
                
            </ul>


        </div>



<!-- modal body -->
  
        <div class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

       
    </section>
</div>

  <!-- Modal -->
  <div class="modal fade" id="profileModal" onClick="closeModalFuntion()" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div id="modal-body-show-user" class="modal-dialog modal-dialog-centered" role="document">
 
  </div>
</div>


<script src="./javascript/users.js"></script>
<script src="./javascript/invitations.js"></script>
<script src="./javascript/invitation-list.js"></script>
<script src="./javascript/user-friends.js"></script>
<script src="./javascript/accept-friend.js"></script>
<script src="./javascript/modal-show-profile.js"></script>

</body>
</html>
