FROM postgres:12.5

COPY database_schema.sql /docker-entrypoint-initdb.d/