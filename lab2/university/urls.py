from django.urls import path

from university import views

urlpatterns = [
    path('', views.index, name="home"),
    path('create_university', views.create_university, name="create_university"),
    path('create_student', views.create_student, name="create_student"),

    path('university_list', views.university_list, name='university_list'),
    path('university/delete/<int:university_id>/', views.delete_university, name='delete_university'),
    path('university/edit/<int:university_id>/', views.edit_university, name='edit_university'),

    path('student_list', views.student_list, name='student_list'),
    path('student/delete/<int:student_id>/', views.delete_student, name='delete_student'),
    path('student/edit/<int:student_id>/', views.edit_student, name='edit_student'),
]
