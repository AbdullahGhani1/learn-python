### Installation

- Anaconda
- vs code
- installo python extension

### open Vscode -> `class1.py`

```python
print("Hello World")
```

- click on run button

### Setting Up a Virtual Environment

#### Creating a New Environment

- Run the following command to create a new Conda environment:

```terminal
conda create -n <env_name> python==3.12 -y
# Example: conda create -n python12 python==3.12 -y
```

- Activate your newly created environment:

```terminal
conda activate <env_name>
# Example: conda activate python12
```

- Installing Required Packages

- Create a requirements.txt file with the following content:

```txt
mypy
```

```python
pip install requirement.txt
```
