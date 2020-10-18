<div id="naslov">
    <p>OUR</p>
    <h2>FLAVOURS</h2>
</div>
</div>
<div class="cleaner"></div>
<?php
if(!isset($_SESSION['user'])): ?>
    <div id="ulogovanMeni">
        <h4> Register to discover our <br/> DELICIOUS MENU! </h4>
       <a href="index.php?page=sign%20up"><input class="goTo" type="button" value="REGISTER NOW" name="register" id="goTo"></a>
    </div>
<?php endif; ?>
<?php
if(isset($_SESSION['user'])): ?>
<div id="funkcuionalnosti">
    <div id="filtriranje">
        <input type="text" id="filter"  placeholder="Search here..." class="validate">
    </div>
    <div id="sort">
        <select id="sortiranje" name="sort" class="ddl">
            <option value="0">Sort by</option>
            <?php
            $options = [
                [
                    "value" => 1,
                    "text"=> "Name - ASC"
                ],
                [
                    "value" => 2,
                    "text" => "Name - DESC"
                ],
                [
                    "value" => 3,
                    "text" => "Price - ASC"
                ],
                [
                    "value" => 4,
                    "text" => "Price - DESC"
                ]
            ];
            foreach($options as $option): ?>
                <option value="<?= $option['value'] ?>"> <?= $option['text'] ?> </option>
            <?php endforeach; ?>
        </select>
    </div>
</div>
    <div class="cleaner"></div>
<div id="menu">
<!--    <div class="artikl">-->
<!--        <h4>Chocolate</h4><br/>-->
<!--        <p>$2.89<br/><br/>with caramel sauce</p>-->
<!--    </div>-->
<!--    <div class="artikl">-->
<!--        <h4>Vanilla</h4><br/>-->
<!--        <p>$1.25<br/><br/>with strawberry toping</p>-->
<!--    </div>-->
<!--    <div class="artikl">-->
<!--        <h4>Mint chocolate</h4><br/>-->
<!--        <p>$5.45<br/><br/>with chocolate chips</p>-->
<!--    </div>-->
<!--    <div class="artikl">-->
<!--        <h4>Cookies & Cream</h4><br/>-->
<!--        <p>$3.28<br/><br/>with English watercress & hazelnuts</p>-->
<!--    </div>-->
<!--    <div class="artikl">-->
<!--        <h4>Butter Pecan</h4><br/>-->
<!--        <p>$4.45<br/><br/>with chocolate sauce a side</p>-->
<!--    </div>-->
<!--    <div class="artikl">-->
<!--        <h4>Ristretto</h4><br/>-->
<!--        <p>$5.45<br/><br/>with Winter black truffles from Piedmont</p>-->
<!--    </div>-->
</div>
<?php endif; ?>
<div class="cleaner"></div>
<?php if(isset($_SESSION['user'])): ?>
<div id="pictures1">
    <div class="aktivna1">
        <a href="assets/images/Strawberry.jpg">
            <img src="assets/images/Strawberry.jpg" alt="Strawberry"/>
        </a>
    </div>
    <div class="aktivna1">
        <a href="assets/images/Blueberry.jpg">
            <img src="assets/images/Blueberry.jpg" alt="Blueberry"/>
        </a>
    </div>
    <div class="aktivna1">
        <a href="assets/images/Popsticle.jpg">
            <img src="assets/images/Popsticle.jpg" alt="Popsticle"/>
        </a>
    </div>
    <div class="aktivna1">
        <a href="assets/images/Macaroon.jpg">
            <img src="assets/images/Macaroon.jpg" alt="Macaroon"/>
        </a>
    </div>
</div>
<?php endif; ?>
</div> <div class="cleaner"></div>
<div id="proba1">
</div> <div class="cleaner"></div>
