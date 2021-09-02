<nav>
    <div class="outer-nav">
            <div class="inner-nav">
                <div class="left-head">
                    User<span>Authentication</span>
                </div>
                <div class="right-head">
                    <ul>

                        <?php 

                        if(!isset($_SESSION['verified_user_id'])){
                            echo '                        <li>
                            <a href="includes/sign-up.php"> Register </a>
                        </li>
                        <li>
                            <a href="includes/sign-in.php">Sign in</a>
                        </li>';
                        }elseif (isset($_SESSION['verified_user_id'])){
                            echo ' <li>
                            <a href="logout.php">Log out</a>
                        </li>';
                        }
                        ?>
                    
                    </ul>
                </div>
            </div>
    </div>
</nav>