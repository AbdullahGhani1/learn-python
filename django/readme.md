# 01 Installing Python (optional for Mac users)

An Apple Mac, by default, comes with Python version 2.7 installed. You can verify this by opening up a terminal and running the following command:

```sh
python --version
```

To follow and complete the lessons in this course, you will need Python 3. 
Before you can install Python, you will need to install a few dependencies. These are Xcode and brew. You will find details of these in the Required Dependencies reading. The Mac has various ways to carry out software installations, the most common way is to use the package manager called brew to handle the installs. Make sure you have Homebrew installed on your local machine.
Once the dependencies are installed, you can begin to install Python. Run the following command:

```sh
brew install python
```

To reduce confusion, you need to set the paths to point to the brew install of python3.
First, let's figure out where the package manager brew installed it. Run the following command:

```sh
brew info python3
```

The section you may be interested in is where it was installed.

Unversionedsymlinks `python`, `python-config`, `pip` etc. pointing to `python3`, `python3-config`, `pip3` etc., respectively, have been installed into /opt/homebrew/opt/python@3.10/libexec/bin 
The /opt/homebrew/opt/python@3.x/libexec/bin is the one you want to use and set for our path. Copy it from the terminal. The following steps may vary depending on the Mac OS you are running.

### Zsh

```sh
vim ~/.zshrc
```

Vim is a text editor that allows you to change files directly from the shell. To make the edits:

1. Press the I key on your keyboard.
2. Add the following line and remember to replace 3.x with the python version that was installed on your system:

➡️ shell PATH="/opt/homebrew/opt/python@3.x/libexec/bin:${PATH}" OR

```sh
export PATH="/opt/homebrew/opt/python@3.x/libexec/bin:${PATH}
```

1. Press the esc button to exit from insert mode.
2. Hold down the Shift Key and press the colon button represented by &;
3. Type wq! and then press the Enter key to exit vim.
4. Run the following command:
5. Zshshell: `source ~/.zshrc`
6. Bashshell: `source ~/.bashrc`
7. To verify everything is working as you would expect, run the following command: shell python --version Python 3.9.10
8. You should see the output similar to the above, depending on your install version.
   The list of commands relevant to vim can be found in the Course Introduction’s Additional Resources for this Lesson.
   On completion of this reading, you will be able to identify any required dependencies for your operating system.
   Setting up Python on Windows is straightforward and will install without any required dependencies. On Mac, however, you do need some additional dependencies prior to installing Python.

---

# 02 PYTHON Env.

Python’s virtual environment is set-up with the help of a built-in module named venv. For example:

` python -m venv <env name>`

➡️ `python3 -m pip install --user --upgrade pip`

Python uses venv as the preferred module to create and manage virtual environments. venv is also included in the Python standard library and does not require any additional installation.
venv

➡️ `python3 -m pip install --user virtualenv`

You can create a virtual environment in the specific project directory by running a command:

➡️ `python3 -m venv env`

Activate the virtual environment
Next you need to activate the virtual environment. You will put the virtual environment-specific python and pip executables into your shell’s PATH.
You can do this by running a command such as:

➡️ `source env/bin/activate`

Exit the virtual environment
You can exit the virtual environment by running the command:

➡️ `deactivate`

Note:
venv is not the only option available for creating virtual environments and other options exist such as pipenv which is another variation.
However, in this course, the use of venv is recommended.

# 03 Working with labs in this course

To run and view your Django app in the browser, execute the following command in terminal. (Verify you are in the directory where manage.py file resides.)

```sh
python3 manage.py runserver # To run the server
python3 manage.py makemigrations # To compile the migrations
python3 manage.py migrate # To migrate the changes in Database
```

### Additional resources

The following resources will be helpful as additional references when dealing with different concepts related to the topics you have covered in this course introduction.

Since this is a course exclusively about an open-source framework, there will also be a wide-scale reference to the official Django website and documentation.

