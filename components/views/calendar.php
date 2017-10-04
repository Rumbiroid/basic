<?php
use app\assets\AppCalendar;
AppCalendar::register($this);
$this ->registerJsFile('@web/js/jquery.js',['position' => $this::POS_HEAD],'main-index');
?>



<body>
	<div id="eventCalendar"></div>



    <script>
        $(function(){
            $('#eventCalendar').eventCalendar({
                //jsonData: data,
                eventsjson: 'js/calendar/data.json',
                jsonDateFormat: 'human',
                startWeekOnMonday: true,
                openEventInNewWindow: true,
                dateFormat: 'dddd DD-MM-YYYY',
                showDescription: false,
                locales: {
                    locale: "ru",
                    txt_noEvents: "Нет запланированных событий",
                    txt_SpecificEvents_prev: "",
                    txt_SpecificEvents_after: "события:",
                    txt_NextEvents: "Следующие события:",
                    txt_GoToEventUrl: "Оф страница",
                    txt_GoToEventUrl1: "Предзаказ",
                    moment: {
                        "months" : [ "Январь", "Февраль", "Март", "Апрель", "Май", "Июнь",
                            "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь" ],
                        "monthsShort" : [ "Янв", "Фев", "Мар", "Апр", "Май", "Июн",
                            "Июл", "Авг", "Сен", "Окт", "Ноя", "Дек" ],
                        "weekdays" : [ "Воскресенье", "Понедельник","Вторник","Среда","Четверг",
                            "Пятница","Суббота" ],
                        "weekdaysShort" : [ "Вс","Пн","Вт","Ср","Чт",
                            "Пт","Сб" ],
                        "weekdaysMin" : [ "Вс","Пн","Вт","Ср","Чт",
                            "Пт","Сб" ]
                    }
                }
            });
        });
    </script>
</body>
