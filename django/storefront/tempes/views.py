from django.shortcuts import render

# Create your views here.


def all_temps(request):
    return render(request, 'tempes/all_temps.html')
