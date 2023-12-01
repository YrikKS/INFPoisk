from flask_login import UserMixin
from flask_sqlalchemy import SQLAlchemy
from werkzeug.security import generate_password_hash, check_password_hash

db = SQLAlchemy()


class UniversityModel(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    name = db.Column(db.String(100), unique=True)
    short_name = db.Column(db.String(50))
    date_creation = db.Column(db.Date)

    def __repr__(self):
        return f'<university_model {self.name}>'


class StudentModel(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    fio = db.Column(db.String(100))
    date_of_born = db.Column(db.Date)
    university_id = db.Column(db.Integer, db.ForeignKey('university_model.id'), nullable=True)
    university = db.relationship('UniversityModel', backref=db.backref('students'))
    date_of_receipt = db.Column(db.Date)

    def __repr__(self):
        return f'<student_model {self.fio}>'


class User(db.Model, UserMixin):
    id = db.Column(db.Integer, primary_key=True)
    name = db.Column(db.String(100), unique=True)
    password = db.Column(db.String(100))

    def check_password(self, password):
        return self.password == password

    def is_active(self):
        return True
