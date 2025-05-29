FROM mariadb:10.11

COPY ./migration/ /docker-entrypoint-initdb.d/
