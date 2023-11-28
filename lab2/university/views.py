from django.shortcuts import render, redirect
from django.template.response import TemplateResponse
from university.forms import UniversityForm, StudentForm
from university.models import UniversityModel, StudentModel


def index(request):
    return TemplateResponse(request, "index.html")


def create_university(request):
    if request.method == 'POST':
        form = UniversityForm(request.POST)
        if form.is_valid():
            name = form.cleaned_data['name']
            short_name = form.cleaned_data['short_name']
            date_creation = form.cleaned_data['date_creation']

            try:
                university = UniversityModel(name=name, short_name=short_name, date_creation=date_creation)
                university.save()
            except Exception as e:
                return render(request, 'model_not_created.html')

            return render(request, 'model_created.html')
    else:
        form = UniversityForm()

    return render(request, 'create_university.html', {'form': form})


def university_list(request):
    universities = UniversityModel.objects.all()
    return render(request, 'university_list.html', {'universities': universities})


def delete_university(request, university_id):
    university = UniversityModel.objects.get(id=university_id)
    university.delete()
    return redirect('university_list')


def edit_university(request, university_id):
    university = UniversityModel.objects.get(id=university_id)

    if request.method == 'POST':
        university.name = request.POST['name']
        university.short_name = request.POST['short_name']
        university.date_creation = request.POST['date_creation']
        university.save()
        return redirect('university_list')

    university_form = UniversityForm(
        initial={
            'name': university.name,
            'short_name': university.short_name,
            'date_creation': university.date_creation,
        })

    return render(request, 'edit_university.html', {'university': university_form, 'id': university.id})


def create_student(request):
    if request.method == 'POST':
        form = StudentForm(request.POST)
        if form.is_valid():
            fio = form.cleaned_data['fio']
            date_of_born = form.cleaned_data['date_of_born']
            university = form.cleaned_data['university']
            date_of_receipt = form.cleaned_data['date_of_receipt']

            student = StudentModel(fio=fio,
                                   date_of_born=date_of_born,
                                   university=university,
                                   date_of_receipt=date_of_receipt)
            student.save()

            return render(request, 'model_created.html')
    else:
        form = StudentForm()

    return render(request, 'create_student.html', {'form': form})


def student_list(request):
    students = StudentModel.objects.all()
    return render(request, 'student_list.html', {'students': students})


def delete_student(request, student_id):
    student = StudentModel.objects.get(id=student_id)
    student.delete()
    return redirect('student_list')


def edit_student(request, student_id):
    student = StudentModel.objects.get(id=student_id)

    if request.method == 'POST':
        student.fio = request.POST['fio']
        student.date_of_born = request.POST['date_of_born']
        student.university = UniversityModel.objects.get(name=request.POST['university'])
        student.date_of_receipt = request.POST['date_of_receipt']
        student.save()
        return redirect('student_list')

    student_form = StudentForm(
        initial={
            'fio': student.fio,
            'date_of_born': student.date_of_born,
            'university': student.university,
            'date_of_receipt': student.date_of_receipt,
        })

    return render(request, 'edit_student.html', {'student': student_form, 'id': student.id})
