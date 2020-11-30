# Data Project 1 - Master Data Analytics EDEM

## Equipo

* [Sofía Zander](https://github.com/sozanmen)
* [Vicente Gil](https://github.com/vicentegilso)
* [Jorge Camáñez](https://github.com/jcamcre)
* [Javier Briones](https://github.com/jabrio)
* [Vicent Asensio](https://github.com/viasmo1)


## Program setup

### Containers set up

1. Git pull the following repo: [edem-mda-DP1-wake](https://github.com/viasmo1/edem-mda-DP1-wake)

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

1. Navigate to [localhost:5050](http://localhost:5050)

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
| [Zeppelin](http://localhost:19999) | 19999 |
| [PgAdmin](localhost:5050) | 5432 |