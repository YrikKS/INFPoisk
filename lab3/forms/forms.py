from flask import Flask, render_template
from flask_wtf import FlaskForm
from wtforms import DateField, SubmitField, StringField, SelectField, PasswordField
# from wtforms.fields.html5 import DateField
from wtforms.validators import DataRequired, Length, EqualTo

from models.models import UniversityModel


class UniversityForm(FlaskForm):
    name = StringField(label='Название университета', validators=[DataRequired()])
    short_name = StringField(label='Короткое название университета', validators=[DataRequired()])
    date_creation = DateField(
        label='Дата создания',
        # widget=widgets.DateInput(attrs={'type': 'date'})
    )
    submit = SubmitField("Submit")


class StudentForm(FlaskForm):
    fio = StringField(label="ФИО студента")
    date_of_born = DateField(
        label='Дата рождения',
    )

    university = SelectField(
        label='Выберите университет',
        validators=[DataRequired()],
        coerce=int
    )

    date_of_receipt = DateField(label='Дата поступления', validators=[DataRequired()])
    submit = SubmitField("Submit")

    def __init__(self, *args, **kwargs):
        super(StudentForm, self).__init__(*args, **kwargs)
        self.university.choices = [(university.id, university.name) for university in UniversityModel.query.all()]


class UserForm(FlaskForm):
    username = StringField('Имя пользователя', validators=[DataRequired(), Length(min=2, max=50)])
    password = PasswordField('Пароль', validators=[DataRequired(), Length(min=6)])
    confirm_password = PasswordField('Подтвердите пароль', validators=[DataRequired(), EqualTo('password')])
    submit = SubmitField('Сохранить')