Access the links below to explore more about Django.  
[Django Website](https://www.djangoproject.com/start/overview/).  
[Django Docs](https://docs.djangoproject.com/en/4.1/).  
[Vs Code installation](https://code.visualstudio.com/docs/setup/mac).  
[Django installation](https://docs.djangoproject.com/en/4.1/topics/install/).  
[Python virtual Environment](https://docs.python.org/3/library/venv.html).

---

# 05 Django Project

## What is a project?

When you set out to build a modular, extensible and scalable web application, you need an arrangement that controls the standard features of its various sub-modules.
A Django project is a Python package containing the database configuration used by various sub-modules (Django calls them apps) and other Django-specific settings.

Use the startproject command of Django-admin as follows:

```sh
django-admin startproject demoproject
```

The startproject is Django’s default project template. It creates the following file structure in the Python environment:

```powershell
C:\djenv\demoproject
│ manage.py
│
└───demoproject
asgi.py
settings.py
urls.py
wsgi.py
**init**.py
```

You can see a folder named demoproject is created in the Python environment folder. 
It contains a script  manage.py and another folder of the same name. 
You will learn more about the files in the inner folder later.
The manage.py script inside the outer demoproject has the same role as the django-admin utility. 
You can use it to perform various administrative tasks. In that sense, it is a local copy of the django-admin utility.

### manage.py

As mentioned above, the manage.py script can perform everything that the django-admin utility does. However, using manage.py is more straightforward, especially if you are required to work on a single project.
If you have multiple projects, use django-adminand specify the settings. 
The general usage of manage.py is as follows: 
python manage.py <command>
Let's explore some of the required command options:
startapp
As mentioned above, a Django project folder can contain one or more apps. An app is also represented by a folder of a specific file system. The command to create an app is: 
python manage.py startapp <name of app>
You will explore the structure of an app later.

### makemigrations

Django manages the database operations with the ORM technique. Migration refers to generating a database table whose structure matches the data model declared in the app.
The following command should be run whenever a new model is declared

```sh
python manage.py makemigrations
```

migrate
This command option of manage.py synchronizes the database state with the currently declared models and migrations.

```sh
python manage.py migrate
```

### runserver

This command starts Django’s built-in development server on the local machine with IP address 127.0.0.1 and port 8000.

```sh
python manage.py runserver
```

It helps if you don't use this development server in the production environment.

### Shell

This command opens up an interactive Python shell inside the project. This is useful when you are required to perform some quick interactive operations.

```sh
python manage.py shell
```

Django prefers IPython if it is installed over the standard Python shell.

### Project package

The startproject command option of the Django-admin utility creates the folder of the given name, inside which there is another folder of the same name. For example, the command:

```sh
django-admin startproject demoproject
```

This creates a demoproject folder, inside which there’s another demoproject folder.
The inner folder is a Python package. For a folder to be recognized by Python as a package, it must have a file **init**.py. In addition, the startproject template places four more files in the package folder.

### settings.py

Django configures specific parameters with their default values and puts them in this file.
The django-admin utility and manage.py script use these settings while performing various administrative tasks.

### urls.py

This script contains a list of object urlpatterns. Every time the client browser requests a URL, the Django server looks to match its pattern and routes the application to the mapped view.
The default structure of urls.py contains a view mapped to the project’s Admin site.

```python
from django.contrib import admin
from django.urls import path

urlpatterns = [
path('admin/', admin.site.urls),
]
```

### asgi.py

This file is used by the application servers following the ASGI standard to serve asynchronous web applications.

### wsgi.py

Many web application servers implement the WSGI standard. This script is the entry point for such WSGI-compatible servers to serve your classical web application.

### settings.py

This file defines the attributes that influence the function of a Django application. The startproject template assigns some default values to these attributes. They may be modified as per requirement during the use of the application.
Let us explain some critical settings.

#### INSTALLED_APPS

This is a list of strings. Each string represents the path of an app inside the parent project folder. The startproject template installs some apps by default. They appear in the INSTALLED_APPS list.

```py
INSTALLED_APPS = [
'django.contrib.admin',
'django.contrib.auth',
'django.contrib.contenttypes',
'django.contrib.sessions',
'django.contrib.messages',
'django.contrib.staticfiles',
]
```

This list must be updated by adding its name whenever a new app is installed.
For example, if we create a demoapp with the following command:

```sh
python manage.py startapp demoapp
```

Then, add the 'demoapp' string inside the INSTALLED_APP list.

### Databases

This attribute is a dictionary that specifies the configuration of one or more databases to be used by the current Django application. By default, Django uses the SQLite database. Hence, this setting has a pre-defined configuration for it.

```py
DATABASES = {
'default': {
'ENGINE': 'django.db.backends.sqlite3',
'NAME': BASE_DIR / 'db.sqlite3',
}
}
```

The default name of the SQLite database is db.sqlite3, which is created in the parent project folder.
In place of SQLite, you may choose to use any other. For example, for MySQL, the database settings could be as follows:

```py
DATABASES = {
'default': {
'ENGINE': 'django.db.backends.mysql',
'NAME': 'djangotest',
'USER': 'root',
'PASSWORD': 'password',
'HOST': '127.0.0.1',
'PORT': '3306',
}
}
```

Note here the default port number for MySQL is 3306 as against the default port number 8000 used with SQLite in Django.
DEBUG = True
By default, the development server runs in debug mode. This helps develop the application as the server picks up changes in the code and the output can be refreshed without restarting. However, it must be disabled in the production environment.

### ALLOWED HOSTS

This attribute is a list of strings. By default, it is empty. Each string represents the fully qualified host/domain where this Django site can be served. For example, to make the site running on localhost externally visible, you may add 0.0.0.0:8000 to this list.

### ROOT_URLCONF

This setting is a string pointing toward the urls.py module in which the project’s URL patterns are found. In this case, it would be:

```py
ROOT_URLCONF = 'demoproject.urls'
```

### STATIC_URL

This setting points to the folder where the static files, such as JavaScript code, CSS files and images, are placed. Usually, it is set to 'static/' corresponding to the folder of this name in the parent project folder.

### Test the installation

After creating the project, to verify that it is built correctly, start the development server with the following command while remaining in the project’s parent folder:

```sh
python manage.py runserver
```

The server starts running at port 8000 of the localhost with IP address 127.0.0.1. Open the browser and enter
[Server](http://127.0.0.1:8000/)

If you get this output, the project has been created successfully.
In this reading, you learned how to create a Django project. The file structure of the project has also been explained here. In the end, the installation of the project has been successfully verified.
