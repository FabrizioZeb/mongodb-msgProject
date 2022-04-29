<div>
    <span>Hello <?php echo $userData['username']; ?> !!</span><br>
    <a href="home.php">
        Home
    </a>
    <a href="profile.php?id=<?php echo $_SESSION['user'];?>">
        Profile
    </a>
    <a href="userlist.php">
        Users
    </a>
    <a href="logout.php">
        Log out
    </a>
</div>