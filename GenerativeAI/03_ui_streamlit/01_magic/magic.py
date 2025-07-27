# Draw a title and some text to the app:
'''
# This is the document title

This is some _markdown_.
'''
import numpy as np
import pandas as pd
import streamlit as st
import matplotlib.pyplot as plt

df: pd.DataFrame = pd.DataFrame({'col1': [1, 2, 3], 'col2': list('abc')})
df  # 👈 Draw the dataframe


x: int = 100

'x', x  # 👈 Draw the string 'x' and then the value of x

# Also works with most supported chart types

arr = np.random.normal(1, 1, size=100)
fig, ax = plt.subplots()
ax.hist(arr, bins=30)

fig  # 👈 Draw a Matplotlib chart

'# Pakistan zinda bad'

# hello world
'''
# This is the document title

This is some _markdown_.
'''
