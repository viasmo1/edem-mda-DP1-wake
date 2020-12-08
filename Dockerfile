FROM postgres:12.5

ENV POSTGRES_USER 'WakeTeam'
ENV POSTGRES_PASSWORD 'WakeDP1'

COPY database_schema.sql /docker-entrypoint-initdb.d/