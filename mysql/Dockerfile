FROM mysql:5.7
#тестовый формат переменных окружения
ENV MYSQL_DATABASE=test \
    MYSQL_ROOT_PASSWORD=root
# (раньше было ADD) все что скопировано по пути /docker-entrypoint-initdb.d - будет запущено для билда sql-ки
#COPY schema.sql /docker-entrypoint-initdb.d