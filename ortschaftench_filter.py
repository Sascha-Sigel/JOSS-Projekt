def listToString(arr):
    s = b''
    for i, e in enumerate(arr):
        s += e
        if i < len(arr) - 1:
            s += b','
    return s

lines = []

with open('orte.sql', 'rb') as f:
    lines = f.readlines()

filtered = []

for line in lines:
    elements = line.split(b',')
    filtered.append(listToString(elements[:3]) + b'),\n')

with open('orte2.sql', 'wb') as f:
    for line in filtered:
        f.write(line)