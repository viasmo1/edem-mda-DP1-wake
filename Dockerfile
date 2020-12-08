FROM postgres:12.5
ENV postgres_pasword WakeDP1
ENV postgres_user WakeTeam
COPY database_schema.sql /docker-entrypoint-initdb.d/