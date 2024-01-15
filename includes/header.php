
  <header>
    <div class="container">
        <h1 class="logo"><span>Sport</span> Hub</h1>

        <nav class="navbar">
            <ul class="nav-menu">
                <?php
    
                if (isset($_SESSION['email'])) {
                    echo '<li>Welcome, ' . $user['name'] . '!</li>';
                    echo '<li><a href="logout.php">Logout</a></li>';
                } else {
                    echo '<li><a href="auth.php">Login</a></li>';
                }
                ?>
                <li><a href="home.php">Home</a></li>
                <li><a href="#">Shop</a></li>
                <li><a href="/pages/about.us.html">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
        <div class="search-bar">
            <input type="text" placeholder="Search...">
            <button type="submit">Search</button>
        </div>
  
</header>
