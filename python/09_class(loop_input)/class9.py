import sys
print("List1")
print("list2")

print(sys.argv)


if sys.argv[1] == "-g":
    print("I will install this package on globally in your system!")
    