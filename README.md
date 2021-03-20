# ver 0.10.52
task87

Web-Socket

Подключите администраторов к отдельному web-socket — каналу уведомлений.

Каждый раз, когда на сайте происходит изменение статьи, отправляйте в этот канал следующую информацию:

    какая статья была изменена,
    какие поля были изменены,
    ссылку на эту статью.

При получении такого сообщения покажите всплывающее уведомление всем подписчикам этого канала, внутри которого будет выведена вся полученная информация.


* Необязательное задание

Когда администратор запрашивает генерацию отчёта, и после этого остается на текущей странице, выведите результат (текст отчёта) в ее теле или во всплывающем уведомлении.

Для реализации этой задачи используйте web-socket-соединение. Когда пользователь заходит на страницу отчётов (и только на эту страницу), устанавливаете такое соединение; если в него пришло сообщение, то выводите его.