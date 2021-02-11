# ver 0.10.18

Администрирование
Добавьте Роли на проект, создайте роль Администратор - теперь только администратор может зайти в административный раздел.

Администрирование статей
Реализуйте раздел управления статьями в административном разделе, в нем отображаются все статьи. Здесь админ может изменить любую статью, и снять ее с публикации, а на сайте теперь отображайте только опубликованные статьи.
В публичном разделе сайта у каждой статьи добавьте ссылку на редактирование, для админа - ссылка ведет в админку (используйте свою blade директиву)

Создание Админа
Создайте новую миграцию, в которой будете создавать предустановленного администратора сайта

Рассылка
Реализуйте команду, с помощью которой происходит рассылка всем пользователям о новых опубликованных статьях за указанный в аргументах период. Команда должна рассылать все опубликованные статьи опубликованные в указанный период.
Установить задачу по расписанию, отправлять рассылку каждый понедельник - в любой понравившийся вам час.

Предустановленные данные
Создайте Фабрики моделей на вашем сайте, реализуйте Seeder, с помощью которого, создайте как минимум двух пользователей, и не менее 20 статей, разделенных между ними. У статей также должны быть теги, и должны быть статьи, у которых есть совпадающие теги.

Rest-api Интеграция с внешним сервисом
Реализуйте интеграцию с внешним сервисом, например, вы можете интегрировать с pushall сервисом и присылать уведомление подписчикам канала, или себе, каждый раз когда создается новая статья на сайте.
Вместо предложенного примера, вы можете реализовать интеграцию с любым другим внешним сервисом, с которым бы вам хотелось интегрировать, при любом другом событии на вашем сайте.

Для выполнения задачи создайте отдельную ветку в вашем git-репозитории для этой задачи. Для сдачи задачи  создайте в вашем публичном git-репозитории  новый Pull Request (или Merge Request) на ветку master и пришлите ссылку на этот PR (MR).

Исправления замечаний делайте на этой же ветке, внутри этого же PR (MR).

Этот реквест нельзя выполнять (сливать) до тех пор, пока домашнее задание не будет засчитано преподавателем. Т.е. ваши изменения не должны попасть на ветку master до проверки домашнего задания преподавателем и его подтверждения, что задание выполнено верно.
После подтверждения выполнения задания преподавателем — слейте вашу ветку в master, выполнив реквест.