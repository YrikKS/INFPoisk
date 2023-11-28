# Create your models here.
from django.db import models


class UniversityModel(models.Model):
    name = models.CharField(max_length=100, unique=True)
    short_name = models.CharField(max_length=50)
    date_creation = models.DateField()

    def __str__(self):
        return self.name


class StudentModel(models.Model):
    fio = models.CharField(max_length=100)
    date_of_born = models.DateField()
    university = models.ForeignKey(UniversityModel, on_delete=models.CASCADE, null=True)
    date_of_receipt = models.DateField()
