<header class="header">
        <nav class="navbar">
            <a href="/DIVO project/Home/Home.php">Home</a>
            <a href="/DIVO project/Services/Services.html">Services</a>
            <a href="/DIVO project/Store_Updated/shopping cart/products.php">Stores</a>
            <a href="/DIVO project/About/About.html">About</a>
            <?php
               // Get all rows from the cart database.
               //  if connection is failed , display the error connection and terminate the page 
               $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
               // Count all rows.
               $row_count = mysqli_num_rows($select_rows);
         ?>

      <a href="cart.php" class="cart">cart <span style="background-color:white; text-align:center; border-radius:3px; padding:2px;"><?php echo $row_count; ?></span> </a>
        </nav>
        <form action="#" class="search-bar">
            <input type="text" placeholder="Search...">
            <button type="submit"><i class='bx bx-search'></i></button>
        </form>
        <?php if(!isset($_SESSION["user_id"])): ?>
        <a class="user" style="" href="/DIVO project/sign/login1.php"><img style="width: 40px;" src="/DIVO project/images/user_black.png"></i></a>
        <?php endif;?>
        <?php if(isset($_SESSION["user_id"])): ?>
        <a class="user" style="position:relative; left:10%;" href=""><img style="width: 40px;" src="/DIVO project/images/user_black.png"></i></a>
        <?php endif;?>
        <?php if(isset($_SESSION["user_id"])): ?>
        <a class="user1" href="\Divo project/sign/logout.php" style="text-decoration: none; color:white;font-size:16px;transform: translateY(0);
    opacity: 1; border-radius:3px; padding :3px; margin:0; color:black;">Log out</a>
    <?php endif;?>
    </header>