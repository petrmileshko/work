<header class="page__header" id="top">
<nav class="navigation center-fixed">
      <div class="navigation__wrapper">

				<?php
				if (has_custom_logo()) echo get_custom_logo();
				else echo "Логотип";
				?>


        <button class="navigation__button button burger burger--nojs" type="button">
          <span class="burger__icon">
            <span class="button__text text visually-hidden">Меню</span>
          </span>
        </button>
      </div>

      <ul class="navigation__menu menu menu--nojs">
        <li class="menu__item"><a class="menu__link menu__link--current text" href="#">Отчеты</a></li>
        <li class="menu__item"><a class="menu__link text" href="#">ЛК</a></li>
        <li class="menu__item"><a class="menu__link text" href="#">Выход</a></li>
      </ul>
    </nav>
</header>
