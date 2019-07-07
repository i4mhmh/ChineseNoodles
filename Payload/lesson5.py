#-*- coding:utf8 -*-
with open ('code.txt','w') as f:
    for i in range(1,5):
        for j in range(1,5):
            for k in range(1,5):
                for l in range(1,5):
                    if i!=j and i!=k and j!=k:
                        a = ('%s%s%s%s' %(i,j,k,l))
                        print(a)