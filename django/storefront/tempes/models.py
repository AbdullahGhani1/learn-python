from __future__ import annotations
from datetime import datetime
from django.db import models
from typing import TYPE_CHECKING
from django.utils import timezone
# Create your models here.


if TYPE_CHECKING:
    from django.db.models import CharField, DateTimeField, ImageField, TextField


class Posts(models.Model):
    PROGRAMMING_LANG_CHOICE = [
        ('PY', 'PYTHON'),
        ('JS', 'JAVA SCRIPT'),
        ('C#', 'C SHARP'),
        ('TS', 'TYPE SCRIPT'),
    ]
    title: CharField[str, str]
    image: ImageField
    date_added: DateTimeField[datetime, datetime]
    type: CharField[str, str]
    description: TextField[str, str]

    title = models.CharField(max_length=100)
    image = models.ImageField(upload_to='temps/')
    date_added = models.DateTimeField(default=timezone.now)
    type = models.CharField(max_length=2, choices=PROGRAMMING_LANG_CHOICE)
    description = models.TextField(default='')

    def __str__(self) -> str:
        return self.title
