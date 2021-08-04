#!C:/Users/iatrade/AppData/Local/Programs/Python/Python38/python.exe

import os
import urllib.parse 
import streamlit as st
import numpy as np
import pandas as pd
import fsspec
#from sklearn.ensemble import RandomForestClassifier
from fsspec.registry import known_implementations
from pickle import load

sent_query = os.environ['QUERY_STRING']

model = load(open('mods.pkl', 'rb'))

def pred(df):
    dff = pd.DataFrame(df, index = [0] )
    # PREDICTION
    #model = RandomForestClassifier(criterion = "entropy", n_estimators = 100, max_depth = 10,  random_state = 5)
    prediction = model.predict(dff)
    return prediction

#st.write("prediction")







