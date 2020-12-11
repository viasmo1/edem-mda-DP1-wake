#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Created on Mon Dec  7 16:21:27 2020

@author: javierbrionesgomez
"""

#WAKETEAM CÓDIGO DATAPROJECT_01
#ETL DATASETS

#IMPORT
import os
import pandas as pd
import numpy as np
import matplotlib.pyplot as plt 
import scipy.stats as stats   
import seaborn as sns
import json
import requests
import http.client


##### 01: CREATION OF CITY TABLE #####

#Columns=["id", "name", "Country", "University", "University_ranking","English_level", "Distance_to_vlc", "Direct_flight", "Avg_temp", "Rainy_days", "Bike_stations_km2", "Housing_price_index", "Consumer_price_index", "Unemployment_rate"]

#Definition of the variables

Data={"ID": (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15),
      "Name": ("Enschede", "Hertogenbosch", "Paris", "Lille", "Grenoble", "Hameenlinna", "Maynooth", "Belfast", "Worcester","Bristol", "Herzliya", "Orlando", "Daejeon", "Concepcion", "Xiamen", "Monterrey"),
      "Country": ("Netherlands", "Netherlands", "France", "France", "France", "Finland", "Ireland", "Northern Ireland", "England", "England", "Israel", "United States", "South Korea", "Chile", "China", "Mexico"),
      "University": ("Saxion_University", "Avans_University", "EDC_Paris", "EDHEC", "IAE_Grenoble", "HAMK_University", "Maynooth_University", "Ulster_University", "University_of_Worcester", "UWE_Bristol", "IDC_Herzliya", "Seminole_State_College", "Solbridge_International_School_of_Business", "Universidad_del_Desarrollo", "Xiamen_University", "Tecnologico_de_Monterrey"),
      "University_ranking": (3039, 6300, 0, 2514, 309, 6265, 1837, 635, 3107, 649, 1323, 5728, 0, 1680, 268, 831),
      "English_level": ("B2", "B2", "B2", "B2", np.nan, np.nan, "Proficiency test", "B2", "B2", "B2", "Proficiency test", np.nan, np.nan, np.nan, "Proficiency test", np.nan)}

#Create dataset

df_WakeTeam=pd.DataFrame(Data)
df_WakeTeam["University_ranking"].astype("int")

#VARIABLE 01: DISTANCE TO VALENCIA

#origin coordinates=EDEM
Latitude_origin= 39.4618898
Longitude_origin= -0.3313735
Ogn= (Latitude_origin, Longitude_origin)

########################## CASE_01:SAXION UNIVERSITY ##########################

Api_Place_Enschede=pd.read_json("https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input=Enschede&inputtype=textquery&fields=geometry&key=AIzaSyAjOAahwherT8Iem7IGAOG7EPeNJTSOUwA")

#Extract from json file  
for candidates in Api_Place_Enschede["candidates"]:
    name=candidates["geometry"]
    coord=name["location"]
    lat_Enschede=coord["lat"]
    lon_Enschede=coord["lng"]
    
#Distance
from math import cos, sin, acos, radians

Dest1= (lat_Enschede, lon_Enschede)

Origin=(radians(Ogn[0]),radians(Ogn[1]))
Destination1=(radians(Dest1[0]),radians(Dest1[1]))

dist1=acos(sin(Origin[0])*sin(Destination1[0])+ cos(Origin[0])*cos(Destination1[0])*cos(Origin[1]-Destination1[1]))
distance1=dist1*6371

#Insert in dataframe

df_WakeTeam.at[0, 'Distance_to_vlc']= distance1

########################## CASE_02:AVANS UNIVERSITY ##########################
#READ
Api_Place_Hertogenbosch=pd.read_json("https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input=Hertogenbosch&inputtype=textquery&fields=geometry&key=AIzaSyAjOAahwherT8Iem7IGAOG7EPeNJTSOUwA")

#Extract from json file
import json   
for candidates in Api_Place_Hertogenbosch["candidates"]:
    name=candidates["geometry"]
    coord=name["location"]
    lat_Hertogenbosch=coord["lat"]
    lon_Hertogenbosch=coord["lng"]

#Distance
from math import cos, sin, acos, radians

Dest2= (lat_Hertogenbosch, lon_Hertogenbosch)

Destination2=(radians(Dest2[0]),radians(Dest2[1]))

dist2=acos(sin(Origin[0])*sin(Destination2[0])+ cos(Origin[0])*cos(Destination2[0])*cos(Origin[1]-Destination2[1]))
distance2=dist2*6371

#Insert in dataframe

df_WakeTeam.at[1, 'Distance_to_vlc']= distance2

########################## CASE_03:EDC PARIS ##########################

Api_Place_Paris=pd.read_json("https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input=Paris&inputtype=textquery&fields=geometry&key=AIzaSyAjOAahwherT8Iem7IGAOG7EPeNJTSOUwA")

#Extract from json file  
for candidates in Api_Place_Paris["candidates"]:
    name=candidates["geometry"]
    coord=name["location"]
    lat_Paris=coord["lat"]
    lon_Paris=coord["lng"]
    
#Distance
from math import cos, sin, acos, radians

Dest3= (lat_Paris, lon_Paris)

Destination3=(radians(Dest3[0]),radians(Dest3[1]))

dist3=acos(sin(Origin[0])*sin(Destination3[0])+ cos(Origin[0])*cos(Destination3[0])*cos(Origin[1]-Destination3[1]))
distance3=dist3*6371

#Insert in dataframe

df_WakeTeam.at[2, 'Distance_to_vlc']= distance3

########################## CASE_04:EDHEC ##########################

Api_Place_Lille=pd.read_json("https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input=Lille&inputtype=textquery&fields=geometry&key=AIzaSyAjOAahwherT8Iem7IGAOG7EPeNJTSOUwA")

#Extract from json file  
for candidates in Api_Place_Lille["candidates"]:
    name=candidates["geometry"]
    coord=name["location"]
    lat_Lille=coord["lat"]
    lon_Lille=coord["lng"]


#Distance
from math import cos, sin, acos, radians

Dest4= (lat_Lille, lon_Lille)

Destination4=(radians(Dest4[0]),radians(Dest4[1]))

dist4=acos(sin(Origin[0])*sin(Destination4[0])+ cos(Origin[0])*cos(Destination4[0])*cos(Origin[1]-Destination4[1]))
distance4=dist4*6371

#Insert in dataframe

df_WakeTeam.at[3, 'Distance_to_vlc']= distance4

########################## CASE_05:IAE GRENOBLE ##########################

Api_Place_Grenoble=pd.read_json("https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input=Grenoble&inputtype=textquery&fields=geometry&key=AIzaSyAjOAahwherT8Iem7IGAOG7EPeNJTSOUwA")

#Extract from json file  
for candidates in Api_Place_Grenoble["candidates"]:
    name=candidates["geometry"]
    coord=name["location"]
    lat_Grenoble=coord["lat"]
    lon_Grenoble=coord["lng"]

#Distance
from math import cos, sin, acos, radians

Dest5= (lat_Grenoble, lon_Grenoble)

Destination5=(radians(Dest5[0]),radians(Dest5[1]))

dist5=acos(sin(Origin[0])*sin(Destination5[0])+ cos(Origin[0])*cos(Destination5[0])*cos(Origin[1]-Destination5[1]))
distance5=dist5*6371

#Insert in dataframe

df_WakeTeam.at[4, 'Distance_to_vlc']= distance5

########################## CASE_06:HAMK UNIVERSITY ##########################

Api_Place_Hämeenlinna=pd.read_json("https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input=Hameenlinna&inputtype=textquery&fields=geometry&key=AIzaSyAjOAahwherT8Iem7IGAOG7EPeNJTSOUwA")

#Extract from json file  
for candidates in Api_Place_Hämeenlinna["candidates"]:
    name=candidates["geometry"]
    coord=name["location"]
    lat_Hämeenlinna=coord["lat"]
    lon_Hämeenlinna=coord["lng"]

#Distance
from math import cos, sin, acos, radians

Dest6= (lat_Hämeenlinna, lon_Hämeenlinna)

Destination6=(radians(Dest6[0]),radians(Dest6[1]))

dist6=acos(sin(Origin[0])*sin(Destination6[0])+ cos(Origin[0])*cos(Destination6[0])*cos(Origin[1]-Destination6[1]))
distance6=dist6*6371

#Insert in dataframe

df_WakeTeam.at[5, 'Distance_to_vlc']= distance6

########################## CASE_07:MAYNOOTH UNIVERSITY ##########################

Api_Place_Maynooth=pd.read_json("https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input=Maynooth-South&inputtype=textquery&fields=geometry&key=AIzaSyAjOAahwherT8Iem7IGAOG7EPeNJTSOUwA")

#Extract from json file  
for candidates in Api_Place_Maynooth["candidates"]:
    name=candidates["geometry"]
    coord=name["location"]
    lat_Maynooth=coord["lat"]
    lon_Maynooth=coord["lng"]

#Distance
from math import cos, sin, acos, radians

Dest7= (lat_Maynooth, lon_Maynooth)

Destination7=(radians(Dest7[0]),radians(Dest7[1]))

dist7=acos(sin(Origin[0])*sin(Destination7[0])+ cos(Origin[0])*cos(Destination7[0])*cos(Origin[1]-Destination7[1]))
distance7=dist7*6371

#Insert in dataframe

df_WakeTeam.at[6, 'Distance_to_vlc']= distance7

########################## CASE_08:ULSTER UNIVERSITY ##########################

Api_Place_Belfast=pd.read_json("https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input=Belfast&inputtype=textquery&fields=geometry&key=AIzaSyAjOAahwherT8Iem7IGAOG7EPeNJTSOUwA")

#Extract from json file 
for candidates in Api_Place_Belfast["candidates"]:
    name=candidates["geometry"]
    coord=name["location"]
    lat_Belfast=coord["lat"]
    lon_Belfast=coord["lng"]
    
#Distance
from math import cos, sin, acos, radians

Dest8= (lat_Belfast, lon_Belfast)

Origin=(radians(Ogn[0]),radians(Ogn[1]))
Destination8=(radians(Dest8[0]),radians(Dest8[1]))

dist8=acos(sin(Origin[0])*sin(Destination8[0])+ cos(Origin[0])*cos(Destination8[0])*cos(Origin[1]-Destination8[1]))
distance8=dist8*6371

#Insert in dataframe

df_WakeTeam.at[7, 'Distance_to_vlc']= distance8

########################## CASE_09:WORCESTER UNIVERSITY ##########################

Api_Place_Worcester=pd.read_json("https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input=Worcester&inputtype=textquery&fields=geometry&key=AIzaSyAjOAahwherT8Iem7IGAOG7EPeNJTSOUwA")

#Extract from json file
for candidates in Api_Place_Worcester["candidates"]:
    name=candidates["geometry"]
    coord=name["location"]
    lat_Worcester=coord["lat"]
    lon_Worcester=coord["lng"]

#Distance
from math import cos, sin, acos, radians

Dest9= (lat_Worcester, lon_Worcester)

Destination9=(radians(Dest9[0]),radians(Dest9[1]))

dist9=acos(sin(Origin[0])*sin(Destination9[0])+ cos(Origin[0])*cos(Destination9[0])*cos(Origin[1]-Destination9[1]))
distance9=dist9*6371

#Insert in dataframe

df_WakeTeam.at[8, 'Distance_to_vlc']= distance9

########################## CASE_10:UWE BRISTOL ##########################

Api_Place_Bristol=pd.read_json("https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input=Bristol&inputtype=textquery&fields=geometry&key=AIzaSyAjOAahwherT8Iem7IGAOG7EPeNJTSOUwA")

#Extract from json file
for candidates in Api_Place_Bristol["candidates"]:
    name=candidates["geometry"]
    coord=name["location"]
    lat_Bristol=coord["lat"]
    lon_Bristol=coord["lng"]

#Distance
from math import cos, sin, acos, radians

Dest10= (lat_Bristol, lon_Bristol)

Destination10=(radians(Dest10[0]),radians(Dest10[1]))

dist10=acos(sin(Origin[0])*sin(Destination10[0])+ cos(Origin[0])*cos(Destination10[0])*cos(Origin[1]-Destination10[1]))
distance10=dist10*6371

#Insert in dataframe

df_WakeTeam.at[9, 'Distance_to_vlc']= distance10

########################## CASE_11:IDC HERZLIYA ##########################

Api_Place_Herzliya=pd.read_json("https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input=Herzliya&inputtype=textquery&fields=geometry&key=AIzaSyAjOAahwherT8Iem7IGAOG7EPeNJTSOUwA")

#Extract from json file 
for candidates in Api_Place_Herzliya["candidates"]:
    name=candidates["geometry"]
    coord=name["location"]
    lat_Herzliya=coord["lat"]
    lon_Herzliya=coord["lng"]
    
#Distance
from math import cos, sin, acos, radians

Dest11= (lat_Herzliya, lon_Herzliya)

Destination11=(radians(Dest11[0]),radians(Dest11[1]))

dist11=acos(sin(Origin[0])*sin(Destination11[0])+ cos(Origin[0])*cos(Destination11[0])*cos(Origin[1]-Destination11[1]))
distance11=dist11*6371

#Insert in dataframe

df_WakeTeam.at[10, 'Distance_to_vlc']= distance11

########################## CASE_12:SEMINOLE STATE COLLEGE ##########################

Api_Place_Orlando=pd.read_json("https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input=Orlando&inputtype=textquery&fields=geometry&key=AIzaSyAjOAahwherT8Iem7IGAOG7EPeNJTSOUwA")

#Extract from json file
for candidates in Api_Place_Orlando["candidates"]:
    name=candidates["geometry"]
    coord=name["location"]
    lat_Orlando=coord["lat"]
    lon_Orlando=coord["lng"]

#Distance
from math import cos, sin, acos, radians

Dest12= (lat_Orlando, lon_Orlando)

Destination12=(radians(Dest12[0]),radians(Dest12[1]))

dist12=acos(sin(Origin[0])*sin(Destination12[0])+ cos(Origin[0])*cos(Destination12[0])*cos(Origin[1]-Destination12[1]))
distance12=dist12*6371

#Insert in dataframe

df_WakeTeam.at[11, 'Distance_to_vlc']= distance12

########################## CASE_13:SOLBRIDGE ##########################

Api_Place_Daejeon=pd.read_json("https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input=Daejeon&inputtype=textquery&fields=geometry&key=AIzaSyAjOAahwherT8Iem7IGAOG7EPeNJTSOUwA")

#Extract from json file  
for candidates in Api_Place_Daejeon["candidates"]:
    name=candidates["geometry"]
    coord=name["location"]
    lat_Daejeon=coord["lat"]
    lon_Daejeon=coord["lng"]

#Distance
from math import cos, sin, acos, radians

Dest13= (lat_Daejeon, lon_Daejeon)

Destination13=(radians(Dest13[0]),radians(Dest13[1]))

dist13=acos(sin(Origin[0])*sin(Destination13[0])+ cos(Origin[0])*cos(Destination13[0])*cos(Origin[1]-Destination13[1]))
distance13=dist13*6371


#Insert in dataframe

df_WakeTeam.at[12, 'Distance_to_vlc']= distance13

########################## CASE_14:UNIVERSIDAD DESARROLLO ##########################

Api_Place_Concepcion=pd.read_json("https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input=Concepcion,Chile&inputtype=textquery&fields=geometry&key=AIzaSyAjOAahwherT8Iem7IGAOG7EPeNJTSOUwA")

#Extract from json file  
for candidates in Api_Place_Concepcion["candidates"]:
    name=candidates["geometry"]
    coord=name["location"]
    lat_Concepcion=coord["lat"]
    lon_Concepcion=coord["lng"]

#Distance
from math import cos, sin, acos, radians

Dest14= (lat_Concepcion, lon_Concepcion)

Destination14=(radians(Dest14[0]),radians(Dest14[1]))

dist14=acos(sin(Origin[0])*sin(Destination14[0])+ cos(Origin[0])*cos(Destination14[0])*cos(Origin[1]-Destination14[1]))
distance14=dist14*6371


#Insert in dataframe

df_WakeTeam.at[13, 'Distance_to_vlc']= distance14

########################## CASE_15:XIAMEN UNIVERSITY ##########################

Api_Place_Xiamen=pd.read_json("https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input=Xiamen&inputtype=textquery&fields=geometry&key=AIzaSyAjOAahwherT8Iem7IGAOG7EPeNJTSOUwA")

#Extract from json file 
for candidates in Api_Place_Xiamen["candidates"]:
    name=candidates["geometry"]
    coord=name["location"]
    lat_Xiamen=coord["lat"]
    lon_Xiamen=coord["lng"]

#Distance
from math import cos, sin, acos, radians

Dest15= (lat_Xiamen, lon_Xiamen)

Destination15=(radians(Dest15[0]),radians(Dest15[1]))

dist15=acos(sin(Origin[0])*sin(Destination15[0])+ cos(Origin[0])*cos(Destination15[0])*cos(Origin[1]-Destination15[1]))
distance15=dist15*6371

#Insert in dataframe

df_WakeTeam.at[14, 'Distance_to_vlc']= distance15

########################## CASE_16:TECNOLÓGICO DE MONTERREY ##########################

Api_Place_Monterrey=pd.read_json("https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input=Monterrey&inputtype=textquery&fields=geometry&key=AIzaSyAjOAahwherT8Iem7IGAOG7EPeNJTSOUwA")

#Extract from json file 
for candidates in Api_Place_Monterrey["candidates"]:
    name=candidates["geometry"]
    coord=name["location"]
    lat_Monterrey=coord["lat"]
    lon_Monterrey=coord["lng"]

#Distance
from math import cos, sin, acos, radians

Dest16= (lat_Monterrey, lon_Monterrey)

Destination16=(radians(Dest16[0]),radians(Dest16[1]))

dist16=acos(sin(Origin[0])*sin(Destination16[0])+ cos(Origin[0])*cos(Destination16[0])*cos(Origin[1]-Destination16[1]))
distance16=dist16*6371


#Insert in dataframe

df_WakeTeam.at[15, 'Distance_to_vlc']= distance16

#VARIABLE 02: DIRECT FLIGHT TO VALENCIA

cities=["Enschede", "Hertogenbosch", "Paris", "Lille", "Grenoble", "Hameenlinna", "Maynooth", "Belfast", "Worcester","Bristol", "Herzliya", "Orlando", "Daejeon", "Concepcion", "Xiamen", "Monterrey"]

l = []
flight = []
for i in np.arange(0, len(cities)):
    l += [i]
    flight += [False]

ciudades = pd.DataFrame({"Index": l, "Name": cities, "Direct_flight": flight})
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
    ciudades["Direct_flight"][i] = direct_flight(ciudades.Name[i])
    print(ciudades.Name[i], ": Processed")

#Merge
df_WakeTeam=pd.merge(df_WakeTeam, ciudades, on="Name")

#replace

df_WakeTeam['Direct_flight']=df_WakeTeam.Direct_flight.replace(True,1)
df_WakeTeam['Direct_flight']=df_WakeTeam.Direct_flight.replace(False,0)
df_WakeTeam['Direct_flight']=df_WakeTeam['Direct_flight'].astype("int")

#VARIABLE 03: AVERAGE TEMPERATURE 

#Option 01: OWE API --> Current Data

#url1=("http://api.openweathermap.org/data/2.5/weather?q=Enschede&start=%201577833200%20&end=%201606777200%20&APPID=7f6db94165cf4675ca1cc489194ff830")
#response1 = requests.get(url1)

#response_json1=response1.json()
#main1=response_json1['main']
#temp1=main1["temp"]
#print(temp1)

#Descartado por que no es útil utilizar la temperatura actual para designar qué ciudad tiene un determinado clima.
#Podríamos optar por la API de pago de OWE.

#Option 01.B:OWE API --> Current Data
#https://history.openweathermap.org/data/2.5/aggregated/year?q=IMPUT&appid=beae64ff943c6f77aeceaf55d31219e9
#No desarrollada al ser de pago

#Option 02: NOAA -- > Historical Data

#We choose option 02

temp_data=[12.2,11.3, 12.1, 10.4, 10.9, 5.9, 11, 9.4, 14.1, 14.3, 20.3, 22.7, 13.0, 12.9, 21.1, 22.3]
df_WakeTeam['Avg_temp']= temp_data

#VARIABLE 04: RAINY DAYS

#Option 01: OWE API --> Current Data
#Option 02: NOAA -- > Historical Data

#We choose option 02

rain_data=[183, 180, 164, 171, 144, 106, 128, 158, 113, 136, 74, 117, 116, 102, 121, 60]
df_WakeTeam['Rainy_days']= rain_data

#VARIABLE 05: BIKE STATIONS / KM2
#source=Google & Bikesharemap

#Enschede
#WEB

Enschede_Area=142.7
Enschede_stations=1
Enschede_Bike=Enschede_stations/Enschede_Area

#Hertogenbosch
#WEB

Hertogenbosch_Area= 91.26
Hertogenbosch_stations=2
Hertogenbosch_Bike=Hertogenbosch_stations/Hertogenbosch_Area

#Paris
#API

url_bike1=("https://velib-metropole-opendata.smoove.pro/opendata/Velib_Metropole/station_information.json")

response1 = requests.get(url_bike1)
response_json1=response1.json()
data=response_json1["data"]
stations=data["stations"]

Paris_stations= (len(stations))

Paris_Area=105.4
Paris_Bike=Paris_stations/Paris_Area

#Lille
#API

url_bike2=("https://opendata.lillemetropole.fr/api/records/1.0/search/?dataset=vlille-realtime&q=&rows=500&facet=libelle&facet=nom&facet=commune&facet=etat&facet=type&facet=etatconnexion")

response2=requests.get(url_bike2)
response_json2=response2.json()
data=response_json2["records"]
Lille_stations= (len(data))

Lille_Area=34.8
Lille_Bike=Lille_stations/Lille_Area

#Grenoble
#WEB

Grenoble_Area=18.13
Grenoble_stations=18
Grenoble_Bike=Grenoble_stations/Grenoble_Area

#Hämeenlinna

Hameenlinna_Area=2032
Hameenlinna_stations=0
Hameenlinna_Bike=Hameenlinna_stations/Hameenlinna_Area

# Maynooth/Dublin
#API
url_bike3=("https://dublinbikes.staging.derilinx.com/api/v1/resources/stations")

response3=requests.get(url_bike3)
response_json3=response3.json()

Maynooth_stations= (len(response_json3))

Maynooth_Area=114.9
Maynooth_Bike=Maynooth_stations/Maynooth_Area

#Belfast
#CSV

os.chdir("/Users/javierbrionesgomez/Library/Mobile Documents/com~apple~CloudDocs/EDEM/07_DATAPROJECTS/DATA PROJECT 01/01_Datasets/Código/Directory")
Belfast_bike=pd.read_csv("BelfastBikeStations.csv", sep=",", decimal=".")
Belfast_stations=Belfast_bike["Location"].count()

Belfast_Area=115
Belfast_Bike=Belfast_stations/Belfast_Area

#Worcester
#WEB

Worcester_Area=33.28
Worcester_stations=3
Worcester_Bike=Worcester_stations/Worcester_Area

#Bristol
#API

url_bike4=("https://opendata.bristol.gov.uk/api/records/1.0/search/?dataset=public-bike-pumps&q=&rows=100")

response4=requests.get(url_bike4)
response_json4=response4.json()
data=response_json4["records"]
Bristol_stations= (len(data))

Bristol_Area=110
Bristol_Bike=Bristol_stations/Bristol_Area

#Herzliya/Tel Aviv
#WEB

Herzliya_Area=72.99
Herzliya_stations=178
Herzliya_Bike=Herzliya_stations/Herzliya_Area

#Orlando
#WEB

Orlando_Area=294.6
Orlando_stations=42
Orlando_Bike=Orlando_stations/Orlando_Area

#Daejeon
#WEB

Daejeon_Area=539.8
Daejeon_stations=262
Daejeon_Bike=Daejeon_stations/Daejeon_Area

#Concepcion

Concepcion_Area=221.6
Concepcion_stations=0
Concepcion_Bike=Concepcion_stations/Concepcion_Area

#Xiamen
#WEB

Xiamen_Area=1573
Xiamen_stations=359
Xiamen_Bike=Xiamen_stations/Xiamen_Area

#Monterrey

Monterrey_Area=894
Monterrey_stations=0
Monterrey_Bike=Monterrey_stations/Monterrey_Area

#Add new column

df_WakeTeam["Bikeshare_stations_km2"]= (
    Enschede_Bike,
    Hertogenbosch_Bike,
    Paris_Bike,
    Lille_Bike,
    Grenoble_Bike,
    Hameenlinna_Bike,
    Maynooth_Bike,
    Belfast_Bike,
    Worcester_Bike,
    Bristol_Bike,
    Herzliya_Bike,
    Orlando_Bike,
    Daejeon_Bike,
    Concepcion_Bike,
    Xiamen_Bike,
    Monterrey_Bike)

#VARIABLE 06: COST OF LIVING

os.chdir("/Users/javierbrionesgomez/Library/Mobile Documents/com~apple~CloudDocs/EDEM/07_DATAPROJECTS/DATA PROJECT 01/01_Datasets/Código/Directory")
COL_df=pd.read_csv("Cost_of_living.csv", sep=",", decimal=".")

#Cost of Living in Netherlands

#01_ENSCHEDE

#nearest city of Enschede= Utrecht
NL=COL_df.loc[:, "City"]=="Utrecht, Netherlands"
df_NL=COL_df.loc[NL]

CoL_Enschede=df_NL["Cost of Living Index"].mean()

#02_HERTOGENBOSCH

#nearest city of Hertogenbosch= Eindhoven
NL1=COL_df.loc[:, "City"]=="Eindhoven, Netherlands"
df_NL1=COL_df.loc[NL1]

CoL_Hertogenbosch=df_NL1["Cost of Living Index"].mean()

#Cost of Living in France

#03_PARIS

FR=COL_df.loc[:, "City"]=="Paris, France"
df_FR=COL_df.loc[FR]

CoL_Paris=df_FR["Cost of Living Index"].mean()

#04_LILLE

FR1=COL_df.loc[:, "City"]=="Lille, France"
df_FR1=COL_df.loc[FR1]

CoL_Lille=df_FR1["Cost of Living Index"].mean()

#05_GRENOBLE

FR2=COL_df.loc[:, "City"]=="Grenoble, France"
df_FR2=COL_df.loc[FR2]

CoL_Grenoble=df_FR2["Cost of Living Index"].mean()

#Cost of Living in Finland

#06_HAMEENLINNA
#nearest city of Hameenlinna= Tampere

FN=COL_df.loc[:, "City"]=="Tampere, Finland"
df_FN=COL_df.loc[FN]

CoL_Hameenlinna=df_FN["Cost of Living Index"].mean()

#Cost of Living in Ireland

#07_MAYNOOTH,DUBLIN
#nearest city of Maynooth= Dublin

IR=COL_df.loc[:, "City"]=="Dublin, Ireland"
df_IR=COL_df.loc[IR]

CoL_Maynooth=df_IR["Cost of Living Index"].mean()

#Cost of Living in United Kingdom

#08_BELFAST

UK=COL_df.loc[:, "City"]=="Belfast, United Kingdom"
df_UK=COL_df.loc[UK]

CoL_Belfast=df_UK["Cost of Living Index"].mean()

#09_WORCESTER
#nearest city of Worcester= Birmigham

UK1=COL_df.loc[:, "City"]=="Birmingham, United Kingdom"
df_UK1=COL_df.loc[UK1]

CoL_Worcester=df_UK1["Cost of Living Index"].mean()

#10_BRISTOL

UK2=COL_df.loc[:, "City"]=="Bristol, United Kingdom"
df_UK2=COL_df.loc[UK2]

CoL_Bristol=df_UK2["Cost of Living Index"].mean()

#Cost of Living in Israel

#11_HERZLIYA, TEL AVIV
#nearest city of Herzliya= Tel Aviv

IL=COL_df.loc[:, "City"]=="Tel Aviv-Yafo, Israel"
df_IL=COL_df.loc[IL]

CoL_Herzliya=df_IL["Cost of Living Index"].mean()

#Cost of Living in USA

#12_ORLANDO

OR=COL_df.loc[:, "City"]=="Orlando, FL, United States"
df_OR=COL_df.loc[OR]

CoL_Orlando=df_OR["Cost of Living Index"].mean()


#Cost of Living in Korea

#13_DAEJEON
#nearest city of Daejeon= Seoul

KR=COL_df.loc[:, "City"]=="Seoul, South Korea"
df_KR=COL_df.loc[KR]

CoL_Daejeon=df_KR["Cost of Living Index"].mean()

#Cost of Living in Chile

#14_CONCEPCIÓN
#nearest city of Concepción= Santiago

CL=COL_df.loc[:, "City"]=="Santiago, Chile"
df_CL=COL_df.loc[CL]

CoL_Concepcion=df_CL["Cost of Living Index"].mean()

#Cost of Living in China

#15_XIAMEN
#nearest city of Xiamen= Shenzhen

CH=COL_df.loc[:, "City"]=="Shenzhen, China"
df_CH=COL_df.loc[CH]

CoL_Xiamen=df_CH["Cost of Living Index"].mean()

#Cost of Living in Mexico

#15_MONTERREY

MX=COL_df.loc[:, "City"]=="Monterrey, Mexico"
df_MX=COL_df.loc[MX]

CoL_Monterrey=df_MX["Cost of Living Index"].mean()

########## SUMMARY ##########

#100 POINTS = 1100$/month --> 908,09 euros

#Value en $

CoL_Enschede=(CoL_Enschede*1100)/100
CoL_Hertogenbosch=(CoL_Hertogenbosch*1100)/100
CoL_Paris=(CoL_Paris*1100)/100
CoL_Lille=(CoL_Lille*1100)/100
CoL_Grenoble=(CoL_Grenoble*1100)/100
CoL_Hameenlinna=(CoL_Hameenlinna*1100)/100
CoL_Maynooth=(CoL_Maynooth*1100)/100
CoL_Belfast=(CoL_Belfast*1100)/100
CoL_Worcester=(CoL_Worcester*1100)/100
CoL_Bristol=(CoL_Bristol*1100)/100
CoL_Herzliya=(CoL_Herzliya*1100/100)
CoL_Orlando=(CoL_Orlando*1100)/100
CoL_Daejeon=(CoL_Daejeon*1100)/100
CoL_Concepcion=(CoL_Concepcion*1100)/100
CoL_Xiamen=(CoL_Xiamen*1100)/100
CoL_Monterrey=(CoL_Monterrey*1100)/100

#Add new column

df_WakeTeam["Cost_of_living"]= (
    CoL_Enschede,
    CoL_Hertogenbosch,
    CoL_Paris,
    CoL_Lille,
    CoL_Grenoble,
    CoL_Hameenlinna,
    CoL_Maynooth,
    CoL_Belfast,
    CoL_Worcester,
    CoL_Bristol,
    CoL_Herzliya,
    CoL_Orlando,
    CoL_Daejeon,
    CoL_Concepcion,
    CoL_Xiamen,
    CoL_Monterrey)

#07_VARIABLE 07_YOUTH UNEMPLOYMENT


#01_NETHERLANDS

url1=("http://api.worldbank.org/v2/country/nl/indicator/SL.UEM.1524.ZS?format=json&date=2019")

response1 = requests.get(url1)

response_json1=response1.json()
main=response_json1[1][0]
Netherlands_unemployment_rate=main["value"]
print(Netherlands_unemployment_rate)

#02_FRANCE

url2=("http://api.worldbank.org/v2/country/fr/indicator/SL.UEM.1524.ZS?format=json&date=2019")

response2 = requests.get(url2)

response_json2=response2.json()
main=response_json2[1][0]
France_unemployment_rate=main["value"]
print(France_unemployment_rate)

#03_FINLAND

url3=("http://api.worldbank.org/v2/country/fi/indicator/SL.UEM.1524.ZS?format=json&date=2019")

response3 = requests.get(url3)

response_json3=response3.json()
main=response_json3[1][0]
Finland_unemployment_rate=main["value"]
print(Finland_unemployment_rate)

#04_IRELAND

url4=("http://api.worldbank.org/v2/country/ie/indicator/SL.UEM.1524.ZS?format=json&date=2019")

response4 = requests.get(url4)

response_json4=response4.json()
main=response_json4[1][0]
Ireland_unemployment_rate=main["value"]
print(Ireland_unemployment_rate)

#05_UNITED KINGDOM

url5=("http://api.worldbank.org/v2/country/gbr/indicator/SL.UEM.1524.ZS?format=json&date=2019")

response5 = requests.get(url5)

response_json5=response5.json()
main=response_json5[1][0]
UK_unemployment_rate=main["value"]
print(UK_unemployment_rate)

#06_ISRAEL

url6=("http://api.worldbank.org/v2/country/isr/indicator/SL.UEM.1524.ZS?format=json&date=2019")

response6 = requests.get(url6)

response_json6=response6.json()
main=response_json6[1][0]
Israel_unemployment_rate=main["value"]
print(Israel_unemployment_rate)

#07_UNITED STATES

url7=("http://api.worldbank.org/v2/country/us/indicator/SL.UEM.1524.ZS?format=json&date=2019")

response7 = requests.get(url7)

response_json7=response7.json()
main=response_json7[1][0]
US_unemployment_rate=main["value"]
print(US_unemployment_rate)

#08_KOREA

url8=("http://api.worldbank.org/v2/country/kor/indicator/SL.UEM.1524.ZS?format=json&date=2019")

response8 = requests.get(url8)

response_json8=response8.json()
main=response_json8[1][0]
Korea_unemployment_rate=main["value"]
print(Korea_unemployment_rate)

#09_CHILE

url9=("http://api.worldbank.org/v2/country/chl/indicator/SL.UEM.1524.ZS?format=json&date=2019")

response9 = requests.get(url9)

response_json9=response9.json()
main=response_json9[1][0]
Chile_unemployment_rate=main["value"]
print(Chile_unemployment_rate)

#10_CHINA

url10=("http://api.worldbank.org/v2/country/chn/indicator/SL.UEM.1524.ZS?format=json&date=2019")

response10 = requests.get(url10)

response_json10=response10.json()
main=response_json10[1][0]
China_unemployment_rate=main["value"]
print(China_unemployment_rate)

#11_MEXICO

url11=("http://api.worldbank.org/v2/country/mx/indicator/SL.UEM.1524.ZS?format=json&date=2019")

response11 = requests.get(url11)

response_json11=response11.json()
main=response_json11[1][0]
Mexico_unemployment_rate=main["value"]
print(Mexico_unemployment_rate)

#Add new column

df_WakeTeam["Unemployment_rate"]= (
    Netherlands_unemployment_rate,
    Netherlands_unemployment_rate,
    France_unemployment_rate,
    France_unemployment_rate,
    France_unemployment_rate,
    Finland_unemployment_rate,
    Ireland_unemployment_rate,
    UK_unemployment_rate,
    UK_unemployment_rate,
    UK_unemployment_rate,
    Israel_unemployment_rate,
    US_unemployment_rate,
    Korea_unemployment_rate,
    Chile_unemployment_rate,
    China_unemployment_rate,
    Mexico_unemployment_rate)
    

################### SAVE TO CSV ###################

df_WakeTeam.to_csv("/Users/javierbrionesgomez/Desktop/df_WakeTeam_DP1.csv")    

    
