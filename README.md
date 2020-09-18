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

## Что реализовано:
### Служебное:
- Подключение библиотек (ORM, YamlParser)
- Адаптер для ORM генерации
- Контейнер для EntityManager(ORM)
### Программа
- 2 сущности Тег и Мысль.
- Репозиторий(пустой) для сущности Мысль.

## На реализацию:
1. Страница списка мыслей.
3. Страницы добавления мысли.
4. Страницы редактирования мысли.
5. Страницы удаления мысли.
6. Страница просмотра мысли.
7. Страница добавления тега.
8. Страница редактирования тега.
9. Страница удаления тега.
10. Фильтр для мыслей, по тегам.
11. Фильтр для мыслей, по полю isProccessed.
11. Контроллер для API мыслей.
12. Контроллер для API тегов.
13. Класс обработки запроса. (AppMain).
14. Реализовать класс для подключения шаблонов контентных страниц.
15. Описать шаблоны контентных страниц.

## Пояснения к задачам:
- 3-5. Редактируемая детальная страница(все поля).
Можно обработанность показывать через чекбокс.
Теги выбираются из списка, 1+.
- 3-6 и 7-9 - два контроллера.