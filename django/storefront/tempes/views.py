from .models import Posts
from django.shortcuts import render
from django.http import HttpRequest
from django.shortcuts import get_object_or_404

# Create your views here.


def all_temps(request: HttpRequest):
    posts = Posts.objects.all()
    return render(request, 'tempes/all_temps.html', {'posts': posts})


def post_detail(request: HttpRequest, post_id: int):
    post = get_object_or_404(Posts, pk=post_id)
    return render(request, 'tempes/post_detail.html', {'post': post})
