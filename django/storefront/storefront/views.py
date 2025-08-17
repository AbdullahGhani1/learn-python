from django.http import HttpResponse, HttpRequest
from django.shortcuts import render


def home(request: HttpRequest):
    return render(request, 'client/index.html')


def about(request: HttpRequest):
    return HttpResponse("Hello, world. You are at our brand About Page")
