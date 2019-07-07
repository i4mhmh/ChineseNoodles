#-*- coding:utf8 -*- 
def easy_money():
    pirce = int(input('plz input number: '))
    arra = [100000,200000,400000,600000,1000000]
    arrb = [0.075,0.05,0.03,0.015,0.001]
    q = 0
    if pirce >100000:
        q+=10000
    else:
        print(pirce*0.1)
    for i in range(0,5):  
            if pirce > int(arra[i]):            
                q+=(pirce-arra[i])*arrb[i]
                print('利润为:' + str(q))
easy_money()