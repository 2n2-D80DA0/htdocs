<?php 

    use Core\Storage;
?>
<div class="movie">
    <a href="film/<?=$item["id"]?>">
    <div class="movie-image"> 
        <span class="play" style="display: none;">
            <span class="name"><?=$item["name"]?></span>
        </span> 
        
        <img src="<?= Storage::getPoster($item["id"]);?>" alt="">
        
    </div>
    <div class="rating">
    <p>RATING</p>
    <div class="stars">
        <div style = "width: <?php echo ((double)$item["rating"] * 20) ?>%;" class="stars-in"> </div>
    </div>

        <span class="comments"><?=$item["comments"]??0?></span> 
    </div>
    </a> 
</div>
