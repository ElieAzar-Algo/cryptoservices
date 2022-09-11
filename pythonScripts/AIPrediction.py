#!pip install mplfinance
#install pacjages using pip

import json
import requests
from keras.models import Sequential
from keras.utils.vis_utils import plot_model
from keras.layers import Activation, Dense, Dropout, LSTM
import numpy as np
import pandas as pd
import math
from sklearn.preprocessing import MinMaxScaler
#import mplfinance as mpf
import plotly.graph_objects as go

print('\033[1m'+"while you are waiting the code to finish loading \nwhat do you think the price will be after 1 hour...? Elie Azar"+ '\033[0m')

###################################################
####     Fetching Data and Adding to Pandas    ####
###################################################
endpoint = 'https://min-api.cryptocompare.com/data/histohour'
res = requests.get(endpoint + '?fsym=BTC&tsym=USD&limit=1000')
hist = pd.DataFrame(json.loads(res.content)['Data'])
hist = hist.set_index('time')
hist.index = pd.to_datetime(hist.index, unit='s')

hist.tail(1)

#######################################################
####     Splitting the Data into Train and Test    ####
#######################################################

data = hist.filter(['close'])
dataset = data.values
length = math.ceil( len(dataset) *.8)

#Scale the all of the data to be values between 0 and 1 
scaler = MinMaxScaler(feature_range=(0, 1)) 
scaled_data = scaler.fit_transform(dataset)
train_data = scaled_data[0:length  , : ]

x_train=[]
y_train = []
for i in range(60,len(train_data)):
    x_train.append(train_data[i-60:i,0])
    y_train.append(train_data[i,0])

x_train, y_train = np.array(x_train), np.array(y_train)
x_train = np.reshape(x_train, (x_train.shape[0],x_train.shape[1],1))


####################################
####     Training LSTM Model    ####
####################################

model = Sequential()
model.add(LSTM(100, input_shape =(x_train.shape[1],1)))
model.add(Dropout(0.5))
model.add(Dense(units=1))
model.add(Activation('linear'))
model.compile(loss='mse', optimizer='adam')

model.fit(x_train, y_train, epochs=20, batch_size=32, verbose=1)


#######################################
####     Testing on Latest Data    ####
#######################################

endpoint = 'https://min-api.cryptocompare.com/data/histohour'
res = requests.get(endpoint + '?fsym=BTC&tsym=USD&limit=60')
latest = pd.DataFrame(json.loads(res.content)['Data'])
latest = latest.set_index('time')
latest.index = pd.to_datetime(latest.index, unit='s')

data = latest.filter(['close'])
latest_values = data[-60:].values

latest_scaled = scaler.transform(latest_values)
X_test = []
X_test.append(latest_scaled)
X_test = np.array(X_test)
X_test = np.reshape(X_test, (X_test.shape[0], X_test.shape[1], 1))#Get the predicted scaled price
pred_price = model.predict(X_test)#undo the scaling 
pred_price = scaler.inverse_transform(pred_price)

############################################################
####     Showing Last 60 Entries in Candlestick Chart   ####
############################################################

cropped = latest
candlestick = go.Candlestick(x=cropped.index, open=cropped['open'], high=cropped['high'], low=cropped['low'], close=cropped['close'])
fig = go.Figure(data=[candlestick])
fig.show()


print(str(pred_price[0][0]))