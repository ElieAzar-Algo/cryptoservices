import json

def cube(x):
   r=x**3
   return json.dumps(r)


x=cube(4)
print(x)
