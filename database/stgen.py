import random, string

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

pr = ['CSE', 'ECE', 'Phd']
ge = ['m', 'f', 'o']
idd=555
for i in range(0,500):
    name = randomword(10)
    email = name + "@gmail.com"
    passw = "*C052D05DCC24DC02C52CAF02D77345ED50E43AC4"
    mob = random_mno()

    course = random.randint(0,25)
    status = '0'
    k=random.randint(0,2)
    gender = ge[k]
    program = pr[k]

#print ("("+"'"+str(idd)+"', '"+name+"', '"+email+"', '"+passw+"', '"+mob+"', '"+gender+"', '"+program+"', '"+course+"', '"+str(status)+")"+",")
    print ("("+"'" , end=''), print (idd,end=''), print("', '"+name+"', '"+email+"', '"+passw+"', '",end=''),print (mob,end=''),print ("', '",end=''), print (gender,end=''), print("', '",end=''),print(program,end=''),print("', '",end=''),print(course,end=''),print("', '",end=''),print (status,end=''),print("')"+",")
    idd+=1
