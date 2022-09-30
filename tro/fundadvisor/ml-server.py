#!/usr/bin/python

import pandas as pd
import numpy as np
# import seaborn as sns
import matplotlib
import matplotlib.pyplot as plt
from sklearn.linear_model import MultiTaskLassoCV
# %matplotlib inline
from sklearn.linear_model import RidgeCV
from sklearn.preprocessing import LabelEncoder
from flask import Flask, request, jsonify, render_template

#import xls file using pandas
df = pd.read_excel('data.xlsx')


#new df with first 13 and the last columns

df1 = df[['VSLA', 'Division', 'Location', 'Capacity', 'Average Age group',
       'Status', 'Activity', 'Male', 'Female', 'Year',
       'Savings', 'Shareouts', 'Loans Taken ', 'Loan Amount Returned ',
       'Beneficiary']]

#apply label encoder to categorical columns (VSLA, Division, Location, Status, Activity,'Beneficiary')
vsla_le = LabelEncoder()
df1['VSLA'] = vsla_le.fit_transform(df['VSLA'])
div_le = LabelEncoder()
df1['Division'] = div_le.fit_transform(df['Division'])
loc_le = LabelEncoder()
df1['Location'] = loc_le.fit_transform(df['Location'])
status_le = LabelEncoder()
df1['Status'] = status_le.fit_transform(df['Status'])
act_le = LabelEncoder()
df1['Activity'] = act_le.fit_transform(df['Activity'])
# meet_le = LabelEncoder()
# df1['Meeting Schedule'] = meet_le.fit_transform(df['Meeting Schedule'])
ben_le = LabelEncoder()
df1['Beneficiary'] = ben_le.fit_transform(df['Beneficiary'])


#split the data into X and y for beneficialies
ben_X = df1[['VSLA', 'Division', 'Location', 'Capacity', 'Average Age group',
       'Status', 'Activity', 'Male', 'Female' 'Year',
       'Savings','Shareouts', 'Loans Taken ', 'Loan Amount Returned ']]
ben_y = df1[['Beneficiary']]

#split the data into ret_X and ret_y for returned loans
ret_X = df1[['VSLA', 'Division', 'Location', 'Capacity', 'Average Age group',
       'Status', 'Activity', 'Male', 'Female', 'Year',
       'Savings', 'Loans Taken ']]
ret_y = df1[['Loan Amount Returned ']]

#split the data into tak_X and tak_y for loans taken
tak_X = df1[['VSLA', 'Division', 'Location', 'Capacity', 'Average Age group',
       'Status', 'Activity', 'Male', 'Female', 'Year',
       'Savings']]
tak_y = df1[['Loans Taken ']]

#Find determinant columns
# reg = MultiTaskLassoCV()
# reg.fit(X,y)
# print("Best alpha using built-in MultiTaskLassoCV: %f" % reg.alpha_)
# print("Best score using built-in MultiTaskLassoCV: %f" %reg.score(X,y))

# # Taking any random row from the coefficients array  row (7)
# coef1 = pd.Series(reg.coef_[0], index = X.columns)
# matplotlib.rcParams['figure.figsize'] = (8.0, 10.0)
# coef1.plot(kind = "barh")
# plt.title("Feature importance using MultiTaskLasso Model")
# plt.show()


from sklearn.multioutput import MultiOutputRegressor
from sklearn.ensemble import GradientBoostingRegressor
from sklearn.metrics import mean_squared_error
from sklearn.model_selection import train_test_split

#split dataset into test and training data
ben_xtrain, ben_xtest, ben_ytrain, ben_ytest=train_test_split(ben_X, ben_y, test_size=0.10)
ret_xtrain, ret_xtest, ret_ytrain, ret_ytest=train_test_split(ret_X, ret_y, test_size=0.10)
tak_xtrain, tak_xtest, tak_ytrain, tak_ytest=train_test_split(tak_X, tak_y, test_size=0.10)


#Creating a MultiRegression Ensemble (GradientBoostingRegressor) MODELS
#training the model
gbr = GradientBoostingRegressor()
ben_model = MultiOutputRegressor(estimator=gbr).fit(ben_xtrain,ben_ytrain)
ret_model = MultiOutputRegressor(estimator=gbr).fit(ret_xtrain,ret_ytrain)
tak_model = MultiOutputRegressor(estimator=gbr).fit(tak_xtrain,tak_ytrain)


#set up flask
app = Flask(__name__)

@app.route('/')
def home():
    return  'ML prediction api' 

#predict beneficiary
@app.route('/predict-beneficiary',methods=['GET'])
def predict_beneficiary():
    #Convert query parameters to a df
    query_df = pd.DataFrame(request.args, index=[0])
    #Apply the label encoder to the query df
    query_df['VSLA'] = vsla_le.transform(query_df['VSLA'])
    query_df['Division'] = div_le.transform(query_df['Division'])
    query_df['Location'] = loc_le.transform(query_df['Location'])
    query_df['Status'] = status_le.transform(query_df['Status'])
    query_df['Activity'] = act_le.transform(query_df['Activity'])
    # query_df['Meeting Schedule'] = meet_le.transform(query_df['Meeting Schedule'])
    prediction = ben_model.predict(query_df)
    return jsonify({'prediction': prediction[0].tolist()})

#predict loans to be taken
@app.route('/loans-taken',methods=['GET'])
def predict_loans():
    #Convert query parameters to a df
    query_df = pd.DataFrame(request.args, index=[0])
    #Apply the label encoder to the query df
    query_df['VSLA'] = vsla_le.transform(query_df['VSLA'])
    query_df['Division'] = div_le.transform(query_df['Division'])
    query_df['Location'] = loc_le.transform(query_df['Location'])
    query_df['Status'] = status_le.transform(query_df['Status'])
    query_df['Activity'] = act_le.transform(query_df['Activity'])
    # query_df['Meeting Schedule'] = meet_le.transform(query_df['Meeting Schedule'])
    prediction = tak_model.predict(query_df)
    return jsonify({'prediction': prediction[0].tolist()})


#predict loan amount to be returned
@app.route('/loans-returned',methods=['GET'])
def predict_loan_amount():
    #Convert query parameters to a df
    query_df = pd.DataFrame(request.args, index=[0])
    #Apply the label encoder to the query df
    query_df['VSLA'] = vsla_le.transform(query_df['VSLA'])
    query_df['Division'] = div_le.transform(query_df['Division'])
    query_df['Location'] = loc_le.transform(query_df['Location'])
    query_df['Status'] = status_le.transform(query_df['Status'])
    query_df['Activity'] = act_le.transform(query_df['Activity'])
    # query_df['Meeting Schedule'] = meet_le.transform(query_df['Meeting Schedule'])
    prediction = ret_model.predict(query_df)
    return jsonify({'prediction': prediction[0].tolist()})

#predict savings
@app.route('/predict-savings',methods=['GET'])
def predict_savings():
    pass

#predict shareouts
@app.route('/predict-shareouts',methods=['GET'])
def predict_shareouts():
    pass

if __name__ == "__main__":
    app.run(debug=True, host='0.0.0.0')
