# ver 0.10.40
task78

Тегирование

    Реализуйте возможность привязывать теги к любым моделям (полиморфные связи).
    Добавьте возможность указывать теги для новостей.
    На странице создания и редактирования новости примените созданный ранее сервис для сохранения и привязки тегов.
    На странице отображения по тегам теперь видны и новости, и статьи двумя отдельными списками без постраничной навигации. При этом отображаются только эти две модели.  Если привязать теги ещё и, например, к пользователям, то они не должны появиться на этой странице.


Комментарии к новостям

К новостям теперь также можно добавить комментарии с теми же правилами, что и к статьям.


Статистика портала

Добавьте на сайт страницу, в которой отображается любопытная статистика на сайте. Для её реализации используйте Eloquent-модели и методы связей между ними, а также компонент Query Builder.Старайтесь не применять методы коллекций там, где можно обойтись без них (почти во всех пунктах статистики ниже).

    Общее количество статей.
    Общее количество новостей.
    ФИО автора, у которого больше всего статей на сайте.
    Самая длинная статья — название, ссылка на статью и длина статьи в символах.
    Самая короткая статья — название, ссылка на статью и длина статьи в символах.
    Средние количество статей у активных пользователей (пользователь считается активным, если у него более 1 статьи).
    Самая непостоянная — название, ссылка на статью, которую меняли больше всего раз.
    Самая обсуждаемая статья — название, ссылка на статью, у которой больше всего комментариев.

Можете придумать и другие статистические выкладки, которые можно сформировать одним запросом с помощью компонента Query Builder.