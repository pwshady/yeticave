
<main class="container">
    <section class="promo">
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
        <ul class="promo__list">
            <? for ($i = 1; $i <= count($product_category); $i++): ?>
                <li class="promo__item promo__item--boards">
                    <a class="promo__link" href="all-lots.html"><?=$product_category[$i-1]?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </section>
    <section class="lots">
        <div class="lots__header">
            <h2>Открытые лоты</h2>
        </div>
        <ul class="lots__list">
            <? for ($i = 1; $i <= count($product); $i++): ?>
                <li class="lots__item lot">
                    <div class="lot__image">
                        <img src=<?="img/" . $product[$i-1]["url_picture"]?> width="350" height="260" alt=<?=$product[$i-1]["product_name"]?>>
                    </div>
                    <div class="lot__info">
                        <span class="lot__category"><?=$product_category[$product[$i-1]["category"]]?></span>
                        <h3 class="lot__title"><a class="text-link" href=<?="lot.php" . '?product_id=' . ($i-1)?>><?=$product[$i-1]["product_name"]?></a></h3>
                        <div class="lot__state">
                            <div class="lot__rate">
                                <span class="lot__amount">Starting price</span>
                                <span class="lot__cost"><?=format_price($product[$i-1]["price"])?><b class="rub">р</b></span>
                            </div>
                            <div class="lot__timer timer">
                                <?=next_time();?>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endfor; ?>    
        </ul>
    </section>
</main>
