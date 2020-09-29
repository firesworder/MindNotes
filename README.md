# MindNotes
Решаемая проблема: "Тяжело/неудобно собирать куски одной мысли в большом списке,
а от этого идет дальнейшие противоречие, что портит все".

"Нет общего удобного(что значит удобного?) списка сформированных определений 
видения". - Доработка на будущее.

Решение: отказаться от использования блокнотов и Office программ.
Yt оставить только для задач, пока.
Решение(программа):
Программа должна иметь возможность сохранять мысли, с возможностью их потом
отредактировать или удалить.
Мыслям можно присвоить теги, создаваемые вручную, для последующей фильтрации этих
мыслей.
Upd1. Будущее программы - нейронная сеть с UI.

Команды sql(вдруг пригодится):
####Создание бд
`CREATE DATABASE thoughts_app DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;
`
####ORM
`vendor/bin/doctrine orm:schema-tool:create`

`vendor/bin/doctrine orm:schema-tool:drop --force`

`vendor/bin/doctrine orm:schema-tool:update --force`

Заметки:
Несмотря на то, что при прямом подключении к бд, вместо
кириллицы видно ??? - при работе через ORM - русские символы и
сохраняются и выводятся корректно. Нет повода для беспокойства.

####Подключение к docker контейнеру
Узнать id запущенных контейнеров
`docker ps`

Получить доступ к консоли конкретного контейнера
(пока только неудобная sh)
`docker exec -it <id> /bin/sh`