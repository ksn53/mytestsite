# ver 0.02

    Создано очень много лишних методов и контроллерво, котоыре в будущем не пригодятся, feedback, about, Нужно удалить из них всех лишние методы, и удалить неиспольуземые контроллеры.

    На детальной странице статьи используйте привязку моделей к контроллеру: https://laravel.com/docs/master/routing#route-model-binding

    Для установки заголовка используйте возможности шаблонизатора blade - https://laravel.com/docs/master/blade#extending-a-layout - обратите внимание как передается title в этом примере, не надо дублировать код в каждом шаблоне

    Если не удалось создать статью или сообщение, то вместе с выводом ошибок нужно подставить в формы предыдущие значения, для этого используйте вспомогательную функцию old

    Лишние view, которые не используете удалите

    View нужно сгруппировать по смыслу. Шаблон лежит в корне, при этом есть папка с шаблоном, там части от всего подряд.

    Для организации ссылок на сайте, лучше использовать компонент Url generation: https://laravel.com/docs/master/urls и лучшим вариантом будет использовать именованные маршруты