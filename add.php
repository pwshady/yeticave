<?php
require "lots.php";
require_once "functions.php";
$errors_form = form_validate();

if (count(form_validate()) != 1)
{
    if (isset($_POST)) 
    {
        print_r($_POST);
        print_r($_FILES);
        move_uploaded_file($_FILES["product_pic"]["tmp_name"],"img/".$_FILES["product_pic"]["name"]);
    }
}
else {
    if (isset($page_mode)): ?>

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
  <form class="form form--add-lot container form--invalid" action="add.php" method="post" enctype="multipart/form-data"> <!-- form--invalid -->
    <h2>Добавление лота</h2>
    <div class="form__container-two">
      <div class="form__item"> <!-- form__item--invalid -->
        <label for="lot-name">Наименование</label>
        <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота" required <? if(isset($_POST["lot-name"])) print "value=" . $_POST["lot-name"] ?>>
        <span class="form__error ">Введите наименование лота</span>
      </div>
      <div class="form__item">
        <label for="category">Категория</label>
        <select id="category" name="category" required>
            <option value=0>Выберите категорию</option>
            <? for ($i = 1; $i <= count($product_category); $i++): ?>
                <option value=<? print $i; if (isset($_POST["category"]) && $_POST["category"] == $i)  print " selected=true";?>><?=$product_category[$i-1]?></option>
            <?php endfor; ?>
        </select>
        <span class="form__error">Выберите категорию</span>
      </div>
    </div>
    <div class="form__item form__item--wide">
      <label for="message">Описание</label>
      <textarea id="message" name="message" placeholder="Напишите описание лота" required><? if(isset($_POST["message"])) print $_POST["message"] ?></textarea>
      <span class="form__error">Напишите описание лота</span>
    </div>
    <div class="form__item form__item--file"> <!-- form__item--uploaded -->
      <label>Изображение</label>
      <div class="preview">
        <button class="preview__remove" type="button">x</button>
        <div class="preview__img">
          <img src="img/avatar.jpg" width="113" height="113" alt="Изображение лота">
        </div>
      </div>
      <div class="form__input-file">
        <input class="visually-hidden" type="file" id="photo2" value="" name="product_pic">
        <label for="photo2">
          <span>+ Добавить</span>
          <? print_r($_FILES); ?>
        </label>
      </div>
    </div>
    <div class="form__container-three">
      <div class="form__item form__item--small">
        <label for="lot-rate">Начальная цена</label>
        <input id="lot-rate" type="number" name="lot-rate" placeholder="0" required <? if(isset($_POST["lot-rate"])) print "value=" . $_POST["lot-rate"] ?>>
        <span class="form__error">Введите начальную цену</span>
      </div>
      <div class="form__item form__item--small">
        <label for="lot-step">Шаг ставки</label>
        <input id="lot-step" type="number" name="lot-step" placeholder="0" required <? if(isset($_POST["lot-step"])) print "value=" . $_POST["lot-step"] ?>>
        <span class="form__error">Введите шаг ставки</span>
      </div>
      <div class="form__item">
        <label for="lot-date">Дата окончания торгов</label>
        <input class="form__input-date" id="lot-date" type="date" name="lot-date" required <? if(isset($_POST["lot-date"])) print "value=" . $_POST["lot-date"] ?> >
        <span class="form__error">Введите дату завершения торгов</span>
      </div>
    </div>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <button type="submit" class="button">Добавить лот</button>
  </form>
</main>
<?php
    endif;

    if (!isset($page_mode))
    {
    $cont = include_bloc ("add.php", ["page_mode" => true]);
    print include_bloc("templates/layout.php", ["content" => $cont, "title" => "Add"]);  
    };
};
?>