FROM python:3.7-buster

ADD . /app
WORKDIR /app
RUN pip install --no-cache-dir -r requirements.txt
ENV TERM xterm
CMD [ "python", "app.py" ]