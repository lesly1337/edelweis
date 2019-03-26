<section id="article">
    <div class="wrapper">

        <div class="article-header">
            <h1><?php echo $article_data["name"]; ?></h1>
        </div>

        <div class="article-content">

            <div class="item">

                <div class="image">
                    <img src="<?=$domain_name?>web/site/pictures/<?php echo $article_data["picture"]; ?>" alt="">
                </div>

                <div class="intro">
                    <?php echo $article_data["intro"]; ?>
                </div>

                <div class="text">
                    <?php echo $article_data["text"]; ?>
                </div>

            </div>

        </div>

    </div>
</section>