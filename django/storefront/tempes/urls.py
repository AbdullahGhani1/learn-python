from django.urls import path
from . import views

urlpatterns = [
    path('', views.all_temps, name='all_temps')
]
