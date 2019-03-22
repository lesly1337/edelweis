<section id="header">
    <div class="wrapper">

        <div class="contacts">
            <p>
                <span><i class="fas fa-map-marker-alt"></i> г. <?=$site_info["town"]?>, ул. <?=$site_info["street"]?>, д. <?=$site_info["house"]?></span>
                <span><i class="fas fa-phone fa-rotate-90"></i> <?=$site_info["phone_1"]?></span>
            </p>
        </div>

        <div id="top-nav">
            <div class="logo">
            <?=$site_info["site_name"]?>
            </div>

            <div class="nav">
                <nav>
                    <?php echo $html; ?>
                </nav>
            </div>

            <div class="application">
                <a href="#" class="red-button">Забронировать</a>
            </div>
        </div>

    </div>
</section>