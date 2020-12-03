import http.client
import json
import pandas as pd
import numpy as np

cities = [
    "Hertogenbosch",
    "Enschede",
    "Paris",
    "Lille",
    "Grenoble",
    "Hameenlinna",
    "Maynooth",
    "Belfast",
    "Worcester",
    "Bristol",
    "Herzliya",
    "Orlando",
    "Daejeon",
    "Concepcion",
    "Xiamen",
]

l = []
flight = []
for i in np.arange(0, len(cities)):
    l += [i]
    flight += [False]

ciudades = pd.DataFrame({"Index": l, "Ciudad": cities, "Vuelo_directo": flight})
ciudades.set_index("Index", inplace=True)

print(ciudades)


def city_code(city):
    # Connection to the API
    conn = http.client.HTTPSConnection(
        "skyscanner-skyscanner-flight-search-v1.p.rapidapi.com"
    )
    # Connection details
    headers = {
        "x-rapidapi-key": "3a09c225d7msh6c7ddddb42a1c0dp1e24b8jsn686ba0bd2b95",
        "x-rapidapi-host": "skyscanner-skyscanner-flight-search-v1.p.rapidapi.com",
    }
    # Request url
    url = "/apiservices/autosuggest/v1.0/ES/EUR/en-UK/?query=" + city
    # Connection request
    conn.request(
        "GET", url, headers=headers,
    )

    res = conn.getresponse()
    data = res.read()
    data = json.loads(data)

    # Get the city code
    if data["Places"] == []:
        return False
    else:
        return data["Places"][0]["PlaceId"]


def direct_route(destination_code):
    # Connection to the API
    conn = http.client.HTTPSConnection(
        "skyscanner-skyscanner-flight-search-v1.p.rapidapi.com"
    )
    # Connection details
    headers = {
        "x-rapidapi-key": "3a09c225d7msh6c7ddddb42a1c0dp1e24b8jsn686ba0bd2b95",
        "x-rapidapi-host": "skyscanner-skyscanner-flight-search-v1.p.rapidapi.com",
    }
    # Destination city
    url = (
        "/apiservices/browsequotes/v1.0/ES/EUR/en-GB/VLC-sky/"
        + destination_code
        + "/anytime?inboundpartialdate=anytime"
    )
    # Connection request
    conn.request(
        "GET", url, headers=headers,
    )

    res = conn.getresponse()
    data = res.read()
    data = json.loads(data)

    # Check if there is a direct flight
    direct = False
    for quote in data["Quotes"]:
        if quote["Direct"] is True:
            direct = True
            break

    return direct


def direct_flight(city_name=""):
    if city_name == "":
        return "Empty city name"
    else:
        code = city_code(city_name)
        if code == False:
            return False
        else:
            return direct_route(code)


# Calculate if there is direct flight
for i in np.arange(0, len(ciudades)):
    # Search direct flight
    ciudades["Vuelo_directo"][i] = direct_flight(ciudades.Ciudad[i])
    print(ciudades.Ciudad[i], ": Processed")


print("RESULT:\n", ciudades)

ciudades.to_csv("./vuelos_directos.csv", sep=",", header=True)

print("File saved as vuelos_directos.csv")
