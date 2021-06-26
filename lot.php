<?php

require "lots.php";
require_once "functions.php";
if (isset($product_id)): ?>
<main>
  <nav class="nav">
    <ul class="nav__list container">
      <? for ($i = 1; $i <= count($product_category); $i++): ?>
        <li class="nav__item">
          <a href="all-lots.html"><?=$product_category[$i-1]?></a>
        </li>
      <?php endfor; ?>
    </ul>
  </nav>
  <section class="lot-item container">
    <h2><?=$product[$product_id-1]["product_name"]?></h2>
    <div class="lot-item__content">
      <div class="lot-item__left">
        <div class="lot-item__image">
          <img src=<?="img/" . $product[$product_id]["url_picture"]?> width="730" height="548" alt=<?=$product[$product_id]["product_name"]?>>
        </div>
        <p class="lot-item__category">Category: <span><?=$product_category[$product[$product_id]["category"]]?></span></p>
        <p class="lot-item__description"><?=$product[$product_id]["description"]?></p>
      </div>
      <div class="lot-item__right">
        <div class="lot-item__state">
          <div class="lot-item__timer timer">
            10:54:12
          </div>
          <div class="lot-item__cost-state">
            <div class="lot-item__rate">
              <span class="lot-item__amount">Price</span>
              <span class="lot-item__cost"><?=format_price($product[$product_id]["price"])?><b class="rub">р</b></span>
            </div>
            <div class="lot-item__min-cost">
              Мин. ставка <span>12 000 р</span>
            </div>
          </div>
          <form class="lot-item__form" action="https://echo.htmlacademy.ru" method="post">
            <p class="lot-item__form-item">
              <label for="cost">Ваша ставка</label>
              <input id="cost" type="number" name="cost" placeholder="12 000">
            </p>
            <button type="submit" class="button">Сделать ставку</button>
          </form>
        </div>
        <div class="history">
          <h3>История ставок (<span>10</span>)</h3>
          <table class="history__list">
            <tr class="history__item">
              <td class="history__name">Иван</td>
              <td class="history__price">10 999 р</td>
              <td class="history__time">5 минут назад</td>
            </tr>
            <tr class="history__item">
              <td class="history__name">Константин</td>
              <td class="history__price">10 999 р</td>
              <td class="history__time">20 минут назад</td>
            </tr>
            <tr class="history__item">
              <td class="history__name">Евгений</td>
              <td class="history__price">10 999 р</td>
              <td class="history__time">Час назад</td>
            </tr>
            <tr class="history__item">
              <td class="history__name">Игорь</td>
              <td class="history__price">10 999 р</td>
              <td class="history__time">19.03.17 в 08:21</td>
            </tr>
            <tr class="history__item">
              <td class="history__name">Енакентий</td>
              <td class="history__price">10 999 р</td>
              <td class="history__time">19.03.17 в 13:20</td>
            </tr>
            <tr class="history__item">
              <td class="history__name">Семён</td>
              <td class="history__price">10 999 р</td>
              <td class="history__time">19.03.17 в 12:20</td>
            </tr>
            <tr class="history__item">
              <td class="history__name">Илья</td>
              <td class="history__price">10 999 р</td>
              <td class="history__time">19.03.17 в 10:20</td>
            </tr>
            <tr class="history__item">
              <td class="history__name">Енакентий</td>
              <td class="history__price">10 999 р</td>
              <td class="history__time">19.03.17 в 13:20</td>
            </tr>
            <tr class="history__item">
              <td class="history__name">Семён</td>
              <td class="history__price">10 999 р</td>
              <td class="history__time">19.03.17 в 12:20</td>
            </tr>
            <tr class="history__item">
              <td class="history__name">Илья</td>
              <td class="history__price">10 999 р</td>
              <td class="history__time">19.03.17 в 10:20</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </section>
</main>
<?
endif;

//$page_status =

if (isset($_GET['product_id'])) 
{
	$product_id = $_GET['product_id'];
    if (!array_key_exists($product_id, $product))
    {
      print "Error404";
      exit;
    }
}
else
{
  print "Error404";
  exit;
};

if (!isset($page_mode))
{
  $cont = include_bloc ("lot.php", ["product_id" => $product_id, "page_mode" => true]);
  print include_bloc("templates/layout.php", ["content" => $cont, "title" => "Lot"]);
  
};
unset($page_mode);
//print $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

//print include_bloc("templates/layout.php", ["content" => $cont, "title" => "Lot"]);
?>

