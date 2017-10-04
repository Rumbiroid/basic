<?php
/* @var $this yii\web\View */
//$this ->registerJsFile('@web/js/main-index.js',['position' => $this::POS_HEAD],'main-index');
$this->title = 'О нас';
$this->registerMetaTag(['name' => 'description','content' => 'Информация о нашем прокате']);
$this->registerMetaTag(['name' => 'keywords','content' => 'О прокате,легальность,способы оплаты,безопастность']);
$this->params['breadcrumbs'][] = $this->title;
?>



<body-content>
    <style>
        .about ul li {
            list-style-type: none;
            padding: 2px;
        }
        .about ul li:before{
            padding-right: 5px;
        }
        #card:before{
            content: url('../img/pay_met/vs.png');
        }
        #wm:before{
            content: url('../img/pay_met/wm.png');
        }
        #yd:before{
            content: url('../img/pay_met/yd.png');
        }
        #pp:before{
            content: url('../img/pay_met/pp.png');
        }
        #qw:before{
            content: url('../img/pay_met/qw.png');
        }
        #db:before{
            content: url('../img/pay_met/db.png');
        }
        #bt:before{
            content: url('../img/pay_met/bt.png');
        }
        #sb:before{
            content: url('../img/pay_met/sb.png');
        }
        #vtb:before{
            content: url('../img/pay_met/vtb.png');
        }
        #ab:before{
            content: url('../img/pay_met/ab.png');
        }
        #ps:before{
            content: url('../img/pay_met/ps.png');
        }
    </style>

    <div class="about">
        <h4>Наш сервис предлагает Вам взять в прокат игры для PlayStation 4.
        <br>Чтобы насладиться новинкой или снова окунуться в любимую игру не обязательно покупать ее за полную
        стоимость - можно сэкономить до 90% от стоимости игры, взяв ее в прокат.
		<br>С нашим сервисом проката Вы всегда будете в курсе новинок!</h4>

        <h3 class = "icon-shopping-bag">Магазин</h3>
        <p>Наш прокат расположен на площадке digiseller и подтвержден персональным сертификатом системы Webmoney Transfer.
        <br>Площадка plati.ru гарантирует моментальную доставку товара и безопастность Ваших данных при оплате.</p>

        <h3 class="icon-cart-arrow-down">Товары</h3>
        <p>Аккаунты зарегистрированы на продавцов, лицензионные цифровые копии куплены за личные средства.</p>

        <h3 class = "icon-hammer">Легальность</h3>
        <p>Комания Sony не запрещает запускать игры на других консолях:
    <br><a href = 'https://www.playstation.com/ru-ru/get-help/help-library/games/installing--downloading---updating/how-to-access-playstation-store-content-from-a-friends-playstati0/'>
        Как получить доступ к материалам из PlayStation Store на чужой системе PlayStation 4.</a>
    <a href = 'https://www.playstation.com/ru-ru/get-help/help-library/my-account/device-activation-deactivation/about-device-activation/'>
        <br>Для скольких учетных записей можно активировать одно устройство?</a>
        <br>Систему PlayStation можно активировать для стольких учетных записей Sony Entertainment Network, сколько учетных записей локальных пользователей может быть на этой системе.
        <br>Например, на системе PlayStation 4 или PlayStation 3 может быть одновременно до 16 локальных пользователей с учетными записями Sony Entertainment Network, а на системе PS Vita или PSP - только один.
        </p>

        <h3 class = "icon-thumbs-up">Преимущетсва</h3>
        <ul>
            <li>Получить игру можно не выходя из дома</li>
            <li>Моментальная доставка</li>
            <li>Безопасная оплата</li>
            <li>Можно играть на личном аккаунте, трофеи и сохранения остануться на личном аккаунте.</li>
            <li>Экономия до 90% от стоимости</li>
        </ul>
	
	    <h3 class = "icon-credit-card-alt"> Оплата</h3>
        <p>Оплата производится любым удобным способом:</p>
        <ul>
			<li id="card">Банковская карта</li>
            <li id="wm">Webmoney</li>
            <li id="yd">Yandex деньги</li>
            <li id="pp">PayPal</li>
            <li id="qw">Qiwi</li>
            <li id="bt">Bitcoin</li>
            <li id="db">Интернет-банк</li>
            <ul>
                <li id="sb">Сбербанк онлайн</li>
                <li id="ab">Альфа-банк</li>
                <li id="vtb">Втб24</li>
                <li id="ps">Промсвязьбанк</li>
            </ul>
        </ul>


        <h3 class = "icon-umbrella">Безопасность</h3>
		<p>Оплата производится по протоколу https - это значит, что сайт поддерживает протокол безопасной передачи ваших данных (SSL/TLS).
		<br/>Предотвращается перехват, взлом данных, а также вмешательство в них при передаче</p>


		<h4>Если у Вас возникли вопросы можете написат нам сообщение</h4>
        <p><a class="btn btn-default icon-mail" href="./contact"> Написать нам</a></p>

    </div>
</body-content>










