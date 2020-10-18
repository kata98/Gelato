<div id="slajder">
    <div id="top">
        <div id="meni">
            <ul class="lista">
                <?php foreach($data["navigacija"] as $nav): ?>
            <li class="active"><a href="index.php?page=<?=$nav->ime?>"><?=$nav->ime?></a></li>
                <?php endforeach; ?>
                <?php if(!isset($_SESSION['user'])): ?>
                <li class="active"><a href="index.php?page=sign%20up">sign up</a></li>
                <?php endif; ?>
                <?php if(isset($_SESSION['user'])): ?>
                    <li class="active"><a href="index.php?page=about">about</a></li>
                    <li class="active"><a href="index.php?page=logout">log out</a></li>
                <?php endif; ?>
                <?php if(isset($_SESSION['uloga']) AND $_SESSION['uloga']==1): ?>
                    <li class="active"><a href="index.php?page=admin">admin</a></li>
                <?php endif; ?>
            </ul>
        </div>
        <div id="naziv">
            <a href="index.php?page=home"><h1>Gelato</h1></a>
        </div>

    </div>
    <div class="cleaner"></div>
