<nav>
    <ul class="nav_ul clearfix">
        <li>
            <a href="/public">Home</a>
        </li>
        <li>
            <a href="/user/login" class="log_in">Login</a>
        </li>
        <li>
            <a href="/user/register" class="log_in">Register</a>
        </li>
    </ul>    
    <div class="search">
        <form name="search" action="/user/results" method="post">
            <input type="search" name="search" placeholder="I want...">
            <input type="submit" name="search_submit" value="Find">
        </form>
    </div>
</nav>
<div class="hamburger hidden">
    <img src="../images/hamburger.png" alt="hamburger_photo">
</div>
