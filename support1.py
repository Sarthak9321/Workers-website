import smtplib
import sys

email = sys.argv[1]
workername = sys.argv[2]
pos = sys.argv[3]
name = sys.argv[4]
no = sys.argv[5]
  # Sender's email address and password
sender_email = "dailyjbsnow@gmail.com"
sender_password = "atcaayzwpzlacozc"
  
  # Subject of the email
subject = "Hi you Have been hired"

  # Message body
message = "Dear "+workername+",\n\n"
message += "We are writing to inform you that you have been selected for a position as a "+pos+" ."
message += " Your hiring has been confirmed by "+name+" for the job assignment."
message += " If you have any questions or require further assistance, please do not hesitate to contact "+name+" at "+no+".\n\n"
message += "Thank you for choosing DailyJobsNow for your job placement.\n\n"
message += "Best regards,\n"
message += "The DailyJobsNow Team\n"
message += "Creators Mayank Lad, Sarthak Gaikwad, Parth Sase, Aryaman Jain \n"
message += " TE CMPN-B."

with smtplib.SMTP("smtp.gmail.com", 587) as smtp:
    # Start a TLS connection
  smtp.starttls()

    # Login to the SMTP server
  smtp.login(sender_email, sender_password)

    # Send the email
  smtp.sendmail(sender_email,email, f"Subject:{subject}\n\n{message}")
