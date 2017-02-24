import random, string
from random import randint
from datetime import timedelta
import datetime

def random_date(start, end):
    
    delta = end - start
    int_delta = (delta.days * 24 * 60 * 60)
    random_second = randrange(int_delta)
    return start 

def randomword(length):
    alpha = 'abcdefghijklmnopqrstuvwxyz'
    m = ''
    for i in range(0,length):
        m += random.choice(alpha)
        
    return m

def random_mno():
    number = '0123456789'
    mno = ''
    for i in range(0,10):
        mno += random.choice(number)
        
    return mno


at = ['P','A']
idd=101
for i in range(0,1000):
    stuid = random.randint(555,1054)
    superid = random.randint(101,140)
    k=random.randint(0,1)
    att = at[k]
    date = datetime.date(randint(2005,2025), randint(1,12),randint(1,28))
    
   

#print ("("+"'"+str(idd)+"', '"+name+"', '"+email+"', '"+passw+"', '"+mob+"', '"+gender+"', '"+program+"', '"+course+"', '"+str(status)+")"+",")
    print ("("+"'" , end=''), print (idd,end=''), print("', '",end=''),print(stuid,end=''),print("', '",end=''),print(superid,end=''),print("', '"+att,end=''),print("', '",end=''),print(date,end=''),print("'),")
    idd+=1
