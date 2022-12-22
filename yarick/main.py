import inspect
import os
import sqlite3
import sys

import flask
from flask import request
from flask import Flask, make_response

app = Flask(__name__)
app.config['CORS_HEADERS'] = 'Content-Type'


class Database:

    def __init__(self):
        BASE_DIR = os.path.dirname(os.path.abspath(__file__))
        db_path = os.path.join(BASE_DIR, "database.sqlite")

        self.conn = sqlite3.connect(db_path)
        self.cursor = self.conn.cursor()

    def execute(self, command):
        self.cursor.execute(command)
        self.conn.commit()

    def fetch(self, command):
        self.cursor.execute(command)
        it = self.cursor.fetchall()
        if len(it) == 0:
            self.cursor.execute(command)
            return self.cursor.fetchone()
        return it


@app.route("/getrequests", methods=["GET"])
def get_vacancy():
    database = Database()
    data = database.fetch("select * from requests")
    if data is None:
        return make_response("Нет запросов!", 200)

    html_code = ""
    print(data)
    for d in data:
        html_code = html_code + f"""
<div>
<h3>Запрос:</h3>
Компания:
<p>{d[0]}</p>
Имя:
<p>{d[1]}</p>
Телефон:
<p>{d[2]}</p>
Email:
<p>{d[3]}</p>
</div><br><br>"""
    return make_response(html_code, 200)


@app.route("/request", methods=["post"])
def create_vacancy():
    database = Database()
    request_dict = request.form.to_dict()
    print(request_dict)
    values = list(request_dict.values())
    database.cursor.execute(f"insert into requests values (?, ?, ?, ?)", (values[0], values[1], values[2], values[3]))
    database.conn.commit()
    return make_response("Ваш запрос был отправлен!", 200)


if __name__ == '__main__':
    app.run(host="0.0.0.0", port=30000)
