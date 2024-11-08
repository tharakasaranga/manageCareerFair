<?php include('header1.php'); ?>

<div class="container">
    
    <div class="drawer" id="drawer">
        <span class="close-btn" onclick="closeDrawer()">&times;</span>
        
        <a href="job_listings.php">
            <i class="fas fa-briefcase"></i> Job Listings
        </a>
        
        <a href="profile_employer.php">
            <i class="fas fa-user-tie"></i> My Profile
        </a>

        <a href="logout.php">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>

    <button class="open-drawer-btn" onclick="openDrawer()">&#9776; Menu</button>

    <div class="main-content">
        <h2>Employer Profile</h2>

        <form action="update_employer_profile.php" method="GET" class="profile-form">
            <div class="form-group">
                <label for="employer_name">Company Name:</label>
                <input type="text" id="employer_name" name="employer_name" value="Tech Solutions Ltd." required>
            </div>

            <div class="form-group">
                <label for="employer_email">Email:</label>
                <input type="email" id="employer_email" name="employer_email" value="hr@techsolutions.com" required>
            </div>

            <div class="form-group">
                <label for="employer_phone">Phone Number:</label>
                <input type="text" id="employer_phone" name="employer_phone" value="+1 987 654 3210" required>
            </div>

            <div class="form-group">
                <label for="employer_website">Company Website:</label>
                <input type="url" id="employer_website" name="employer_website" value="https://www.techsolutions.com" required>
            </div>

            <div class="form-group">
                <label for="employer_address">Company Address:</label>
                <input type="text" id="employer_address" name="employer_address" value="123 Business Rd, Suite 100, San Francisco, CA" required>
            </div>

            <button type="submit" class="submit-btn">Update Profile</button>
        </form>
    </div>
</div>

<footer>
    <p>&copy; 2024 Career Management System. All rights reserved.</p>
</footer>

<script src="scripts.js"></script>

</body>
</html>
