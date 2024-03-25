Technical Assessment

1. Suppose we have to take an examination which consists of physics and
chemistry sections. Given we have a set of objective questions for physics and
chemistry subjects in the database along with its answer options and the
respective correct answer. Create an application to handle the following.
a. Create a form to generate a questionnaire. The questionnaire form should
contain title, expiry date and a Generate button. On clicking the generate
button, a questionnaire should be created with the given title, expiry date
along with 5 random questions from physics and 5 random questions
from chemistry.
b. Show the list of active questionnaires (Not expired from expiry date in
a).
c. For each questionnaire, an invitation could be sent to all the students in
the database via email. During this process a unique url should be sent for
each of the students to access the questionnaire.
d. The students should be able to use the url in the email to access the
questionnaire and submit their responses.
Use of any of Symfony/ Laravel/ Core framework
Additional Information
- The questions for both physics and chemistry along with their options and the
correct answer can be seeded into the database. (We are not interested in UI for
creating these questions).
- The admin account and student accounts can be seeded into the database. For
students only email and name would be sufficient. (Do not overdo it with a lot of
fields like address, phone number ....)
- In the frontend the students can fill up the answers and submit it to save it in the
database. You are not required to display who completed the questionnaire or
any other overview. Just saving the responses in the database would do.
