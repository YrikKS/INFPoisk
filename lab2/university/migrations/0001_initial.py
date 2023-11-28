# Generated by Django 4.2.7 on 2023-11-27 15:39

from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='UniversityModel',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=100)),
                ('short_name', models.CharField(max_length=50)),
                ('date_creation', models.DateField()),
            ],
        ),
        migrations.CreateModel(
            name='StudentModel',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('fio', models.CharField(max_length=100)),
                ('date_of_born', models.DateField()),
                ('date_of_receipt', models.DateField()),
                ('university', models.ForeignKey(null=True, on_delete=django.db.models.deletion.CASCADE, to='university.universitymodel')),
            ],
        ),
    ]
