<?php include_once 'header.php'; ?>
<body>
    <div class="wrapper wrapper-interests">
        <div class="form interests">
            <div class="interestsForm">
            <div class="interest" onclick="toggleInterest(this)">Meal Planning</div>
            <div class="interest" onclick="toggleInterest(this)">Meal Planning</div>
            <div class="interest" onclick="toggleInterest(this)">Workouts</div>
        </div>
        <button class="btn-yellow" onclick="savePreferences()">Submit</button>
    </div>
    
    
    <script src="./javascript/select-interests.js"></script>
    
</body>
</html>