import secrets

from flask import Flask, render_template, redirect, request, url_for
from flask_login import LoginManager, login_user, login_required
from flask_migrate import Migrate

from forms.forms import UniversityForm, StudentForm, UserForm
from models.models import UniversityModel, db, StudentModel, User

secret_key = secrets.token_hex(16)
app = Flask(__name__)
app.secret_key = secret_key
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+pymysql://root:@127.0.0.1:3306/flask_info_poisk_2'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
db.init_app(app)
migrate = Migrate(app, db)

login_manager = LoginManager()
login_manager.login_view = 'auth.login'  # путь в Blueprint
login_manager.init_app(app)


@app.route('/')
@login_required
def hello_world():  # put application's code here
    return render_template('index.html')


@login_manager.user_loader
def load_user(user_id):
    return User.query.get(int(user_id))


@app.route('/login', methods=['GET', 'POST'])
def login():
    if request.method == 'POST':
        username = request.form['username']
        password = request.form['password']
        try:
            user = User.query.filter_by(name=username).first()
            if user.check_password(password):
                login_user(user)
                return redirect(url_for('hello_world'))
            else:
                return render_template('login.html', error='Неверное имя пользователя или пароль')
        except Exception as ex:
            print(ex)
            return render_template('login.html', error='Неверное имя пользователя или пароль', form=UserForm())
    return render_template('login.html', form=UserForm())


@app.route('/user/create', methods=['GET', 'POST'])
@login_required
def create_user():
    form = UserForm()
    if form.validate_on_submit():
        user = User(name=form.username.data, password=form.password.data)
        db.session.add(user)
        db.session.commit()
        return redirect(url_for('hello_world'))
    return render_template('create_user.html', form=form)


@app.route('/create_university/', methods=['GET', 'POST'])
@login_required
def create_university():
    form = UniversityForm()
    if form.validate_on_submit():
        university = UniversityModel(
            name=form.name.data,
            short_name=form.short_name.data,
            date_creation=form.date_creation.data
        )
        db.session.add(university)
        db.session.commit()
        return f'Created, {form.name.data}'
    return render_template('create_university.html', form=form)


@app.route('/create_student/', methods=['GET', 'POST'])
@login_required
def create_student():
    form = StudentForm()
    if form.validate_on_submit():
        university = UniversityModel.query.get(form.university.data)
        student = StudentModel(
            fio=form.fio.data,
            date_of_born=form.date_of_born.data,
            university=university,
            date_of_receipt=form.date_of_receipt.data,
        )
        db.session.add(student)
        db.session.commit()
        return f'Created, {form.fio.data}'
    return render_template('create_student.html', form=form)


@app.route('/student_list')
@login_required
def student_list():
    students = StudentModel.query.all()
    return render_template('student_list.html', students=students)


@app.route('/delete_student/<int:student_id>', methods=['POST'])
@login_required
def delete_student(student_id):
    student = StudentModel.query.get(student_id)
    db.session.delete(student)
    db.session.commit()
    return redirect('/student_list')


@app.route('/edit_student/<int:student_id>', methods=['GET', 'POST'])
@login_required
def edit_student(student_id):
    student = StudentModel.query.get(student_id)
    form = StudentForm(obj=student)

    if request.method == 'POST':
        form.populate_obj(student)
        db.session.commit()
        return redirect('/student_list')

    return render_template('edit_student.html', student=student, id=student_id, form=form)


@app.route('/university_list')
@login_required
def university_list():
    universities = UniversityModel.query.all()
    return render_template('university_list.html', universities=universities)


@app.route('/delete_university/<int:university_id>', methods=['POST'])
@login_required
def delete_university(university_id):
    university = UniversityModel.query.get(university_id)
    db.session.delete(university)
    db.session.commit()
    return redirect('/university_list')


@app.route('/edit_university/<int:university_id>', methods=['GET', 'POST'])
@login_required
def edit_university(university_id):
    university = UniversityModel.query.get(university_id)
    form = UniversityForm(obj=university)

    if request.method == 'POST':
        form.populate_obj(university)
        db.session.commit()
        return redirect('/university_list')

    return render_template('edit_university.html', university=university, id=university_id, form=form)


if __name__ == '__main__':
    app.run()
