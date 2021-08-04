<?php $url = $_SERVER['REQUEST_URI']; ?>
<div class="col-lg-3">
    <h1 class="h2 pb-4">Categories</h1>
    <ul class="list-unstyled site-accordion">
        <?php foreach ($categories as $categoryItem): ?>
            <li class="pb-3 my-3">
               <a class="collapsed

               <?php
               $path= parse_url($url, PHP_URL_PATH);
               $array = explode("category/", trim($path, "/]"));
               $result = array_pop($array);
               if  ($result == $categoryItem['name']) echo "isDisabled";  ?>
                text-center justify-content-between h3 text-decoration-none underline" href="/category/<?php echo $categoryItem['name'];?>">
                  <?php echo "".$categoryItem['name']."";?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>