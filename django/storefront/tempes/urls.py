from django.urls import path
from . import views

urlpatterns = [
    path('', views.all_temps, name='all_temps'),
    path('<int:post_id>/', views.post_detail, name='post_detail')
]
