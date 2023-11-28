from django.contrib import admin

# Register your models here.
from university.models import StudentModel, UniversityModel


class StudentAdmin(admin.ModelAdmin):
    # Данная переменная указывает на поля, которые будут выводится в списке продуктов
    list_display = ('fio', 'date_of_born', 'university', 'date_of_receipt')


admin.site.register(StudentModel, StudentAdmin)


class UniversityAdmin(admin.ModelAdmin):
    # Данная переменная указывает на поля, которые будут выводится в списке продуктов
    list_display = ('name', 'short_name', 'date_creation',)


admin.site.register(UniversityModel, UniversityAdmin)
