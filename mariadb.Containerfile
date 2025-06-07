FROM docker.io/library/mariadb:latest

COPY migration/* /docker-entrypoint-initdb.d/
