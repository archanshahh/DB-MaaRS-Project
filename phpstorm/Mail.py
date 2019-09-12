import smtplib
import email.utils
from email.mime.base import MIMEBase
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText

from email import encoders
import sys

count = 1
try:
    filename = sys.argv[1]
    mailid = sys.argv[2]
    msg = MIMEMultipart()
    server = smtplib.SMTP('smtp.gmail.com', 587)
    server.ehlo()
    server.starttls()
    server.login("ranchoshah2018@gmail.com", "schollofcomputerstudies")
    msg['Subject'] = "DB-MaaRS"
    msg.attach(MIMEText("Here is your PDF of Mutations"))
    part = MIMEBase('application', "octet-stream")
    part.set_payload(open(filename, "rb").read())
    encoders.encode_base64(part)
    part.add_header('Content-Disposition', 'attachment; filename="file.pdf"')
    msg.attach(part)
    # The n separates the message from the headers
    server.sendmail("Rancho", mailid, msg.as_string())
    server.close()
except:
     print ('Something went wrong...')