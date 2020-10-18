<div id="naslov3">
    <p>HELLO</p>
    <h2>ADMIN</h2>
</div>
</div>
<div class="cleaner"></div>
<div class="cleaner"></div>
<div id="menuAdmin">
    <?php foreach($data["artikli"] as $art): ?>
        <div class="artikl">
            <form action="index.php?page=updateProizvod" id="updateProizvoda" method="post">
                <input type="hidden" name="id_proizvod" id="id_up" value="<?=$art->id_proizvod?> data-id="<?=$art->id_proizvod?>"/>
                <input type="text" name="naziv" placeholder="Product name" value="<?=$art->naziv?>" class="nazivP"><br/>
                <input type="text" name="cena" placeholder="Product price" value="<?=$art->cena?>" class="cenaP"><br/>
                <input type="text" name="opis" placeholder="Product description" value="<?=$art->opis?>" class="opisP"><br/>
                <input class="update" type="submit" value="UPDATE ITEM" name="update">
               <a href="index.php?page=deleteProizvod&id=<?=$art->id_proizvod?>"><input class="delete" type="button" value="DELETE ITEM" name="delete"></a>
            </form>
        </div>
    <?php endforeach; ?>
</div>
<div class="cleaner"></div>
<div id="proba4">
</div> <div class="cleaner"></div>
<div class="cleaner"></div>