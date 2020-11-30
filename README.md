# Data Project 1 - Master Data Analytics EDEM

## Equipo

* [Sofía Zander](https://github.com/sozanmen)
* [Vicente Gil](https://github.com/vicentegilso)
* [Jorge Camáñez](https://github.com/jcamcre)
* [Javier Briones](https://github.com/jabrio)
* [Vicent Asensio](https://github.com/viasmo1)


## Program setup

### Containers set up

1. Git pull the following repo: <a href="https://github.com/viasmo1/edem-mda-DP1-wake" target="_blank">edem-mda-DP1-wake</a>

2. Navigate to the path where the docker compose file is:
```sh
ls
README.md		docker-compose.yml
```

3. Run the following command:
```sh
docker-compose up -d
```

### Create postgres server

1. Navigate to <a href="http://localhost:5050" target="_blank">localhost:5050</a>

    - Credentials:
        - *Email:* waketeam@wake.org
        - *Password:* WakeDP1

2. Create a new server with the following configuration:
    - General:
        - *Name:* DP1-Wake
    - Connection:
        - *Host:* postgres
        - *Port:* 5432
        - *Username:* WakeTeam
        - *Password:* WakeDP1


## Components

| Component | Port |
| --- | --- |
| <a href="http://localhost:19999" target="_blank">Zeppelin</a> | 19999 |
| <a href="http://localhost:5050" target="_blank">PgAdmin</a>  | 5432 |