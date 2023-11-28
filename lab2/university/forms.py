from django import forms
from django.forms import widgets

from .models import UniversityModel


class UniversityForm(forms.Form):
    name = forms.CharField(label='Название университета')
    short_name = forms.CharField(label='Короткое название университета')
    date_creation = forms.DateField(
        label='Дата создания',
        widget=widgets.DateInput(attrs={'type': 'date'})
    )


class StudentForm(forms.Form):
    fio = forms.CharField(label="ФИО студента")
    date_of_born = forms.DateField(
        label='Дата рождения',
        widget=widgets.DateInput(attrs={'type': 'date'})
    )

    university = forms.ModelChoiceField(
        queryset=UniversityModel.objects.all(),
        label='Выберите университет',
        to_field_name='name'
    )

    date_of_receipt = forms.DateField(
        label='Дата поступления',
        widget=widgets.DateInput(attrs={'type': 'date'})
    )
