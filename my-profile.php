<?php include_once 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<body style="">
<?php include_once 'navigation.php'; ?>
  <section class="my-profile-content">
  <div class='profile-content'>
    <div>
  <h2 class="title-profile"><img src="./images/work.svg"/>User profile</h2>
  <div class="profile-content-bar">
</div>

<div class="side-bar">
    
        
      

  <ul id="my-profile-sidebar" class="nav nav-tabs flex-column" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
    </li>
   
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages" type="button" role="tab" aria-controls="messages" aria-selected="false">Messages</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Settings</button>
    </li>
  </ul>
</div>
</div>
  <!-- Bootstrap Tab panes -->
  <div class="tab-content">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
    <section class='section-container'>
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
        <div class="tab-content">

        <div class="card">
            <div class="row g-0">
                <div class="card-content col-md-8">
                    <div class="card-body">
                      <div class="img-container">
                        <img src="..." class="card-img-top" id="profile-image" alt="...">
                      </div>
                        <h3 class="tab-content-title">Hello <span id="user-name"></span></h3>
                        <div class="input-group mb-3">
                            <input type="text" disabled class="form-control" name="fname" id="fname-input" placeholder=""
                                aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="button" id="fname-edit-button">
                                <i class="fa-solid fa-pencil"></i>
                            </button>

                            <input type="text" disabled class="form-control" name="lname" id="lname-input" placeholder=""
                                aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="button" id="lname-edit-button">
                                <i class="fa-solid fa-pencil"></i>
                            </button>
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" disabled class="form-control" name="email" id="email-input" placeholder=""
                                aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="button" id="email-edit-button">
                                <i class="fa-solid fa-pencil"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                    
                
            </div>
        </div>
    </div>
</div>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
      <h3 class="tab-content-title">Profile Content</h3>
      <p>This is the content for the Profile tab. Donec in facilisis eros. Aliquam vulputate ante purus, non hendrerit dui ullamcorper id. In vitae ipsum in diam tincidunt sodales. Quisque consectetur lorem enim, non sodales quam interdum sit amet. Duis efficitur condimentum tristique. In tellus mauris, eleifend id nunc a, sagittis ornare leo. Sed consectetur, sapien a molestie vulputate, metus magna aliquet orci, vel vehicula tortor tellus vitae tellus</p>
    </div>
   
    <div class="tab-pane fade" id="messages" role="tabpanel" aria-labelledby="messages-tab" tabindex="0">
      <h3 class="tab-content-title">Messages Content</h3>
      <p>This is the content for the Messages tab. Donec in facilisis eros. Aliquam vulputate ante purus, non hendrerit dui ullamcorper id. In vitae ipsum in diam tincidunt sodales. Quisque consectetur lorem enim, non sodales quam interdum sit amet. Duis efficitur condimentum tristique. In tellus mauris, eleifend id nunc a, sagittis ornare leo. Sed consectetur, sapien a molestie vulputate, metus magna aliquet orci, vel vehicula tortor tellus vitae tellus</p>
    </div>
    <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab" tabindex="0">
      <h3 class="tab-content-title">Settings Content</h3>
      <p>This is the content for the Settings tab. Donec in facilisis eros. Aliquam vulputate ante purus, non hendrerit dui ullamcorper id. In vitae ipsum in diam tincidunt sodales. Quisque consectetur lorem enim, non sodales quam interdum sit amet. Duis efficitur condimentum tristique. In tellus mauris, eleifend id nunc a, sagittis ornare leo. Sed consectetur, sapien a molestie vulputate, metus magna aliquet orci, vel vehicula tortor tellus vitae tellus</p>
    </div>
  </div>
</div>
</section>
  <!-- Include Bootstrap JS and your custom JavaScript file -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./javascript/my-profile.js"></script>

  <!-- Script for dynamic tab switching -->
  <script>
    const triggerTabList = document.querySelectorAll('#myTab button');
    triggerTabList.forEach(triggerEl => {
      const tabTrigger = new bootstrap.Tab(triggerEl);

      triggerEl.addEventListener('click', event => {
        event.preventDefault();
        tabTrigger.show();
      });
    });
  </script>
</body>

</html>
